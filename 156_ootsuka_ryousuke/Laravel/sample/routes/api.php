<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSample;
feature/ootsuka_p-8
use \App\Http\Controllers\ApiProductController;
master

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
feature/ootsuka_p-8
Route::post('/nameset', [ApiSample::class, 'nameSet']);
Route::get('products', [ApiProductController::class, 'index']);
Route::post('products', [ApiProductController::class, 'store']);
Route::post('/nameset', [ApiSample::class, 'nameSet']);

master
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
