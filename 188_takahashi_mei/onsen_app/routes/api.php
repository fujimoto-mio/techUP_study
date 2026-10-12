<?php
Route::get('/test-api', function () { return 'OK'; });
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnsenController;

Route::get('/onsens', [OnsenController::class, 'index']);
Route::post('/onsens', [OnsenController::class, 'store']);