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
        $query = Work::where('is_published', true);

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('service')) {
            $query->where('service', $request->service);
        }

        $works = $query
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(9)
            ->withQueryString();

        return view('front.works.index', compact('works'));
    }

    public function show($lang, $slug)
    {
        try {
            $work = Work::where('slug', $slug)
                ->where('is_published', true)
                ->firstOrFail();

            return view('front.works.show', compact('work'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404);
        }
    }
        
}
