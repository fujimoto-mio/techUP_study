<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

/**
 * 管理画面 投稿（Post）管理コントローラ
 * 一覧表示・作成・編集・削除を担当
 */
class PostController extends Controller
{
    /**
     * 投稿一覧
     * ・公開 / 非公開フィルタ
     * ・タグ検索
     */
    public function index(Request $request)
    {
        $query = Post::query();

        // ==================================================
        // 公開 / 非公開 フィルタ
        // ==================================================
        if ($request->has('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'unpublished') {
                $query->where('is_published', false);
            }
        }

        // ==================================================
        // タグ検索
        // ==================================================
        if ($request->filled('tag')) {
            $query->where('tags', 'like', '%' . $request->tag . '%');
        }

        // ==================================================
        // ページネーション
        // ==================================================
        $posts = $query->paginate(20);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * 投稿作成フォーム
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * 投稿新規作成
     */
    public function store(Request $request)
    {
        // ==================================================
        // 入力値バリデーション
        // ==================================================
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required|string',
            'type'         => 'required|in:news,blog',
            'service'      => 'nullable|string',
            'image'        => 'nullable|image|max:2048',
            'tags'         => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

        // ==================================================
        // 保存データ整形
        // ==================================================
        $data = $request->only([
            'title',
            'content',
            'type',
            'service',
            'tags',
        ]);

        $data['is_published'] = $request->boolean('is_published');

        if ($data['is_published']) {
            $data['published_at'] = now();
        }

        // ==================================================
        // 画像アップロード処理
        // ==================================================
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('posts', 'public');
        }

        // ==================================================
        // データ保存
        // ==================================================
        Post::create($data);


        return redirect()
            ->route('admin.posts.index')
            ->with('success', '投稿を追加しました');
    }

    /**
     * 投稿編集フォーム
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * 投稿更新
     */
    public function update(Request $request, Post $post)
    {
        // ==================================================
        // 入力値バリデーション
        // ==================================================
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required|string',
            'type'         => 'required|in:news,blog',
            'service'      => 'nullable|string',
            'image'        => 'nullable|image|max:2048',
            'tags'         => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ]);

        // ==================================================
        // 更新データ整形
        // ==================================================
        $data = $request->only([
            'title',
            'content',
            'type',
            'service',
            'tags',
        ]);

        $data['is_published'] = $request->boolean('is_published');

        if (
            $data['is_published'] &&
            !$post->is_published &&
            is_null($post->published_at)
        ) {
            $data['published_at'] = now();
        }


        // ==================================================
        // 画像アップロード処理（差し替え）
        // ==================================================
        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('posts', 'public');
        }

        // ==================================================
        // データ更新
        // ==================================================
        $post->update($data);

        return redirect()
            ->route('admin.posts.index')
            ->with('success', '投稿を更新しました');
    }

    /**
     * 投稿削除
     */
    public function destroy(Post $post)
    {
        // ==================================================
        // データ削除
        // ==================================================
        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('success', '投稿を削除しました');
    }
}
