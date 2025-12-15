<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;//追加

class ApiTestController extends Controller
{//users テーブルにデータをインサートする処理
    public function dataInsert(Request $request){

        $member = [
            'name' => $request-> name,
            'birthday' => $request-> birthday,
            'email' => $request->email,
            'password' => $request->password
          ]; 
            $user = new User;
            $user->name = $member['name'];
            $user->birthday = $member['birthday'];
            $user->email = $member['email'];
            $user->password = $member['password'];
            $user->save();
      
    }
}
//curl "name=suzuki" "birthday=20241205" "email=suzuki@example.com" "password=6789"  http://localhost:8000/dataInsert
    /*public function dataInsert(){

        $member = [
            'name' => 'satou',
            'birthday' => 20241206,
            'email' => 'satou@example.com',
            'password' => 11111
          ]; 
            $user = new User;
            $user->name = $member['name'];
            $user->birthday = $member['birthday'];
            $user->email = $member['email'];
            $user->password = $member['password'];
            $user->save();
      
    }*/
