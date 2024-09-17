<?php
namespace App\Services\Otp;
use App\Services\Otp;
use Illuminate\Support\Str;
use App\Models\{Doctor, Patient};
class OtpServiceManager {
    protected $services = [];
    public function __construct() {
        $this->services['email'] = app(Otp\EmailOtpService::class);
        $this->services['whatsapp'] = app(Otp\WhatsappOtpService::class);
        /*$this->services['sms'] = app(Otp\SmsOtpService::class);*/
    }

    public function getService($driver) {
        return $this->services[$driver] ?? $this->services['email'];
    }

    public static function getUserByIdentifier($broker, $identifier) {
        $modelClass = 'App\\Models\\' . ucfirst(Str::camel($broker));
        if (!class_exists($modelClass))
            return null;
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            return $modelClass::whereEmail($identifier)->first();
        } else {
            return $modelClass::wherePhone($identifier)->first();
        }
    }
    
    public static function getUserByEmail($email)
    {
        $user = Doctor::where('email', $email)->first();
        if (!$user) {
            $user = Patient::where('email', $email)->first();
        }
        return $user;
    }
}
