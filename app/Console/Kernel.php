<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\LogNow;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        LogNow::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('log:now')->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
}
