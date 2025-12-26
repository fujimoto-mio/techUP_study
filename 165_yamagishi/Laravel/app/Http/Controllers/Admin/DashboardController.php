<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Work;

/**
 * 管理画面ダッシュボード
 * 投稿（Post）・制作実績（Work）の集計情報を表示する
 */
class DashboardController extends Controller
{
    /**
     * ダッシュボードトップ
     */
    public function index()
    {
        // ==================================================
        // 投稿（Post）KPI
        // ==================================================
        // 総件数 / 公開済み件数
        $postTotal     = Post::count();
        $postPublished = Post::where('is_published', true)->count();

        // ==================================================
        // 制作実績（Work）KPI
        // ==================================================
        // 総件数 / 公開済み件数
        $workTotal     = Work::count();
        $workPublished = Work::where('is_published', true)->count();

        // ==================================================
        // 最新3件
        // ==================================================
        $latestPosts = Post::latest()->take(3)->get();
        $latestWorks = Work::latest()->take(3)->get();

        // ==================================================
        // 公開 / 非公開 件数（グラフ表示用）
        // ==================================================
        $postStatusCount = [
            '公開済み' => $postPublished,
            '非公開'   => $postTotal - $postPublished,
        ];

        $workStatusCount = [
            '公開済み' => $workPublished,
            '非公開'   => $workTotal - $workPublished,
        ];

        // ==================================================
        // タグ別件数（Post）
        // ==================================================
        $postTags = Post::whereNotNull('tags')
            ->pluck('tags')
            ->flatMap(fn ($tags) => array_map('trim', explode(',', $tags)))
            ->countBy()
            ->sortDesc();

        // タグ検索用リンク（Post）
        $postTagLinks = [];
        foreach ($postTags as $tag => $count) {
            $postTagLinks[$tag] = route('admin.posts.index', ['tag' => $tag]);
        }

        // 公開 / 非公開 フィルタリンク（Post）
        $postStatusLinks = [
            '公開済み' => route('admin.posts.index', ['status' => 'published']),
            '非公開'   => route('admin.posts.index', ['status' => 'unpublished']),
        ];

        // ==================================================
        // タグ別件数（Work）
        // ==================================================
        $workTags = Work::whereNotNull('tags')
            ->pluck('tags')
            ->flatMap(fn ($tags) => array_map('trim', explode(',', $tags)))
            ->countBy()
            ->sortDesc();

        // タグ検索用リンク（Work）
        $workTagLinks = [];
        foreach ($workTags as $tag => $count) {
            $workTagLinks[$tag] = route('admin.works.index', ['tag' => $tag]);
        }

        // 公開 / 非公開 フィルタリンク（Work）
        $workStatusLinks = [
            '公開済み' => route('admin.works.index', ['status' => 'published']),
            '非公開'   => route('admin.works.index', ['status' => 'unpublished']),
        ];

        // ==================================================
        // View にデータを渡す
        // ==================================================
        return view('admin.dashboard', compact(
            'postTotal',
            'postPublished',
            'workTotal',
            'workPublished',
            'latestPosts',
            'latestWorks',
            'postStatusCount',
            'workStatusCount',
            'postTags',
            'postTagLinks',
            'postStatusLinks',
            'workTags',
            'workTagLinks',
            'workStatusLinks'
        ));
    }
}
