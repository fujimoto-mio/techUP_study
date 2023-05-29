<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class ApiSample extends Controller
{
    public function apiHello()
    {
        return response()->json
        (
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
        $member = new Task;
        $member->name = $request->name;
        $member->status = 1;
        $member->save();
        return response()->json($member);
    }


}
