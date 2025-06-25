<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class sendmail implements ShouldQueue
{
    use Queueable;

    use App\Models\User;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\SampleMail;
    class sendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;/**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        var_dump("メールが送信されます。！！");
    }
}
