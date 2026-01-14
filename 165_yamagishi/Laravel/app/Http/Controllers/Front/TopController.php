<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

/**
 * トップページ表示用コントローラ
 */
class TopController extends Controller
{
    /**
     * TOPページ表示
     *
     * - 公開済みの最新ニュースを3件取得
     * - 表示言語情報をビューへ渡す
     * - 背景動画IDを指定
     *
     */
    public function index(Request $request, $lang = null)
    {
        // 公開済みニュースの最新3件を取得
        $latestNews = Post::where('is_published', true)
            ->latest('published_at')
            ->take(3)
            ->get();


        // TOPページ表示
        return view('front.top', [
            'latestNews' => $latestNews,
            'lang'       => $lang ?? app()->getLocale(),
            'bgVideoId'  => 'qZ_BO9WMSTs', // 背景動画（YouTube ID）
        ]);
    }
}
