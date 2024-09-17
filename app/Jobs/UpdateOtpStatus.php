<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\{InteractsWithQueue,SerializesModels};
use App\Models\OtpCode;
class UpdateOtpStatus implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public function __construct(protected $otpCodeId) {
        $this->otpCodeId = $otpCodeId;
    }

    public function handle() {
        $otpCode = OtpCode::find($this->otpCodeId);
        if ($otpCode && $otpCode->expires_at <= now()) {
            $otpCode->status = 'invalid';
            $otpCode->save();
        }
    }

}
