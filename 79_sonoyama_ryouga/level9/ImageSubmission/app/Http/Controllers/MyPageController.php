<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index($id = null)
    {
        if ($id === null) {
            // ログインユーザーの情報と投稿一覧を取得
            $user = Auth::user();
            $posts = Post::where('user_id', $user->id)->get();

            // ビューにデータを渡す
            return view('mypage', ['user' => $user, 'posts' => $posts]);
        } else {
            // 指定されたユーザーの情報と投稿一覧を取得
            $user = User::find($id);
            if (!$user) {
                abort(404);
            }
            $posts = Post::where('user_id', $id)->get();

            // ビューにデータを渡す
            return view('user.mypage', ['user' => $user, 'posts' => $posts]);
        }
    }

    public function mypage()
    {
        // ページネーションを適用して投稿一覧を取得
        $posts = Post::paginate(10); // 1ページあたり10件のデータを取得

        // ページネーションのリンクを表示するためにBladeテンプレートにデータを渡す
        return view('mypage', ['post' => $posts]);
    }
}
