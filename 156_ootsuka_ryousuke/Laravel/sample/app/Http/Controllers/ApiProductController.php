<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskProductRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;

class ApiProductController extends Controller
{
     public function index()
    {
        $tasks = Task::all();
        return response()->json([
            'status' => true,
            'tasks' => $tasks
        ]);
    }
}

public function store(TaskProductRequest $request)
    {
        $task = new Task;
        $task->name = $request->input('name'); // リクエストから 'name' を取得
        $task->status =  $request->input('status'); // status を固定値 1 に設定
        $task->save(); // データベースに保存
 
        return response()->json([
            'status' => 1,
            'message' => "User Created successfully!",
            'product' => $task
        ], 200);
    }
