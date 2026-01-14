<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * 投稿一覧ページ
     *
     * 公開済み投稿を作成日時の降順で取得し、9件ずつページネーション
     */
    public function index()
    {
        $posts = Post::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        // ビューを正しく newsblog/index に指定
        return view('front.newsblog.index', compact('posts'));
    }

    /**
     * 投稿詳細ページ
     *
     * 公開済みの投稿のみ取得。存在しない場合は 404
     */
    public function show($lang, $slug)
    {
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // ビューを正しく newsblog/show に指定
        return view('front.newsblog.show', compact('post'));
    }
}
