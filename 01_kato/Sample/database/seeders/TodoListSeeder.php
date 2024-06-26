<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;//追加

class TodoListSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_lists')->insert(
            [
                [
                    'name' => 'test1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'test2',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'test3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
    }

