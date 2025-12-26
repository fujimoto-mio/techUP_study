<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * ニュース一覧・詳細表示用コントローラ
 */
class NewsController extends Controller
{
    /**
     * 投稿一覧ページ
     *
     * ・公開済みの投稿のみ表示
     * ・作成日時の降順で並び替え
     * ・9件ずつページネーション
     */
    public function index()
    {
        // ==================================================
        // 公開済み投稿を取得
        // ==================================================
        $posts = Post::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('front.news.index', compact('posts'));
    }

    /**
     * 投稿詳細ページ
     */
    public function show($lang, $slug)
    {
        // ==================================================
        // 公開済み投稿のみ取得（存在しない場合は404）
        // ==================================================
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('front.newsblog.show', compact('post'));
    }
}
