<?php

namespace App\Jobs;

use App\Http\Controllers\ApiTestController;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InsertDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @param array $data
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
        $apiTestController = new ApiTestController();
        $request = new \Illuminate\Http\Request();
        $request->replace($this->data);
        $response = $apiTestController->insertData($request);

        // デバッグメッセージを出力
        \Log::info('Data insertion response: ' . $response->getContent());
    }
}
