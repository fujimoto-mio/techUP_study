<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiTestController extends Controller
{
    public function dateInsert()
    {
        DB::table('users')->insert([
            'name' => '早川',
            'email' => 'kosuke@gmail.com',
            'password' => '1234',
            'birthday' => '2002-01-17',
        ]);

        return response()->json(['message' => 'Data inserted successfully']);
    }
}
