<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\CustomPost;
use Hash;

class AdminController extends Controller
{
    public function userList()
    {
        // ユーザーリストを取得
        $users = User::all();
        return view('admin.user_list', compact('users'));
    }

    public function toggleAdmin(Request $request, $userId)
    {
        // 指定されたユーザーを取得
        $user = User::findOrFail($userId);

        // 管理者権限の切り替え
        $user->is_admin = !$user->is_admin;

        $user->save();

        return redirect('/admin/users')->with('success', '管理者権限を更新しました');
    }

    public function editUser($id)
    {
        // 指定されたユーザーを取得して編集画面を表示
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        // フォームから送信されたデータを取得
        $data = $request->only(['name', 'email', 'password', 'is_admin']);

        // パスワードが入力されている場合はハッシュ化
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            // パスワードが空の場合は削除する（null を許可する場合はコメントアウト）
            unset($data['password']);
        }

        // 管理者権限のチェックボックスがチェックされているかを判定し、is_admin をセット
        $data['is_admin'] = isset($data['is_admin']);

        // ユーザーを取得してデータを更新
        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->route('admin.users')->with('success', 'ユーザー情報を更新しました');
    }

    public function deleteUser($id)
    {
        // 指定されたユーザーを削除
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin/users')->with('success', 'ユーザーを削除しました');
    }
    // お知らせ一覧を表示
    
}
