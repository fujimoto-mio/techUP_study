<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 
use App\Models\User; 

class ApiSample extends Controller
{
    //
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



    public function nameSet(Request $request)
    {
        //※ここに、データベースtest_dbのtasksテーブルに保存するプログラミングを記述してください。
        // tasksテーブルに保存する方法は前回やっています。

        $task = new Task;
        $task->name = $request->input('name'); // リクエストから 'name' を取得
        $task->status = 1; // status を固定値 1 に設定
        $task->save(); // データベースに保存

        //※ $memberに　保存するカラム　name とstatusを設定してください。
        //※ status =1;　固定にする。

        $member = [
            'name' => $task->name, // 保存された name を設定
            'status' => 1, // 保存された status を設定
        ];

        // JSON レスポンスを返す
        return response()->json($member);
    }
    
    public function dataInsert()
    {
        $birthDay = new User;
        $birthDay->name = '202_Nuruki_Touya';
        $birthDay->email = 'sample@sample.com';
        $birthDay->birthday = '2001-08-29';
        $birthDay->password = ''; 
        $birthDay->save();

        return response()->json([
            'message' => 'データが正常に挿入されました。',
            'data' => $birthDay,
        ]);
    }
}