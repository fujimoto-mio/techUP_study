<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiTestController extends Controller
{
    public function dataInsert()
    {
        // データ挿入
        $data = new User();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $duser->save();

        return response()->json([
            'status' => 'success',
            'message' => 'データを挿入しました。',
            'user' => $user
        ]);
    }
}
