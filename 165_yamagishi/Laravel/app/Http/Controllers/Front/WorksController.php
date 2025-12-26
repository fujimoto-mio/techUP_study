<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

/**
 * 実績（Works）表示用コントローラ
 */
class WorksController extends Controller
{
    /**
     * 実績一覧ページ
     *
     * - 公開済みの実績のみ表示
     * - カテゴリー（type）・サービスでの絞り込みに対応
     * - 表示順 → 作成日の順で並び替え
     */
    public function index(Request $request)
    {
        // 公開済み実績をベースにクエリ生成
        $query = Work::query()
            ->where('is_published', true);

        // カテゴリー（type）で絞り込み
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // サービスで絞り込み
        if ($request->filled('service')) {
            $query->where('service', $request->service);
        }

        // 表示順 → 作成日の順で並び替え
        $works = $query
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(9)
            ->withQueryString();

        return view('front.works.index', compact('works'));
    }

    /**
     * 実績詳細ページ
     *
     */
    public function show($lang, $slug)
    {
        // 公開済みかつ指定スラッグの実績を取得
        $work = Work::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('front.works.show', compact('work'));
    }
}
