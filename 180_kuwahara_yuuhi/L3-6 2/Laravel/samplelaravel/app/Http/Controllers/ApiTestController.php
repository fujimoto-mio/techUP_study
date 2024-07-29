<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\InsertUserJob;

class ApiTestController extends Controller
{
    public function dataInsert(Request $request)
    {
        //バリデーション処理
        $data = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'birthday' => 'required|date',
                'email_verified_at' => 'nullable|date',
            ]
        );

        //ジョブをディスパッチ
        InsertUserJob::dispatch($data);

        return response()->json(['message' => 'User creation job dispatched.'], 200);
    }
}