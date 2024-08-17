<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birthday')->after('remember_token');  //カラム追加
        });
    }

    /**
     * Reverse the migrations.
     *　ここに処理を巻き戻す処理を書きます。
     * コマンド命令はは、「php artisan migrate:rollback --step=1」
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birthday');  //カラム削除
        });
    }
}
