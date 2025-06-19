<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追記

class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {//追記
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
