<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PDO;
use Illuminate\Support\Facades\Validator;

class ApiTestController extends Controller
{
    //
    public function dataInsert(){

        
        $human=[
        
        [
        'name'=> '魚太朗',
        'birthday' => '20210203',
        'email' => 'xxxx1@gmail.com',
        'password' => 'testtest1',
        'created_at' => now(),
        'updated_at' => now()
        ],
        
        [
        'name'=> '猫仁田',
        'birthday' => '20200131',
        'email' => 'xxxx2@gmail.com',
        'password' => 'testtest2',
        'created_at' => now(),
        'updated_at' => now()
        ],

        [
        'name'=> '枝豆三太朗',
        'birthday' => '20200202',
        'email' => 'xxxx3@gmail.com',
        'password' => 'testtest3',
        'created_at' => now(),
        'updated_at' => now()
        ]

        ];
        
        $email='email';

        //どこのDBに接続するか設定
        $dsn = 'mysql:dbname=test_db;host=localhost;charset=utf8';
        $user = 'root';
        $password ='testtest';

        

        try{

            //DBに接続する
            $pdo = new PDO($dsn,$user,$password); 
            
            //一貫した処理を開始する
            DB::beginTransaction();
            //重複チェックをする（emailが１つでもある値を取得）
            $query = $pdo->prepare('SELECT * FROM users WHERE email = :email limit 1');

            
            $query->execute(array(':email' =>$email ));
            $result = $query->fetch();
            
            //1 

    
            //アドレスが重複回数が0の場合もどる
    
            if(empty($result) ){
    
                echo '既に登録されています'; 
            
    
                
            }else{
            
                $cli=DB::table('users')->insert($human);
                var_dump($cli);
                DB::commit();
                
    
               }

        
    
        }catch(Exception $e){

        DB::rollback();
        
    }
    
    }

    
  
}
