<?php

namespace App\Console;

use App\Models\Attendence;
use App\Models\employee;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Rats\Zkteco\Lib\ZKTeco;

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

        $schedule->call(function (){
            while (true){
                $zk = new ZKTeco('192.168.8.165');
                $zk->connect();
                // $zk->clearAttendance();
                $users = collect($zk->getAttendance())->where('timestamp', '>=', date('Y-m-d').' 00:00:00')->groupBy('id');


                $l=collect($users)->map(function ($user) {
                    $max =date("H:i:s",strtotime($user->max('timestamp')));
                    $min =date("H:i:s",strtotime($user->min('timestamp')));
                    if($max==$min){
                        $max =null;
                    }
                    return [
                        "id" =>  $user->first()['id'],
                        'max' => $max,
                        'min' => $min,
                    ];
                });
                collect($l)->each(function ($e){
                    $emp = employee::where('fingerprint_id', '=', $e['id'])->first();
                    $attend=  Attendence::where([['date', '=', date('Y-m-d')],['emp_id','=',$emp->emp_id]])->first();
                    if($attend==null){
                        $attend = new Attendence();
                    }
                    $msgname = $emp->fname;
                    $attend->date =date('Y-m-d');
                    $attend->emp_id =$emp->emp_id;
                    $attend->fname = $emp->fname;
                    $attend->arrival_time =$e['min'];
                    $attend->leave_time =$e['max'];
                    $attend->status = 'present';
                    $attend->save();



                });
                $zk->disconnect();

//end of loop
            }


        })->everyMinute();

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

    private function saveAttendData(){




    }
}
