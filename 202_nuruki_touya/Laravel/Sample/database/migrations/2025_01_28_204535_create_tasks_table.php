<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            //tasksという名前のテーブルを作成
            $table->id();
            $table->string('name',100);
            //stringで文字列を保存する。
            $table->boolean('status')->default(false);
            //デフォルトでfalseに設定した状態のステータス。特に操作しなければタスクがまだ未完了ステータスにしたいから
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            //更新日時と作成日時をいれる
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
