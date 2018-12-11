<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('fullstack:send-scheduled-tweets')->everyMinute();
        $schedule->command('fullstack:send-event-tweets')->dailyAt('10:00');
        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('02:00');
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
