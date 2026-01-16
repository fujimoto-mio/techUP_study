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
        $query = Post::where('is_published', true);

        if ($request->filled('genre')) {
            $query->where('type', $request->genre);
        }

        if ($request->filled('service')) {
            $query->where('service', $request->service);
        }

        if ($request->filled('tag')) {
            $query->whereNotNull('tags')
                ->where('tags', 'like', "%{$request->tag}%");
        }

        $posts = $query
            ->orderBy('created_at', 'desc')
            ->paginate(9)
            ->withQueryString();

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
