<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\TestDay;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('test-day')->cron('* * * * *');
        // ->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');  
        require base_path('routes/console.php');
    }
}
