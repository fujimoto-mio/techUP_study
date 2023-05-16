<?php

namespace Database\Seeders;




use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoListSeeder extends Seeder
{
    public function run()

    {   

        DB::table('todo_lists')->insert(
            [
                [
                    'name' => 'テスト1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'テスト2',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'テスト3',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]

            );

    }
}
