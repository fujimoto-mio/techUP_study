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
        $tasks = Task::where('status', false)->get();
        //Taskテーブルのステータスがfalse、つまり0の時だけ取得する。（完了を非表示、未完了のものだけ表示するということ）
        //dd($tasks);
        // 'tasks'=> $tasks 引数で渡している。
        //viewのtaskファイル内にあるblade.indexを表示するためのもの
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
        //クライアントから受け取った内容（実際にviewで開いているTodoブラウザで入力した内容）が$requestにあります。
        $rules = [
            'task_name' => 'required|max:100',
        ];

        //エラー時のメッセージ
        $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];

        //バリデーションのエラーならここで処理をします。
        Validator::make($request->all(), $rules, $messages)->validate();

        // モデルをインスタンス化 初期呼び出し
        $task = new Task;

        // その中にinputされた'task_name'を取得します。
        // モデル->カラム名 = 値 で、データを割り当てる
        $task->name = $request->input('task_name');

        // データベースに保存
        $task->save();

        // リダイレクトしてtasksにもどる
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
        Task::find($id)->delete();
     //return redirect('/tasks)を入れることにより、削除した後（task2を消した場合）に/task/2に飛ばされないようにするため、削除した後taskにリダイレクトして更新されるような形にする。
        return redirect('/tasks');
    }
}
