<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,  // 信頼されたホスト
        \App\Http\Middleware\TrustProxies::class, // プロキシに信頼されるミドルウェア
        \Illuminate\Http\Middleware\HandleCors::class, // CORSミドルウェア
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class, // メンテナンス中のリクエスト防止ミドルウェア
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class, // POSTサイズの検証
        \App\Http\Middleware\TrimStrings::class, // 文字列のトリミング
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class, // 空文字をnullに変換
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class, // クッキーの暗号化
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, // レスポンスにクッキーを追加
            \Illuminate\Session\Middleware\StartSession::class, // セッションの開始
            \Illuminate\View\Middleware\ShareErrorsFromSession::class, // セッションのエラーをビューに共有
            \App\Http\Middleware\VerifyCsrfToken::class, // CSRFトークンの検証
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // ルートモデルバインディングの置換
            \App\Http\Middleware\IsAdminMiddleware::class, // 管理者アクセスをチェックするカスタムミドルウェア
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api', // APIリクエストのスロットリング
            \Illuminate\Routing\Middleware\SubstituteBindings::class, // ルートモデルバインディングの置換
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class, // 認証ミドルウェア
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class, // ベーシック認証ミドルウェア
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class, // セッション認証ミドルウェア
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class, // キャッシュヘッダの設定ミドルウェア
        'can' => \Illuminate\Auth\Middleware\Authorize::class, // 誖許可ミドルウェア
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class, // ゲストミドルウェア
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class, // パスワード確認ミドルウェア
        'precognitive' => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class, // 予知リクエストハンドリングミドルウェア
        'signed' => \App\Http\Middleware\ValidateSignature::class, // 署名の検証ミドルウェア
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class, // リクエストのスロットリングミドルウェア
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class, // メール確認ミドルウェア
    ];

    protected $routeMiddleware = [
        'auth.user' => \App\Http\Middleware\AuthenticateUser::class, // ユーザー認証ミドルウェア
        'admin' => \App\Http\Middleware\IsAdminMiddleware::class, // 管理者アクセスをチェックするカスタムミドルウェア
    ];
}
