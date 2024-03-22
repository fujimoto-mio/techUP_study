<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; //追加
use Illuminate\Support\Facades\Validator; //追加

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Taskテーブルのデータを全部取得する
        // $tasks = Task::all();
        $tasks = Task::where('status', false)->get();
        // 'tasks'=> $tasks 引数で渡している。
        return view('tasks.index', ['tasks' => $tasks]); //viewの中のtasksの中のindexを開く。
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
        //クライアントから受け取った内容が$requestにあります。

        //バリデーションのリールを記載
        $rules = [
            'task_name' => 'required|max:100',
        ];

        //エラー時のメッセージ
        $messages = ['request' => '必須項目です', 'max' => '100文字以下にしてください。'];

        //バリデーションのエラーを処理する。
        Validator::make($request->all(), $rules, $messages)->validate();

        //モデルのインスタンス化 初期呼び出し
        $task = new Task;
        //その中にinputされた'task_name'を取得します。
        $task->name = $request->input('task_name');
        // dd の関数で確認します。※関数内容はこちらにあります。→vendor/symfony/var-dumper/Resources/functions/dump.php
        //受け取れたことを確認します。
        // dd($task_name);
        // var_dump($task);
        $task->save(); //データベースに保存
        return redirect('/tasks'); //リダイレクトしてtasksに戻る。
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
        // dd($task);
        // var_dump($task);
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
        } else {
            //「完了」ボタンを押したとき
            //該当のタスクを検索
            $task = Task::find($id);
            // statusをtrueにして完了に変えます。
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
        Task::find($id)->delete();
        // リダイレクト
        return redirect('/tasks');
    }
}