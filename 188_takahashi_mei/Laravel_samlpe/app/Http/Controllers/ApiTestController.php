<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiTestController extends Controller
{
    //データ挿入用の非同期処理
    public function dataInsert()
    {
    $command = "php artisan insert:test-data > /dev/null 2>&1 &";
    exec($command);

    //ログに記録
    Log::debug("データ挿入コマンドを非同期で実行しました。");


    // 成功メッセージを返す
    //var_dump() の使用：var_dump() はデバッグ用。
    //レスポンスとしてクライアントに返すデータは、return response()->json() で返す.
    return response()->json([
        'message' => 'データ挿入処理を開始しました。',
        'status' => 'success'
    ]);

     
    }
}
