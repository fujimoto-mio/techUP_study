<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiTest extends Controller
{
    public function dataInsert()
    {
        User::factory(1)->create();
        exec('php ' . base_path('artisan') . ' send:birthday-mail > /dev/null 2>&1 &');
    }
}