<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('onsen_tag')->truncate();
        DB::table("tags")->truncate();
        DB::table('tags')->insert([
            ['name' => '露天風呂'],
            ['name' => '貸切風呂'],
            ['name' => '源泉かけ流し'],
            ['name' => 'サウナ'],
        ]);
    }
}
