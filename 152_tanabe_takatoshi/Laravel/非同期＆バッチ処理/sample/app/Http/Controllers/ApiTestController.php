<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // 仮にUserモデルを使用するとします

class ApiTestController extends Controller
{
  public function insertData(Request $request)
  {
    // リクエストからデータを取得し、データベースに挿入する処理を記述します
    $data = $request->all();

    User::create($data); // 仮にUserモデルを使用してデータを挿入するとします

    return response()->json(['message' => 'Data inserted successfully'], 200);
  }
}
