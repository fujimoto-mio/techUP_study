<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    class ApiTestController extends Controller
    {
        public function dataInsert(Request $request)
           {
        // データを挿入する為の配列
        $data = [

            'id' => id(),
            'name' => 'testman',
            'email' => 'please.iphone16plus.pink@googleApple.com',
            'emai_verified_at' => now(),
            'password' => ('password'),
            'birthday' => '2025-04-19', 
            'created_at' => now(), 
            'updated_at' => now(),
    
        ]

        // データベースに挿入する
        DB::table('m_users')->insert($data);

    }
}