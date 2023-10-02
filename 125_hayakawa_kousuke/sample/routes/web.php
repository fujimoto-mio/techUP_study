<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ApiTestController;

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
Route::get('/',[TaskController::class,'index']);
Route::post('/create',[TaskController::class,'create']);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/delete',[TaskController::class,'delete']);

Route::resource('tasks',TaskController::class);

Route::get('dataInsert', [\App\Http\Controllers\ApiTestController::class, 'dataInsert']);
 