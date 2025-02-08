<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ApiSample extends Controller

/**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * ↓これを実行するとレスポンスが返ってきてデータに保存される。
     * curl -X POST -d "name=tanaka" http://localhost:8000/api/nameset
     */
{
    public function nameSet(Request $request)
    {
        $task = new Task;
        $task->name = $request->input('name');
        $task->status = 1;
        $task->save();

        return response()->json([
            'name' => $task->name,
            'status' => $task->status
          ]);

    }



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
}
