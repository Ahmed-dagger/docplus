<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class SendOtpMail extends Mailable {
    use Queueable, SerializesModels;
    public $otpCode;
    public $user;
    public $logoPath;
    public function __construct($otpCode, $user) {
        $this->otpCode = $otpCode;
        $this->user = $user;
        $this->logoPath = asset('assets/logos/logo.png');
    }

    public function build() {
        return $this->view('emails.sendOtp')
                    ->subject('Password Reset OTP')
                    ->with([
                        'otpCode' => $this->otpCode,
                        'user'    => $this->user,
                        'logoPath' => $this->logoPath,
                    ]);
    }
}
