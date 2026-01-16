<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * お問い合わせ内容を保存する Eloquent モデル
 *
 * ・fillable で保存可能なカラムを指定
 */
class Contact extends Model
{
    /**
     * 保存可能カラム（mass assignment 対応）
     *
     * @var array
     */
    protected $fillable = [
        'name',       // お名前
        'email',      // メールアドレス
        'phone',      // 電話番号
        'company',    // 会社名（任意）
        'category',   // お問い合わせ種別
        'message',    // お問い合わせ内容
    ];
}
