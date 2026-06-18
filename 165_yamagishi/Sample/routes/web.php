<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
Route::get('/',[TaskController::class,'index']);//一覧表示
Route::post('/create',[TaskController::class,'create']);//タスク追加
Route::post('/edit',[TaskController::class,'edit']);//タスク更新
Route::post('/delete',[TaskController::class,'delete']);//タスク削除
 
Route::resource('tasks', TaskController::class);  //タスクのコントローラ
