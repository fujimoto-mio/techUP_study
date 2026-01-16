<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * お問い合わせテーブル
     */
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->string('name');                 // 名前
            $table->string('email');                // メール
            $table->string('phone', 20);             // 電話番号（必須）
            $table->string('company')->nullable();   // 企業名
            $table->string('category', 100);         // 選択カテゴリ
            $table->text('message');                 // 本文

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
