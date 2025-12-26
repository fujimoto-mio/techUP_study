<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * 投稿（ニュース / ブログ）モデル
 *
 * - $fillable で保存可能なカラムを指定
 * - 保存前に slug を自動生成
 */
class Post extends Model
{
    use HasFactory;

    /**
     * 保存可能カラム（mass assignment 対応）
     */
    protected $fillable = [
        'type',        // ジャンル（news / blog）
        'title',       // タイトル
        'content',     // 本文
        'image_path',  // 画像パス
        'tags',        // カンマ区切りタグ
        'is_published',// 公開フラグ
        'slug',        // URL用スラッグ
        'published_at',// 公開日
        'service',     // サービス名
    ];

    /**
     * モデルの保存前処理
     *
     * - slug が空の場合、title から自動生成
     * - 既存 slug と重複しないように末尾に数字を付与
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            // slug が空なら title から自動生成
            if (empty($post->slug)) {
                $slug = Str::slug($post->title);

                // 既存の slug と重複しないように末尾に数字を追加
                $count = 1;
                $baseSlug = $slug;
                while (Post::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $count++;
                }

                $post->slug = $slug;
            }
        });
    }
}
