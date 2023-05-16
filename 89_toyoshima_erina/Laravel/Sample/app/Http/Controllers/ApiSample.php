<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ApiSample extends Controller
{
    public function apiHello(){
        return response()->json(
            [
                'name' => '田中',
                'nick_name' => 'tanaka',
                "age" => 26,
                "profile" => ["sport" => 'basebool', "like" => "move"]
            ]
        );
} 
    public function nameSet(Request $request) {
        $member = new Task;
        $member->name = $request->name;
        $member->status = $request->status;
        $member->save();
        return response()->json($member);
    }

}
