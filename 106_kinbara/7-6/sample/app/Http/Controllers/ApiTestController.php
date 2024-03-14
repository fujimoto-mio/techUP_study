<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ApiTestController extends Controller
{
    //
    public function dataInsert(){

        
        $user=[
        
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


        $cli=DB::table('users')->insert($user);

        var_dump($cli);

    }
    
}
