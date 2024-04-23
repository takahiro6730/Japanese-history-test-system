<?php

namespace App\Console\Commands;

use Illuminate\Support\HtmlString;
use Illuminate\Console\Command;

use App\Models\Test;
use App\Models\Test2user;
use App\Models\User;

use App\Mail\TestDayMail;

use App\Console\Kernel;
use Carbon\Carbon;

use Mail;

class TestDay extends Command
{
    /**
     * @var string
     */
    protected $signature = 'test-day';

    /**
     * @var string
     */
    protected $description = 'Command description';

    public function handle(){
        \Log::info("Cron is working fine!");
        $tests = Test::where('test_date', Carbon::today())->get();
        if($tests){
            foreach($tests as $test){
                $test2users = Test2user::where('test_id', $test->id)->get();
                if($test2users){
                    foreach($test2users as $test2user){
                        if($test2user->mail_sended != 0){
                            $users = User::find($test2user->user_id)->get();
                            foreach($users as $user){
                                $mailData = [
                                    'user_name' => $user->name,
                                    'test' => $test,
                                ];
                                Mail::to($user->email)->send(new TestDayMail($mailData));
                            }
                        }
                    }
                }
            }
        }
        return 0;
    }
}
