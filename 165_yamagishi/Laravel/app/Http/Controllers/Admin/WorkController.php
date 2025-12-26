<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Str;

/**
 * 管理画面 制作実績（Work）管理コントローラ
 * 一覧表示・作成・編集・削除を担当
 */
class WorkController extends Controller
{
    /**
     * 実績一覧
     * ・タグ検索
     * ・表示順（sort_order → 作成日時）
     */
    public function index(Request $request)
    {
        $query = Work::query();

        // ==================================================
        // タグ検索
        // ==================================================
        if ($request->has('tag')) {
            $tag = $request->tag;
            $query->where('tags', 'like', "%{$tag}%");
        }

        // ==================================================
        // タグ検索
        // ※ 現在は管理画面・フロント画面からの導線なし
        //   （将来拡張用に処理のみ残している）
        // ==================================================
        $works = $query
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.works.index', compact('works'));
    }

    /**
     * 実績新規作成フォーム
     */
    public function create()
    {
        return view('admin.works.create');
    }

    /**
     * 実績新規作成
     */
    public function store(Request $request)
    {
        // ==================================================
        // 入力値バリデーション
        // ==================================================
        $request->validate([
            'title'        => 'required|string|max:255',
            'video_url'    => 'required|url',
            'content'      => 'nullable|string',
            'type'         => 'nullable|string',
            'service'      => 'nullable|string',
            'tags'         => 'nullable|string',
            'sort_order'   => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        // ==================================================
        // DBに保存するデータ
        // ==================================================
        $data = [
            'title'        => $request->input('title'),
            'slug'         => (string) Str::uuid(), // 一意な識別子
            'content'      => $request->input('content'),
            'youtube_url'  => $request->input('video_url'),
            'type'         => $request->input('type'),
            'service'      => $request->input('service'),
            'tags'         => $request->input('tags'),
            'sort_order'   => $request->input('sort_order', 0),
            'is_published' => $request->has('is_published') ? 1 : 0,
        ];

        // ==================================================
        // データ保存
        // ==================================================
        Work::create($data);

        return redirect()
            ->route('admin.works.index')
            ->with('success', '実績を追加しました。');
    }

    /**
     * 実績編集フォーム
     */
    public function edit(Work $work)
    {
        return view('admin.works.edit', compact('work'));
    }

    /**
     * 実績更新
     */
    public function update(Request $request, Work $work)
    {
        // ==================================================
        // 入力値バリデーション
        // ==================================================
        $request->validate([
            'title'        => 'required|string|max:255',
            'video_url'    => 'required|url',
            'content'      => 'nullable|string',
            'type'         => 'nullable|string',
            'service'      => 'nullable|string',
            'tags'         => 'nullable|string',
            'sort_order'   => 'nullable|integer',
            'is_published' => 'nullable|boolean',
        ]);

        // ==================================================
        // 更新データ
        // ==================================================
        $data = [
            'title'        => $request->input('title'),
            'content'      => $request->input('content'),
            'youtube_url'  => $request->input('video_url'),
            'type'         => $request->input('type'),
            'service'      => $request->input('service'),
            'tags'         => $request->input('tags'),
            'sort_order'   => $request->input('sort_order', 0),
            'is_published' => $request->has('is_published') ? 1 : 0,
        ];

        // ==================================================
        // データ更新
        // ==================================================
        $work->update($data);

        return redirect()
            ->route('admin.works.index')
            ->with('success', '実績を更新しました。');
    }

    /**
     * 実績削除
     */
    public function destroy(Work $work)
    {
        // ==================================================
        // データ削除
        // ==================================================
        $work->delete();

        return redirect()
            ->route('admin.works.index')
            ->with('success', '実績を削除しました。');
    }
}
