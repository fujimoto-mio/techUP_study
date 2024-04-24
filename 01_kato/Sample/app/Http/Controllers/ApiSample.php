<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;

/**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * ↓これを実行するとレスポンスが返ってきてデータに保存される。
     * curl -X POST -d "name=tanaka" http://localhost:8000/api/nameset
     */

class ApiSample extends Controller
{
    public function nameSet(Request $request)
    {
        $task = new Task;
        $task->name = $request->input('name');
        $task->status = 1;
        $task->save();
        /*$memberに$taskの中身（name,stats）を詰め替える*/
        $member = [];
        $member = array_merge($member, array('name'=>$task->name));

        return response()->json($member);
    }

    //APIが実行される関数
    public function apiHello()
    {
        return response()->json(
            [
                "name" => "tanaka",
                "nick_name" => "田中",
                "age" => 26,
                "profile" => ["sport" => "basebool", "like" => "move"]
            ]
        );
    }
}
