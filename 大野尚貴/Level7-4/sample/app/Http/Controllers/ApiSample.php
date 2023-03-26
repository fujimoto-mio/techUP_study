<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class ApiSample extends Controller
{
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
     $member = new Task;
       //※ $memberに　保存するカラム　name とstatusを配列で設定してください。
     $member->name = $request->name;
     $member->status = $request->status;
     //データベースに保存
     $member->save();
       /* JSONに変換してレポンスを返している */
        return response()->json($member);
    }
}