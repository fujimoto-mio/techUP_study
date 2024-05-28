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

Route::get('/tasks', [TaskController::class, 'index']); //一覧表示のURLとコントローラ場所
Route::post('/create', [TaskController::class, 'create']);
Route::post('/edit', [TaskController::class, 'edit']);
Route::post('/delete', [TaskController::class, 'delete']);

Route::resource('tasks', TaskController::class); //タスクのコントローラ