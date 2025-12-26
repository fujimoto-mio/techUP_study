<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 管理者ログインを扱うコントローラ
 */
class LoginController extends Controller
{
    /**
     * 管理者ログインフォーム表示
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * 管理者ログイン処理
     */
    public function login(Request $request)
    {
        // 入力値のバリデーション
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 認証失敗時は即リターン
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => 'メールアドレスまたはパスワードが正しくありません。',
            ]);
        }

        // セッション固定攻撃対策
        $request->session()->regenerate();

        // 管理者でない場合はログアウトして拒否
        if (!Auth::user()->is_admin) {
            $this->logoutAndInvalidateSession($request);

            return back()->withErrors([
                'email' => '管理者権限がありません。',
            ]);
        }

        // 管理者ログイン成功
        return redirect()->intended(route('admin.dashboard'));
    }

    /**
     * 管理者ログアウト処理
     */
    public function logout(Request $request)
    {
        $this->logoutAndInvalidateSession($request);

        return redirect()->route('admin.login');
    }

    /**
     * ログアウト＋セッション無効化処理
     * （ログイン拒否時・通常ログアウトで共通利用）
     */
    private function logoutAndInvalidateSession(Request $request): void
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
