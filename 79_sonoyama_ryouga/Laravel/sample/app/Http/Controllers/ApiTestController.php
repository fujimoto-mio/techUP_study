<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\user;

class ApiTestController extends Controller
{
    public function dataInsert(Request $request)
    {
        $users = new User;
        $users->name = 'test';
        $users->email = 'test@test.jp';

        $users->save();
    }
}
