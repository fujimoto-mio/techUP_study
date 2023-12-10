<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ApiSample extends Controller
{
    public function nameSet(Request $request)
    {
        $member = $request->all();

    $task = new Task();
    
    if (isset($member['name'])) {
        $task->name = $member['name'];
    }
    
    if (isset($member['status'])) {
        $task->status = $member['status'];
    }
    
    $task->status = 1; 
    
    $task->save();

    $member['status'] = 1;

    return response()->json($member);

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

        return 'Hello API!!';
    }
}