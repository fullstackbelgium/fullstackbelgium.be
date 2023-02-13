<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('fullstack:send-scheduled-tweets')->everyMinute();
        $schedule->command('fullstack:send-event-tweets')->dailyAt('10:00');
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
}
