<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class ApiSample extends Controller
{
    //APIが実行される関数　　
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
        //return 'Hello API!!';
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
       $name = $request->input('name');
       
       $task = new Task;
       $task->name = $name;
       $task->status = 1;
       $task->save();
       $member = [
        'name' => $task->name,
            'status' => $task->status,
      ];
 
       /* JSONに変換してレポンスを返している */
        return response()->json($member);
    }

}
