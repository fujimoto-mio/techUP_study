<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', [\App\Http\Controllers\TodoListController::class, 'index']);

Route::get('/', [TaskController::class, 'index']);
Route::post('/create', [TaskController::class, 'create']);
Route::post('/edit', [TaskController::class, 'edit']);
Route::post('/delete', [TaskController::class, 'delete']);

Route::resource('tasks', TaskController::class);