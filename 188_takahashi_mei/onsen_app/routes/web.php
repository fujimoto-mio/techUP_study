<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnsenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MypageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//ログイン（未）
Route::get('/onsens', [OnsenController::class, 'index'])->name('onsens.index');
Route::get('/onsens/{onsen}', [OnsenController::class, 'show'])->name('onsens.show');

//ログイン（必須）
Route::middleware('auth')->group(function () {
    // ユーザープロフィール関連
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // レビュー関連
    Route::get('/onsens/{onsen}/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/onsens/{onsen}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    // いいね
    Route::post('/onsens/{onsen}/like', [LikeController::class, 'toggle'])->name('onsens.like');
    //マイページ
    Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');
    //マイページアイコン
    Route::post('/mypage/icon', [MypageController::class, 'updateIcon'])->name('mypage.icon');

});

require __DIR__ . '/auth.php';
