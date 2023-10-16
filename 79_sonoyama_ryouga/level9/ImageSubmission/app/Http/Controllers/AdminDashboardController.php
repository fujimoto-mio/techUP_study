<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 管理者ダッシュボードの表示
        return view('admin.dashboard');
    }

    public function listUsers()
    {
        // すべてのユーザー情報を取得
        $users = User::all();

        // ユーザー一覧の表示
        return view('admin.users', ['users' => $users]);
    }
}
