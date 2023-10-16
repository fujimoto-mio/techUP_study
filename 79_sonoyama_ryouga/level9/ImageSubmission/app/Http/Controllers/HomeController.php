<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 最新の投稿を取得
        $latestPosts = Post::latest()->get();

        // 人気の投稿を取得（いいね数でソート）
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->get();

        // ビューにデータを渡す
        return view('home', [
            'latestPosts' => $latestPosts,   // 最新の投稿データ
            'popularPosts' => $popularPosts  // 人気の投稿データ
        ]);
    }
}
