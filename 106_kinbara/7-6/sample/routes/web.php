<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ApiTestController;

Route::get('/dataInsert', [\App\Http\Controllers\ApiTestController::class, 'dataInsert']);
Route::post('/dataInsert', [\App\Http\Controllers\ApiTestController::class, 'dataInsert']);
Route::post('sample', 'ApiTestController@postValidates');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/list', [\App\Http\Controllers\TodoListController::class, 'index']);

Route::get('/',[TaskController::class,'index']);//後から追加になってしまった
Route::post('/create',[TaskController::class,'create']);
Route::post('/edit',[TaskController::class,'edit']);
Route::post('/delete',[TaskController::class,'delete']);

Route::resource('tasks', TaskController::class);


/*get PC→一覧表示（受け取る)post→タスク送る（送る） 
clat 処理
*/