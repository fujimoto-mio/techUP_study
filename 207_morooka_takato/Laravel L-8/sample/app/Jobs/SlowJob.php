<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use App\Models\Task;

class SlowJob implements ShouldQueue
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
        
        $task = new Task;
        $task->name = 'ToDoの内容';
        $task->status = 1; 
        $task->save();

        /**
        *Log::info("ジョブ開始：" . now());
        *sleep(5); // わざと5秒止める
        *Log::info("ジョブ終了：" . now());
        */
    }
}
