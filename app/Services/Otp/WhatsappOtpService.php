<?php
namespace App\Services\Otp;
use App\Models\OtpCode;
use Carbon\Carbon;
use App\Services\Interfaces\OtpServiceInterface;
use Illuminate\Support\Facades\{Log, Http};
class WhatsappOtpService implements OtpServiceInterface {
    protected $apiUrl;
    protected $apiToken;
    protected $template;
    public function __construct() {
        $this->apiUrl = config('whatsapp.api_url');
        $this->apiToken = config('whatsapp.api_token');
        $this->template = config('whatsapp.template');
    }

    public function sendOtp($user, $driver): void {
        $otpCode = OtpCode::generateUniqueOtp();
        OtpCode::create([
            'otp' => $otpCode,
            'is_sent' => true,
            'status' => 'valid',
            'type' => $driver,
            'phone_number' => $user->phone_number,
            'otpable_type' => get_class($user),
            'otpable_id' => $user->id,
            'expires_at' => Carbon::now()->addHour(),
        ]);
        $this->sendOtpViaWhatsApp($user, $otpCode);
    }

    private function sendOtpViaWhatsApp($user, $otpCode) {
        try {
            Http::post('https://api.whatsapp.com/send', [
                'phone' => $user->phone,
                'message' => "Welcome $user->name Your OTP code is: $otpCode",
            ]);
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiToken,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl, [
                'messaging_product' => 'whatsapp',
                'to' => $user->phone,
                'type' => 'template',
                'template' => [
                    'name' => $this->template,
                    'language' => [
                        'code' => 'en_US',
                    ],
                ],
            ]);
            if ($response->failed()) {
                Log::error('Failed to send OTP via WhatsApp: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Failed to send OTP via WhatsApp: '. $e->getMessage());
        }
    }
}
