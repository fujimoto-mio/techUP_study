<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\ReservationPublicController;
use App\Http\Controllers\ReservationFormController;
use App\Http\Controllers\CalendarController;

// トップページ
Route::get('/', function () {
    return view('welcome');
});

//顧客側予約フォーム
Route::get('/reserve', [ReservationFormController::class, 'showForm'])->name('reserve.form');
Route::post('/reserve', [ReservationFormController::class, 'submitForm'])->name('reserve.submit');

//  ダッシュボード（管理者用）
Route::get('/dashboard', [ReservationController::class, 'index'])
    ->middleware('auth:admin')
    ->name('dashboard');

// 管理者認証が必要な予約関連ルート
Route::middleware('auth:admin')->prefix('reservations')->name('reservations.')->group(function () {
    Route::get('create', [ReservationController::class, 'create'])->name('create');
    Route::post('/', [ReservationController::class, 'store'])->name('store');
    Route::get('{id}/edit', [ReservationController::class, 'edit'])->name('edit');
    Route::put('{id}', [ReservationController::class, 'update'])->name('update');
    Route::patch('{id}/cancel', [ReservationController::class, 'cancel'])->name('cancel');
});

// ユーザープロファイル（ログインユーザー）
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 顧客向け：予約確認ページ
Route::get('/reservations/confirm', [ReservationPublicController::class, 'confirm'])->name('reservations.confirm');

//顧客向け：予約完了後のページ
Route::get('/reserve/thanks', function () {
    return view('reserve.thanks');
    })->name('reserve.thanks');

// 顧客向け：予約キャンセル処理
Route::patch('/reservations/cancel', [ReservationPublicController::class, 'guestCancel'])->name('reservations.guestCancel');

// 予約カレンダーページ
Route::get('/calendar', [CalendarController::class, 'show'])->name('calendar.show');
Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');

// 予約が埋まっている日付を取得
Route::get('/calendar/booked-dates', [CalendarController::class, 'bookedDates'])->name('calendar.booked_dates');



// 認証関連ルート（Laravel Breeze など）
require __DIR__.'/auth.php';
