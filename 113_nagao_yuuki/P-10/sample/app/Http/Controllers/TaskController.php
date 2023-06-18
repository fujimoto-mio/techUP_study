<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        //追記
        //$tasks = Task::all();
        $tasks = Task::where('status', false)->get();
        return view('tasks.index',['tasks'=>$tasks]);
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
        //追記
        $rules = [
            'task_name' => 'required|max:100',
        ];
        $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
        Validator::make($request->all(), $rules, $messages)->validate();
        $task = new Task;
        $task->name = $request->input('task_name');
        /**dd($task_name);**/
        $task->save();
        return redirect('/tasks');
        
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
        //追記
        $task = Task::find($id);
        return view('tasks.edit', ['task'=> $task]);
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
        //追記
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //追記
        $task = Task::find($id);
        // レコードを削除
        $task->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect('/tasks');
    }
}
