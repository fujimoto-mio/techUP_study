<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

/**
 * ABOUT US ページ用コントローラ
 * 言語（日本語 / 英語）切り替えに対応
 */
class AboutController extends Controller
{
    /**
     * ABOUT US ページ表示
     */
    public function index($lang = 'ja')
    {
        // ==================================================
        // 言語パラメータ補正
        // ・ja / en 以外は日本語扱い
        // ==================================================
        if (!in_array($lang, ['ja', 'en'])) {
            $lang = 'ja';
        }

        return view('front.about', compact('lang'));
    }
}
