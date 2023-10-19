<?php

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/profile', function () {
    $user = App\Models\User::find(1);
    return view('profile', ['user' => $user]);
});


Route::get('/upload', [ImageUploadController::class, 'showUploadForm'])->name('upload.form'); // 投稿フォーム
Route::post('/upload', [ImageUploadController::class, 'upload'])->name('upload');

Route::get('/upload-form', [ImageUploadController::class, 'showUploadForm'])->name('upload.form.link'); // 投稿フォームへのリンク

Route::get('/image/{id}', [ImageUploadController::class, 'showDetails'])->name('image.details'); //投稿完了内容の確認
Route::get('/upload/success', 'ImageUploadController@showUploadSuccess')->name('upload.success'); //投稿完了ページから投稿フォームに戻る
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['register' => false]); // ユーザー登録機能を無効化

Route::middleware(['auth.user'])->group(function () {
    // ログインが必要なルート
});

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register'); //新規登録画面
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login'); //ログインページに移動するリンク

Route::post('/login', 'Auth\LoginController@login'); //ログインページ
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', 'HomeController@index')->name('home'); //homeページ
Route::get('/home', [HomeController::class, 'showUserImages'])->name('home');
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show'); // 詳細ページ
Route::post('/post/{post}/addReview', [PostController::class, 'addReview'])->name('post.addReview');// レビュー
Route::post('/post/{post}/like', [PostController::class, 'like'])->name('post.like'); // いいね機能


Route::middleware(['auth'])->group(function () { // マイページ
    Route::get('/mypage', [UserController::class, 'mypage'])->name('user.mypage');
    Route::get('/user/mypage', [UserController::class, 'mypage'])->name('user.mypage');
    Route::get('/user/mypage/{id}', [UserController::class, 'mypage'])->name('user.mypage.id');
    Route::get('/mypage', [MyPageController::class, 'showMyPage'])->name('mypage.show');
});

Route::middleware(['admin'])->group(function () { // 管理画面関係
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'userList'])->name('admin.users');
    Route::post('/admin/toggle_admin/{userId}', [AdminController::class, 'toggleAdmin'])->name('admin.toggle_admin');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.edit_user');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.update_user');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete_user');
    Route::delete('/admin/delete-post/{postId}', [AdminController::class, 'deletePost'])->name('admin.delete_post');
});

Route::get('scss', function () {
    return view('for-scss');
});