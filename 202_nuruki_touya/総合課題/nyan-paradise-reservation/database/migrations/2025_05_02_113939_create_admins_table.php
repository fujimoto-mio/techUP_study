<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // 管理者ID (PK)
            $table->string('name'); // 管理者名
            $table->string('email')->unique(); // メールアドレス
            $table->string('password'); // ハッシュ化パスワード
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
};