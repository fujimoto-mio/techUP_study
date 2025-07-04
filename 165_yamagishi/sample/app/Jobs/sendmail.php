<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
        $this->user = $user;
    }
 
    /**
     * ジョブの実行
     * このメッソドがキューでJOBを処理するときに呼び出されます。
     * @return void
     */
    public function handle()
    {
        // ユーザーに対してメール送信する処理
        //ここで本来mメールが送信されますが、メール送信機能の設定がされていないのでここでは省きます。
        /* Mail::to($this->user->email)->send(new SampleMail());*/
        var_dump("メールが送信されます。！！");
    }
}
