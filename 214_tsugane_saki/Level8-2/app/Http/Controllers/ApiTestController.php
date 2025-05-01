<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\InsertBirthdayUser;

class ApiTestController extends Controller
{
    public function dataInsert()
    {
        InsertBirthdayUser::dispatch();
        return response()->json(['message' => 'データ挿入ジョブを実行しました']);
    }
}
