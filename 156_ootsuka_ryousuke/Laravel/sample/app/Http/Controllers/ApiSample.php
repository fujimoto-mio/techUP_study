<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class ApiSample extends Controller
{
public function apiHello(){
    return response() -> json(
        [
            'name' => '田中',
            'nick_name' => 'tanaka',
            "age" => 26,
            "profile" => ["sport" => 'basebool', "like" => "move"]
        ]
    );
    
    //return 'Hello API!!';
}

    //APIが実行される関数
    public function nameSet(Request $request)
    {
        
        $task = new Task;

        $task->name = $request->input('name');
        $task->status = 1;
        $task->save();

        $member = [
            'name' => $task->name,
            'status' => 1, // statusを固定
        ];

        return response()->json($member);

    }


}
