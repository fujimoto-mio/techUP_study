<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
 feature/ozeki_hiroka_p9
        $this->call([
            TodoListSeeder::class

        ]);

        // \App\Models\User::factory(10)->create();
    }
}
