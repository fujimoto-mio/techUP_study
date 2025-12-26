<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // ログインしていない場合
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        // 管理者でない場合
        if (!Auth::user()->is_admin) {
            Auth::logout();
            return redirect()->route('admin.login')
                ->withErrors(['email' => '管理者権限が必要です。']);
        }

        return $next($request);
    }
}

