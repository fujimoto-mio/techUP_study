<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ApiSample extends Controller
{
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
