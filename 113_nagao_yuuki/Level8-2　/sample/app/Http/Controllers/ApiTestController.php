<?php

namespace App\Http\Controllers;

//ここが足らないのか？
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleMail;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    //
    //ApiTestControllerに　dataInsert関数を追加して、その関数に挿入プログラムを作成してください。
    public function dataInsert(){
        $user = new User;
        $user->fill([
            'name'=>'suzuki',
            'email'=>'suzuki.co.jp',
            'password'=>'1234',
            'birthday'=>'2023-05-20',//結果はNullのまま
        ]);
        $user->fill([
            'name'=>'aoki',
            'email'=>'aoki.co.jp',
            'password'=>'1234',
            'birthday'=>'2024-06-11',//結果はNullのまま
        ]);
        $user->fill([
            'name'=>'kato',
            'email'=>'kato.co.jp',
            'password'=>'1234',
            'birthday'=>'2024-06-11',//結果はNullのまま
        ]);
        $user->fill([
            'name'=>'yamada',
            'birthday'=>'2024-06-11',//結果はNullのまま
            'email'=>'yamada.co.jp',
            'password'=>'1234',
            
        ]);
        $user->fill([
            'name'=>'iida',
            'email'=>'iida.co.jp',
            'password'=>'1234',
            'birthday'=>'2024-06-11 00:00:00',//結果はNullのまま
        ]);
        $user->fill([
            'name'=>'ohara',
            'email'=>'ohara.co.jp',
            'password'=>'1234',
            'birthday'=>'2024-06-11 00:00:00',
            'remember_token'=>'oioi',
        ]);
        $user->fill([
            'name'=>'kinoshita',
            'email'=>'kinoshita.co.jp',
            'password'=>'1234',
            
        ]);


        $birthday = Carbon::createFromDate(1990, 5, 15);
        $user->fill([
            'name'=>'miyata',
            'email'=>'miyata.co.jp',
            'password'=>'1234',
            'birthday'=>$birthday,
        ]);
        //$user = User::create([
        //    'name' => 'Yamada',
        //    'email' => '@example.com',
        //    'password' => '23345',
        //    'birthday' => $birthday,
        //]);
        //Log::debug($birthday);
        $user->fill([
            'name'=>'kurata',
            'email'=>'kurata.co.jp',
            'password'=>'1234',
            'birthday'=>'2024-06-11',//結果はNullのまま
        ]);
        //$user->insert([
        //    'name'=>'fukase',
        //    'email'=>'fukase.co.jp',
        //    'password'=>'5678',
        //    'birthday'=>'2024-07-30',//結果はNullのまま
        //]);
        $user->insert([
            'name'=>'hayashi',
            'email'=>'hayashi.co.jp',
            'password'=>'5678',
            'birthday'=>'2024-06-18',//結果はNullのまま
        ]);


        
        $user->save();  

    }
}