<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 実績（Work）モデル
 *
 * - $fillable で保存可能なカラムを指定
 * - $casts で型変換（boolean / integer）を自動化
 */
class Work extends Model
{
    use HasFactory;

    /**
     * 保存可能カラム（mass assignment 対応）
     */
    protected $fillable = [
        'title',        // タイトル
        'slug',         // URL用スラッグ
        'content',      // 説明文
        'youtube_url',  // YouTube動画URL
        'type',         // カテゴリー
        'service',      // サービス名
        'tags',         // カンマ区切りタグ
        'sort_order',   // 表示順
        'is_published', // 公開フラグ
    ];

    /**
     * 型変換（casts）
     *
     * - is_published は boolean 型として扱う
     * - sort_order は integer 型として扱う
     */
    protected $casts = [
        'is_published' => 'boolean',
        'sort_order'   => 'integer',
    ];
}
