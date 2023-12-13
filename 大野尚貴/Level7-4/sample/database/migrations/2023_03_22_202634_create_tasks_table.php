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
            $table->id();
            $table->string('name', 100);
            $table->boolean('status')->default(false);
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
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
<<<<<<<< HEAD:89_toyoshima_erina/Laravel/Sample/database/migrations/2023_05_29_102056_create_tasks_table.php
};
========
};
>>>>>>>> 6224827902c91a3137a142f9c975857b4c640a35:大野尚貴/Level7-4/sample/database/migrations/2023_03_22_202634_create_tasks_table.php
