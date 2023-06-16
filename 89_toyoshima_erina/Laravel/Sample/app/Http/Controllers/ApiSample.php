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
<<<<<<< HEAD
} 
    public function nameSet(Request $request) {
        $member = new Task;
        $member->name = $request->name;
        $member->status = 1;
        $member->save();
        return response()->json($member);
=======
>>>>>>> 6224827902c91a3137a142f9c975857b4c640a35
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
