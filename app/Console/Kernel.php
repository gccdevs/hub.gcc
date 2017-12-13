<?php

namespace App\Console;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {

            $allExpiredInvitations = User::where('is_active',false)->where('confirm_token', '!=', 'expired')->get();

            $now = Carbon::now();

            foreach ($allExpiredInvitations as $entry) {

                $update = $entry->created_at;
                $diff = $now->diffInMinutes($update);

                if ($diff >= 2) {
                    $entry->outdateToken();
                    $entry->save();
                }else{
                    // do nothing
                }
            }

        })->everyMinute()->runInBackground();
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
