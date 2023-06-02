<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
//追記
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleMail;

class sendmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //追記
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //追記
        $users = User::where('birthday', '>=', 20200201)->get();
        //echo $users;
        foreach($users as $user){
            $name = $user->name;
            var_dump($name);
            //echo $name;
            $birthday = $user->birthday;
            var_dump($birthday);
            //echo $birthday;
        }
        
        
        var_dump("メールが送信されます。！！");
    }
}
