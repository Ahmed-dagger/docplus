<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DateTimeZone;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void {
$schedule->command('otp:update-status')->hourly()->runInBackground();
        $schedule->command('app:db-export')->timezone(config('app.timezone'))->weeklyOn(7, '23:59')->runInBackground();
        $schedule->command('notify:expiring-contracts')->daily();
    }

    protected function commands(): void {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }

    protected function scheduleTimezone(): DateTimeZone|string|null
    {
        return env('TIMEZONE', 'Africa/Cairo');
    }
}
