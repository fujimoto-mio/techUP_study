<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\TaskController;
=======

>>>>>>> master
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

<<<<<<< HEAD
Route::get('/list', [\App\Http\Controllers\TodoListController::class, 'index']);

Route::get('/',[TaskController::class,'index']);
Route::post('/create',[TaskController::class,'create']);
Route::post('/edit',[TaskController::class,'edit']);
Route::post('/delete',[TaskController::class,'delete']);
Route::resource('tasks', TaskController::class);
=======
Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', [\App\Http\Controllers\TodoListController::class, 'index']);
>>>>>>> master
