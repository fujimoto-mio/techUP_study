<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // マイページ

    public function mypage($id = null)
    {
        if ($id === null) {
            // IDが指定されない場合はログイン中のユーザーのマイページを表示
            $user = Auth::user(); // ログイン中のユーザーを取得
            $posts = $user->posts; // ユーザーの投稿一覧を取得

            return view('mypage', ['user' => $user, 'posts' => $posts]);
        } else {
            // IDが指定された場合は特定のユーザーのマイページを表示
            $user = User::find($id); // ユーザーをIDで検索
            if (!$user) {
                abort(404); // ユーザーが存在しない場合は404エラーを返す
            }

            $posts = $user->posts ?? []; // ユーザーの投稿一覧を取得

            return view('user.mypage', ['user' => $user, 'posts' => $posts]);
        }
    }

    // 編集機能
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // フォームから受け取ったデータを更新
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->is_admin = $request->has('is_admin'); // 例: 管理者権限

        $user->save();

        return redirect()->route('admin.users')->with('success', 'ユーザー情報を更新しました');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
}
