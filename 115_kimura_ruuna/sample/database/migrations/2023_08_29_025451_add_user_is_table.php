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
        Schema::table('user', function (Blueprint $table) {
            $table->date('birthday')->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     * ここに処理を巻き戻す処理を書きます。
     * コマンド命令は、「php artisan migrate:rollback --step=1」
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('birthday'); 
        });
    }
}
