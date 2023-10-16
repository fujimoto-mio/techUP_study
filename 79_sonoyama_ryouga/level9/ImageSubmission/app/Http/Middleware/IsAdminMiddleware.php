<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
use App\Models\User; // User モデルを利用するために追加

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // ユーザーがログインしており、かつ管理者でない場合
        if (auth()->check() && $user && $user->isAdmin()) {
            return $next($request);
        }

        // 管理者の場合は次のミドルウェアや処理に移動
        return $next($request);
        // return Redirect::route('admin.dashboard');
    }
}
