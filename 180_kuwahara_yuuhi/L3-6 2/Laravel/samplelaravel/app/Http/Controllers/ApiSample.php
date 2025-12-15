<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ApiSample extends Controller
{
    public function apiHello() {
        return response()->json(
            [
                'name' => '田中',
                'nick_name' => 'tanaka',
                'age' => 26,
                'profile' => ['sport' => 'baseball', 'like' => 'move']
            ]
        );
    }

    public function nameSet(Request $request)
    {
        $task = new Task;
        
        $task->name = $request->input('name');

        $task->save();

        $member = [
            'name' => $task->name,
            'status' => $task->status,
        ];

        return response()->json($member);
    }
}