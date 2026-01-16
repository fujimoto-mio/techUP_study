<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('news'); // news / announcement など
            $table->string('title');
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->string('tags')->nullable(); // カンマ区切り
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable(); // 追加
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts'); // テーブル丸ごと削除
    }
};
