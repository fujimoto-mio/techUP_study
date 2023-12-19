<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class ApiTestController extends Controller
{
    public function dataInsert(Request $request){
        $mail = new User();
        $mail->email = $request->input('birthday-mail');
        
        $mail->save();
        return response()->json($mail);
}
}