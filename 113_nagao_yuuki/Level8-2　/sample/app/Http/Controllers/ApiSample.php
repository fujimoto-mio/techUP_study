<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

//追加課題
use App\Models\User;

class ApiSample extends Controller
{
    //追記
    public function apiHello(){
        return response()->json(
            [
                'name' => '田中',
                'nick_name' => 'tanaka',
                "age" => 26,
                "profile" => ["sport" => 'basebool', "like" => "move"]
            ]
        );
        //return 'Hello API';
    }

    
    

    //課題
    public function nameSet(Request $request){
        //クライアントから受け取った内容が$requestにある。
  
        //モデルをインスタンス化　初期呼び出し
        //$member = new Task;
        //追加課題
        $member = new User;
        
 
        //その中にinput　された'task_name'　を取得する。
        //モデル->カラム名 = 値 で、データを割り当てる
        $member->name = $request->input('name');
        //$member->status=1;
        //追加課題
        $member->email= "test".mt_rand(1, 200)."@gamli.com"; //ランダム値のユニークにしてメール挿入
        $member->email_verified_at=null;//固定null
        $member->password=1111;//固定
        $member->remember_token = null;//固定null
        $member->birthday = "2011-01-01";//固定

    
        
 
        //データベースに保存
        $member->save();
 
        //responseへ値を返す
        return response()->json($member);
        


    }
 
   
 
    
}




 
 








 
    
