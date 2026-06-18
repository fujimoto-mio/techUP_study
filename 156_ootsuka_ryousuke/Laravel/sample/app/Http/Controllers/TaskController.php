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
        //Task　テーブルのデータを全部取得する
        //$tasks = Task::all();
        // status がfalseのときのデータをすべて取得する
        $tasks = Task::where('status', false)->get();
        
        //dd($tasks);
        //return view('tasks.index', compact('tasks'));
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
        //↓↓↓↓↓storeメソッド内を以下のように追加-------------------
        //バリデーションのルールを記載
        $rules = [
            'task_name' => 'required|max:100',
        ];

        //エラー時のメッセージ
        $messages = [
            'required' => '必須項目です',
            'max' => '100文字以下にしてください。',
        ];
    
        //バリデーションのエラーならここで処理をします。
        Validator::make($request->all(), $rules, $messages)->validate();
        //↑↑↑↑↑-------------------------------------------
    
        //モデルをインスタンス化
        $task = new Task;
    
        //モデル->カラム名 = 値 で、データを割り当てる
        $task->name = $request->input('task_name');
    
        //データベースに保存
        $task->save();
    
        //リダイレクト
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
        // idから$taskを取得
        $task = Task::find($id);
        //dd($task);//何がでているか確認しよう。
        //var_dump($task);//何がでているか確認しよう。
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
 
        //「編集する」と完了ボタンをおしたとき ifで分けることにします。
        if ($request->status === null) {
 
            //バリデーションです
            $rules = [
                'task_name' => 'required|max:100',
            ];
 
            $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];
 
            Validator::make($request->all(), $rules, $messages)->validate();
 
 
            //該当のタスクを検索　取得する
            $task = Task::find($id);
 
            //モデル->カラム名 = 値 で、データnamwを割り当てる（更新する）
            $task->name = $request->input('task_name');
 
            //データベースに保存
            $task->save();
        }else {
            //「完了」ボタンを押したとき
 
            //該当のタスクを検索
            $task = Task::find($id);
 
            // statusを　trueにして完了に変えます。
            //モデル->カラム名 = 値 で、データを割り当てる
            $task->status = true; //true:完了、false:未完了
 
            //データベースに保存
            $task->save();
        }
 
        //リダイレクト
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
        $task = Task::find($id)->delete();

        return redirect('/tasks');
    }
}
