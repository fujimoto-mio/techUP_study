<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                    'name' => 'テスト１',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'テスト２',
                    'created_at' => now(),
                    'updated_at' => now(),   
                ],
                [
                    'name' => 'テスト３',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}