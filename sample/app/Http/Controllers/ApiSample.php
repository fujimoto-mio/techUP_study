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
                "age" => 26,
                "profile" => ["sport" => 'basebool', "like" => "move"]
            ]
        );
        
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * ↓これを実行するとレスポンスが返ってきてデータに保存される。
     * curl -X POST -d "name=tanaka" http://localhost:8000/api/nameset
     */
    public function nameSet(Request $request)
    {
       //※ここに、データベースtest_dbのtasksテーブルに保存するプログラミングを記述してください。
       // tasksテーブルに保存する方法は前回やっています。
       //※ $memberに　保存するカラム　name とstatusを設定してください。
       //※ status =1;　固定にする。 
        
       // モデルをインスタンス化 初期呼び出し
       $task = new Task;

       // その中に input された 'task_name' を取得します。
       // モデル->カラム名 = 値 で、データを割り当てる
       $task->name = $request->input('task_name');
        $task->status = 1; // status を 1 に設定

        // データベースに保存
        $task->save();

        // 保存したデータを $member にセット
        $member = [
            'name' => $task->task_name,
            'status' => $task->status,
        ];
 
       /* JSONに変換してレポンスを返している */
       return response()->json($member);
    }
}
