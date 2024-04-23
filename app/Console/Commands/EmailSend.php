<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class EmailSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle() 
    {
        // $this->test2user()->test()->test_date
        $users = User::where('test_date', $test_date)
                    ->get();

        if ($users->count() > 0) {
            foreach ($users as $user) {
                Mail::to($user)->send(new TestMail($user));
            }
        }

        return 0;
    }

}
