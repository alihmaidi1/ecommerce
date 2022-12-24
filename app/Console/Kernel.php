<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

     public $commands=[

        \App\Console\Commands\delete_product::class,
        \App\Console\Commands\delete_offer::class,


     ];
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('queue:work')->everySixHours();
        $schedule->command('queue:restart')->daily();
        $schedule->command('product:delete')->hourly();
        $schedule->command('offer:delete')->hourly();


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
