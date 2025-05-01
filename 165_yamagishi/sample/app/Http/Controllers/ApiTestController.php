<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiTestController extends Controller
{
    public function dataInsert(Request $request)
    {
        // データ挿入
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'データを挿入しました。',
            'user' => $user
        ]);
    }
}
