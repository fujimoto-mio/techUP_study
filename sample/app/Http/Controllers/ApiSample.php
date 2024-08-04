<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class ApiSample extends Controller
{
    public function apiHello()
    {
        return response()->json(
            [
                'name' => '田中',
                'nick_name' => 'tanaka',
                'age' => 26,
                'profile' => [
                    'sport' => 'basebool', // スポーツ名の修正
                    'like' => 'move'
                ]
            ]
        );
        //return 'Hello API!!'; // コメントアウトされた行
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * ↓これを実行するとレスポンスが返ってきてデータに保存される。
     * curl -X POST -d "name=tanaka" http://localhost:8000/api/nameset
     */
    public function nameSet(Request $request)
    {
        
        // 新しいタスクを作成
        $task = new Task();
        // タスクのプロパティに値を設定
        $task->name = $request->input('name');
        $task->status = 1; // 固定のステータス値

        // データベースに保存
        $task->save();

        // 保存したタスクを配列に変換
        $member = [
            'name' => $task->name,
            'status' => $task->status,
        ];
       /* JSONに変換してレポンスを返している */
        return response()->json($member);
    }
}