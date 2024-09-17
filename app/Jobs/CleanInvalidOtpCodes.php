<?php
namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\{InteractsWithQueue,SerializesModels};
use App\Models\OtpCode;
use Illuminate\Support\Facades\Log;
class CleanInvalidOtpCodes implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public function __construct() {
        //
    }

    public function handle(): void {
        $invalidCount = OtpCode::where('status', 'invalid')->count();
        if ($invalidCount > 0) {
            OtpCode::where('status', 'invalid')->delete();
            Log::info("Deleted $invalidCount invalid OTP codes.");
        } else {
            Log::info('No invalid OTP codes found.');
        }
        $validCount = OtpCode::where('status', 'valid')->count();
        Log::info("Number of valid OTP codes: $validCount");
    }
}
