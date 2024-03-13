<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiTestController extends Controller
{
    //
    public function dataInsert(){

        var_dump(1);
        $user=[
        
        [
        'name'=> '魚太朗',
        'birthday' => '20210203',
        'mail' => 'xxxxx@gmail.com',
        'created_at' => now(),
        'updated_at' => now()
        ],
        
        [
        'name'=> '猫仁田',
        'birthday' => '20200131',
        'mail' => 'xxxxx@gmail.com',
        'created_at' => now(),
        'updated_at' => now()
        ],

        [
        'name'=> '枝豆三太朗',
        'birthday' => '20200202',
        'mail' => 'xxxxx@gmail.com',
        'created_at' => now(),
        'updated_at' => now()
        ]

        

        ];

        var_dump(2);

        $cli= DB::table('users')
        ->insert($user);

        var_dump($cil);

    }
    
}
