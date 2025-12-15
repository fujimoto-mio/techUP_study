<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = task::where('status', false)->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'task_name' => 'required|max:100',
        ];

        $message = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];

        Validator::make($request->all(), $rules, $message)->validate();

        $task = new Task;

        $task->name = $request->input('task_name');
        
        $task->save();

        return redirect('/tasks');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->status === null) {
            $rules = [
                'task_name' => 'required|max:100',
            ];
    
            $message = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
    
            Validator::make($request->all(), $rules, $message)->validate();
    
            $task = Task::find($id);
    
            $task->name = $request->input('task_name');
    
            $task->save();
        } else {
            $task = Task::find($id);

            $task->status = true;

            $task->save();
        }

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id)->delete();

        return redirect('/tasks');
    }
}