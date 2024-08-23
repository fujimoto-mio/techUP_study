<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSample;

Route::get('/apisample', [ApiSample::class, 'apiHello']);
Route::post('/nameset', [ApiSample::class, 'nameSet']);
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/apisample', [ApiSample::class, 'apiHello']);
Route::post('/nameset', [ApiSample::class, 'nameSet']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
<<<<<<<< HEAD:178_naganuma_naoki/sample/routes/api.php
});
========
});

Route::get('/apisample', [ApiSample::class, 'apiHello']);
Route::post('/nameset', [ApiSample::class, 'nameSet']);
>>>>>>>> b05226e5d6e5a20eaf67ab862a82c971e90c9ef7:180_kuwahara_yuuhi/L3-6 1/laravel/samplelaravel/routes/api.php
