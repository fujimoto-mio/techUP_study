<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ApiTestController extends Controller
{
    public function dataInsert()
    {
        try {
            DB::beginTransaction();

            // サンプルデータの挿入
            $user = new User();
            $user->name = 'Sample User';
            $user->email = 'sampleuser@example.com';
            $user->password = bcrypt('password'); 
            $user->save();

            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'データの挿入に成功しました。',
                'user' => $user
            ]);

        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'データの挿入に失敗しました。',
                'error' => $error->getMessage()
            ]);
        }
    }
}

