<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnsenController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/onsens', [OnsenController::class, 'index']) ->name('onsens.index');
    // ユーザープロフィール関連
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // レビュー投稿用
    Route::get('/onsens/{onsen}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/onsens/{onsen}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    //温泉詳細画面
    Route::get('/onsens/{onsen}', [OnsenController::class, 'show'])->name('onsens.show');
});

require __DIR__.'/auth.php';
