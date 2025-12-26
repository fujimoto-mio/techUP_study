<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\TopController;              
use App\Http\Controllers\Front\AboutController;            
use App\Http\Controllers\Front\SolutionsController;        
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\WorksController;
use App\Http\Controllers\Front\PostsController;            

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\WorkController as AdminWorkController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ImageUploadController;
/*
|--------------------------------------------------------------------------
| Coming Soon（EN専用）
|--------------------------------------------------------------------------
*/
Route::get('/en', function () {
    return view('front.coming-soon-en');
})->name('coming.soon.en');

/*
|--------------------------------------------------------------------------
| フロント（JAのみ）
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => '{lang}',
    'where'  => ['lang' => 'ja'],
    'as'     => 'front.',
], function () {

    // ───── TOPページ ─────
    Route::get('/', [TopController::class, 'index'])->name('home');

    // ───── ABOUTページ ─────
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');

    // ───── SOLUTIONSページ ─────
    Route::get('/solutions/gnmedia', [SolutionsController::class, 'gnmedia'])->name('gnmedia');
    Route::get('/solutions/gnstudio', [SolutionsController::class, 'gnstudio'])->name('gnstudio');
    Route::get('/solutions/gnacademy', [SolutionsController::class, 'gnacademy'])->name('gnacademy');

    // ───── NEWS / BLOG ─────
    Route::get('/news', [NewsController::class, 'index'])->name('newsblog.index');
    Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

    // ───── WORKS ─────
    Route::get('/works', [WorksController::class, 'index'])->name('works.index');
    Route::get('/works/{slug}', [WorksController::class, 'show'])->name('works.show');


    // ───── お問い合わせページ ─────
    Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
    // サンクスページ（先に定義）
    Route::get('/contact/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');
    // 送信処理
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

    // ───── 個人情報保護方針 ─────
    Route::get('/privacy-policy', function () {
        return view('front.privacy-policy');
    })->name('privacy.policy');

});

/*
|--------------------------------------------------------------------------
| 管理画面ルート (/admin)
|--------------------------------------------------------------------------
*/
// 管理者ログイン関連ルート
Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');
});

// 管理者専用ルート（AdminAuth ミドルウェアを適用）
Route::middleware(['admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // ダッシュボード
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        // 投稿管理
        Route::resource('posts', AdminPostController::class);

        // 実績管理
        Route::resource('works', AdminWorkController::class);

        // TinyMCE 画像アップロード用
        Route::post('images/upload', [ImageUploadController::class, 'store'])
            ->name('images.upload');

    });

