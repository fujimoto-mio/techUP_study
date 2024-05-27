<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('status', false)->get();
        //dd($tasks);
        // 'tasks'=> $tasks 引数で渡している。
        return view('tasks.index', ['tasks'=> $tasks]);
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
        //バリデーションのリールを記載
        $rules = [
            'task_name' => 'required|max:100',
        ];
        //エラー時のメッセージ
        $messages = ['required' => '必須項目です', 'max' => '100文字以下にしてください。'];

        //バリデーションのエラーならここで処理をします。
        Validator::make($request->all(), $rules, $messages)->validate();
        //モデルをインスタンス化　初期呼び出し
        $task = new Task;

        //その中にinput　された'task_name'　を取得します。
        //モデル->カラム名 = 値 で、データを割り当てる
        $task->name = $request->input('task_name');

        //var_dump($task); //バーダンプして表示を確認してみよう。
        //exit;  //ここでストップさせる

        //データベースに保存
        $task->save();

        //リダイレクトして　tasksにもどる
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
        // idから$taskを取得
        $task = Task::find($id);
        //dd($task);//何がでているか確認しよう。
        //var_dump($task);//何がでているか確認しよう。
        return view('tasks.edit', ['task'=> $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
     */
    public function destroy(string $id)
    {
        Task::find($id)->delete();

        return redirect('/tasks');
    }
}
