<?php

namespace App\Console;

use App\Models\TransactionLog;
use App\Models\UserBien;
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
            $userBiens = UserBien::where('active', 1)->get();
            foreach ($userBiens as $userBien){
                TransactionLog::create( [ 'user_id' => $userBien->user->id, 'object_id' => $userBien->id, 'type'=> 'rent', 'amount' => $userBien->biens->net_rent_month * $userBien->quantity, 'rate' => 0, 'status' => 1]);
                echo $userBien->biens->net_rent_month * $userBien->quantity;
                $userBien->user->increment('can_recover', $userBien->biens->net_rent_month * $userBien->quantity);
            }

        })->monthlyOn(1, '15:00');

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
