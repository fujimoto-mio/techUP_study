<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Carbon\carbon;

class InsertBirthdayUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $today = Carbon::now()->format('m-d');

        $user = new User();
        $user->name = 'テストユーザー' . uniqid();
        $user->email = uniqid() . '@example.com';
        $user->password = bcrypt('password');
        $user->birthday = Carbon::createFromFormat('m-d',$today)->subYears(rand(20,40));
    }
}
