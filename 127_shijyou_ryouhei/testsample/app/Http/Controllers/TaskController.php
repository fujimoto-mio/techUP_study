<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tasks = Task::all();
        $tasks = Task::where('status', false)->get();
    //dd('test');
        return view('tasks.index', ['tasks'=> $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'task_name' => 'required|max:100',
          ];
        $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
        Validator::make($request->all(), $rules, $messages)->validate();

        $task = new Task;
        $task->name = $request->input('task_name');
        $task->save();
        return redirect('/tasks');

        dd($task_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        dd($task);
        return view('tasks.edit', ['task'=> $task]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->status === null) {
        $rules = [
            'task_name' => 'required|max:100',
        ];
 
        $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
 
        Validator::make($request->all(), $rules, $messages)->validate();

        $task = Task::find($id);

        $task->name = $request->input('task_name');

        $task->save();
    }else {

        $task = Task::find($id);

        $task->status = true;

        $task->save();
        }

        return redirect('/tasks');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index');
        //
    }
    public function tasks()
    {
    dd('test2');
        return view('tasks.index');
    }
}
