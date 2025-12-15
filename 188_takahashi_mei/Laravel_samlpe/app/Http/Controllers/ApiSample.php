<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; //⇐ Taskモデルを呼ぶために追加する

class ApiSample extends Controller
{
    //
    //APIが実行される関数　　
    public function apiHello(){
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


    public function nameSet(Request $request)
    {
       //※ここに、データベースtest_dbのtasksテーブルに保存するプログラミングを記述してください。
       $task = new Task();
       $task->name = $request->input("name");
       //※ status =1;　固定にする。 
       $task->status = 1;
       
       // tasksテーブルに保存する方法は前回やっています。
       $task->save();
       
       //※ $memberに　保存するカラム　name とstatusを設定してください。
       $member = [
             "name" => $task->name,
             "status" => $task->status,
        ];
       
       //* JSONに変換してレポンスを返している */
        return response()->json($member);
    }
}
