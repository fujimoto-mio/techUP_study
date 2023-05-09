<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        // データベースに接続
    $pdo = new PDO('mysql:host=localhost; dbname=test_db; charset=UTF8', 'root', 'testtest');

    // SQL文をセット　※$stmt = $pdo->prepare
    $sql = ('INSERT INTO tasks (id,name,status,updated_at,created_at) VALUES (:id,:name,:status,:updated_at,:created_at)');
    $stmt = $pdo->prepare($sql);

    // 値をバインド
    $stmt->bindParam( ':id', PDO::PARAM_INT);
    $stmt->bindParam( ':name',$name, PDO::PARAM_STR);
    $stmt->bindParam( ':updated_at', PDO::PARAM_INT);
    $stmt->bindParam( ':created_at', PDO::PARAM_INT);
    var_dump($stmt);


    // 実行
    $stmt->execute();

    // 接続を終了
    $pdo = null;

    // Jsonで値を返す 
    return response()->json($member);

    }
 
   
 
    
}
    
 
 








 
    
