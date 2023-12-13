<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class Apisample extends Controller
{
    public function nameSet(Request $request)
    {
       $name=$request->input('name');
       $status=1;
       $member=new Task();
       $member->name=$name;
       $member->status=$status;
       $member->updated_at=now();
       $member->created_at=now();

       $member->save();
        return response()->json($member);
    }
}
