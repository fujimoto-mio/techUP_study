<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

/**
 * ソリューションページ表示用コントローラ
 *
 * 各事業ページ（MEDIA / STUDIO / ACADEMY）を表示する
 */
class SolutionsController extends Controller
{
    /**
     * MEDIA（メディア事業）ページ
     *
     */
    public function gnmedia(string $lang = 'ja')
    {
        return view('front.solutions.gnmedia', [
            'lang' => $lang,
        ]);
    }

    /**
     * STUDIO（スタジオ事業）ページ
     *
     */
    public function gnstudio(string $lang = 'ja')
    {
        return view('front.solutions.gnstudio', [
            'lang' => $lang,
        ]);
    }

    /**
     * ACADEMY（アカデミー事業）ページ
     *
     */
    public function gnacademy(string $lang = 'ja')
    {
        return view('front.solutions.gnacademy', [
            'lang' => $lang,
        ]);
    }
}
