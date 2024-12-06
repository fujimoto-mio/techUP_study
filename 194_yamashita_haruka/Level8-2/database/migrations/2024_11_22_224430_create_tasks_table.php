<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::create('tasks', function (Blueprint $table) {
    $table->id();
    $table->string('name', 100);
    $table->boolean('status')->default(false);
    $table->timestamp('updated_at')->useCurrent()->nullable();
    $table->timestamp('created_at')->useCurrent()->nullable();
  });

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
            $table->id();
            $table->string('name', 100);
            $table->boolean('status')->default(false);
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->timestamps('created_at')->useCurrent()->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->date('birthday')->after('remember_token');  //カラム追加
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
        
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birthday');  //カラム削除
        });
    }
}
