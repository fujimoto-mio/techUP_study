<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        // ユーザーデータを取得
        $users = User::all();

        // ビューにデータを渡す
        return view('admin.user_list', compact('users'));
    }
}
