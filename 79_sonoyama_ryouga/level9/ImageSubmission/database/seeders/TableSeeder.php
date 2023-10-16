<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ImageSubmission; //シェーダーテスト

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /*public function run(): void
    {
        //
    }*/

    public function run()
    {
        ImageSubmission::create([
            'column1' => 'value1',
            'column2' => 'value2',
            // ...
        ]);
    }
}
