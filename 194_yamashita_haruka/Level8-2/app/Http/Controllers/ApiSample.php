<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ApiSample extends Controller
{
    public function apiHello()
    {
        return response()->json(
            [
                'name' => '田中',
                'nick_name' => 'tanaka',
                "age" => 26,
                "profile" => ["sport" => 'basebool', "like" => "move"]
            ]
        );
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * ↓これを実行するとレスポンスが返ってきてデータに保存される。
     * curl -X POST -d "name=tanaka" http://localhost:8000/api/nameset
     */

    
    
    public function nameSet(Request $request)
    {   //$memberにレスポンスするキーと要素を連想配列でつくる「curl -X POST -d "name=tanaka" http://localhost:8000/api/nameset」のnameの引数を$memberのnameの引数に代入する
        $member = [
         'name' => $request-> name,
         'status' => 1
       ]; 

        //データベースtest_dbのtasksテーブルに追加して保存する
        $task = new Task;
        $task->name = $member['name'];
        $task->status = $member['status'];
        $task->save();

        /* JSONに変換してレポンスを返している */
        return response()->json($member);
    }

}    

