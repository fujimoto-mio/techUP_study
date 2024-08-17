<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
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
        // Taskテーブルのデータを全部取得する
        //$tasks = Task::all();
        // status がfalseのときのデータをすべて取得する
        $tasks = Task::where('status', false)->get();
        // dd($tasks);
        // 'tasks'=> $tasks 引数で渡している。
        return view('tasks.index', ['tasks' => $tasks]); // viewの中のtasksの中のindexを表示する
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
        // クライアントから受け取った内容が $request にあります。

        // バリデーションのルールを記載
        $rules = [
            'task_name' => 'required|max:100',
        ];

        // エラー時のメッセージ
        $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];

        // バリデーションのエラーならここで処理をします。
        Validator::make($request->all(), $rules, $messages)->validate();

        // モデルをインスタンス化 初期呼び出し
        $task = new Task;

        // その中に input された 'task_name' を取得します。
        // モデル->カラム名 = 値 で、データを割り当てる
        $task->name = $request->input('task_name');

        // データベースに保存
        $task->save();

        // リダイレクトして tasks に戻る
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
        // idから $task を取得
        $task = Task::find($id);
        // dd($task); // 何が出ているか確認しよう。
        // var_dump($task); // 何が出ているか確認しよう。
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
        // 「編集する」と完了ボタンを押したとき if で分けることにします。
        if ($request->status === null) {
            // バリデーションです
            $rules = [
                'task_name' => 'required|max:100',
            ];

            $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];

            Validator::make($request->all(), $rules, $messages)->validate();

            // 該当のタスクを検索 取得する
            $task = Task::find($id);

            // モデル->カラム名 = 値 で、データnameを割り当てる（更新する）
            $task->name = $request->input('task_name');

            // データベースに保存
            $task->save();
        } else {
            // 「完了」ボタンを押したとき

            // 該当のタスクを検索
            $task = Task::find($id);

            // statusを true にして完了に変えます。
            // モデル->カラム名 = 値 で、データを割り当てる
            $task->status = true; // true:完了、false:未完了

            // データベースに保存
            $task->save();
        }

        // リダイレクト
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
        // idから $task を取得して削除する
        Task::find($id)->delete();
        // リダイレクトして tasks に戻る
        return redirect('/tasks');
    }
}
