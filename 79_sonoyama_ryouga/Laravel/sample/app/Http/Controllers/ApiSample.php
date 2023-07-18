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
    public function nameSet(Request $request)
    {
        //※ここに、データベースtest_dbのtasksテーブルに保存するプログラミングを記述してください。
        // tasksテーブルに保存する方法は前回やっています。
        //※ $memberに　保存するカラム　name とstatusを設定してください。
        //※ status =1;　固定にする。
        $member = new Task;

        $member->name = $request->input('name');
        $member->status = 1;

        $member->save();


        //JSONに変換してレポンスを返している 
        return response()->json($member);
    }
}
