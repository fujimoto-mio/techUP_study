<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    public function dataInsert()
    {
        // データを挿入する為の配列
        $data = [

            'id' => id(),
            'name' => '試しの人',
            'email' => 'please.iphone16plus.pink@googleApple.com',
            'emai_verified_at' => now(),
            'password' => ('password'),
            'remember_token' => str_random(10), 
            'birthday' => '2025-04-19', 
            'created_at' => now(), 
            'updated_at' => now(); 
    
        ]

        // データベースに挿入する
        DB::table('users')->insert($data);

    }
}
