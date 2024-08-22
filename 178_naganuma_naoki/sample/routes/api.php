<<<<<<< HEAD
=======

>>>>>>> 8323524ceb540dffb3fd992915be03ad3a851fad
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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/apisample', [ApiSample::class, 'apiHello']);
Route::post('/nameset', [ApiSample::class, 'nameSet']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

