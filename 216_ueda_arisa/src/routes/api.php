<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiSample; 
 
Route::get('/apisample', [ApiSample::class, 'apiHello']); 
Route::post('/nameset', [ApiSample::class, 'nameSet']);