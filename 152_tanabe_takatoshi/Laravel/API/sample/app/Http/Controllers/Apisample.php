<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ApiSample extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function nameSet(Request $request)
  {

    $request->validate([
      'name' => 'required|string|max:255',
    ]);

    $task = new Task();
    $task->name = $request->input('name');
    $task->status = 1;
    $task->save();

    $member = [
      'name' => $task->name,
      'status' => $task->status,
    ];

    // JSON形式でレスポンスを返す
    return response()->json($member);
  }
}
