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
        // $tasks = Task::all();//Taskテーブルのデータを全て取得する

        $tasks = Task::where('status', false)->get();//statusがfalseの時のデータを全て取得する

        // dd($tasks);

        return view ('tasks.index', ['tasks' => $tasks]);
        
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
        $rules = [
            'task_name' => 'required|max:100',
        ];

        $message = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];

        Validator::make($request->all(), $rules, $message)->validate();

        $task = new Task;//モデルをインスタンス化 初期呼び出し

        $task->name = $request->input('task_name');//その中にinputされた'task_name'を取得
        
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
        $task = Task::find($id);//idから$taskを取得
        return view('tasks.edit', ['task' => $task]);
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
        if($request->status === null) {
            $rules = [
                'task_name' => 'required|max:100',
            ];
    
            $message = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
    
            Validator::make($request->all(), $rules, $message)->validate();
    
            $task = Task::find($id);//該当のタスクを検索 取得する
    
            $task->name = $request->input('task_name');//モデル->カラム名 = 値 でデータ更新する
    
            $task->save();
        } else {
            //完了ボタンを押した時
            $task = Task::find($id);//該当のタスクを検索

            $task->status = true;//statusをtrueにして完了に変える

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
        $task = Task::find($id);

        $task->delete();

        return redirect('/tasks');
    }
}