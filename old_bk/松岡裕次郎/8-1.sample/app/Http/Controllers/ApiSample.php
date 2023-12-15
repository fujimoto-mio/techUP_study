<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class ApiSample extends Controller
{
    public function nameset(Request $request)
    {
    $member = new Task;
 
    $member->name = $request->input('name');
    $member->status = 1;

    $member->save();

    return response()->json($member);

    }
}
