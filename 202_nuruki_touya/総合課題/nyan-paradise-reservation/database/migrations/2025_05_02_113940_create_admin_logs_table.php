<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->id(); // ログID (PK)
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade'); // 操作した管理者ID
            $table->string('action'); // 実行した操作（例：予約キャンセル）
            $table->string('target_type'); // 対象タイプ（Reservation, User など）
            $table->unsignedBigInteger('target_id'); // 対象ID（予約IDなど）
            $table->timestamp('created_at')->useCurrent(); // 操作日時（作成のみ）
        });
    }
    public function down()
    {
        Schema::dropIfExists('admin_logs');
    }
};