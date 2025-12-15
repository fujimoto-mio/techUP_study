<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; 

class InsertUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        User::create(
            [
                //データの挿入処理
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'email_verified_at' => $this->data['email_verified_at'] ?? null,
                'password' => $this->data['password'],
                'birthday' => $this->data['birthday'],
                'remember_token' => Str::random(10),
            ]
        );
    }
}