<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

/**
 * ニュース / ブログ一覧・詳細表示用コントローラ
 */
class NewsController extends Controller
{
    /**
     * 投稿一覧ページ
     *
     * ・公開済み投稿のみ表示
     * ・ジャンル / サービス / タグによる絞り込み対応
     */
    public function index(Request $request, $lang)
    {
        // ==================================================
        // 公開済み投稿を対象にクエリ生成
        // ==================================================
        $query = Post::where('is_published', true);

        // ==================================================
        // ジャンルで絞り込み
        // ==================================================
        if ($request->genre) {
            $query->where('type', $request->genre);
        }

        // ==================================================
        // サービスで絞り込み
        // ==================================================
        if ($request->service) {
            $query->where('service', $request->service);
        }

        // ==================================================
        // タグで絞り込み
        // ==================================================
        if ($request->tag) {
            $query->where('tags', 'like', "%{$request->tag}%");
        }

        // ==================================================
        // 並び順・ページネーション
        // ==================================================
        $posts = $query
            ->orderBy('created_at', 'desc')
            ->paginate(9)
            ->withQueryString();

        // ==================================================
        // View へデータを渡す
        // ==================================================
        return view('front.newsblog.index', [
            'posts'           => $posts,
            'currentGenre'    => $request->genre,
            'currentService'  => $request->service,
            'currentTag'      => $request->tag,
            'lang'            => $lang,
        ]);
    }

    /**
     * 投稿詳細ページ
     *
     */
    public function show($lang, $slug)
    {
        // ==================================================
        // 公開済み投稿のみ取得
        // ==================================================
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('front.newsblog.show', compact('post'));
    }
}
