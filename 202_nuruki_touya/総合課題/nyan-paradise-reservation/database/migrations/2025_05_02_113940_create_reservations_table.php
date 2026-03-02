<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id(); // 予約ID (PK)
            $table->string('user_name'); // 顧客名
            $table->string('user_kana'); // ふりがな
            $table->string('people'); // 予約人数（文字列で保存）
            $table->string('email'); // メールアドレス
            $table->string('phone'); // 電話番号
            $table->date('reservation_date'); // 予約日
            $table->time('time_slot'); // 予約時間
            $table->enum('status', ['予約中', '予約確定済み', 'キャンセル'])->default('予約中'); // 予約状態
            $table->string('token')->nullable(); // トークン（任意）
            $table->string('calendar_event_id')->nullable(); // Google Calendar ID（任意）
            $table->timestamps(); // created_at, updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
