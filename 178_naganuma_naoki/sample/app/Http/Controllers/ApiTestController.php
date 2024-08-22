<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ApiTestController extends Controller
{
    public function dataInsert()
    {
        $user = new User();
        $user->name = 'John Doe';
        $user->email = 'john.doe@example.com';
        $user->password = bcrypt('password');
        $user->birthday = '2000-01-01';
        $user->save();

        return 'Data inserted successfully!';
    }
}
