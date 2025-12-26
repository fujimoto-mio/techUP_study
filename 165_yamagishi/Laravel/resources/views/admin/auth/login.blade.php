@extends('admin.layouts.auth')

@push('head')
    @vite('resources/css/admin/auth/login.css')
@endpush

@section('content')
<div class="login-wrapper">
     {{-- ロゴ・会社名 --}}
    <div class="login-brand">
        <img src="{{ asset('images/GN_Logo_Black.svg') }}" alt="Company Logo" class="login-logo">
        <span class="login-company">GLOBE NATION</span>
    </div>
    <div class="login-card">
        <h2>Login</h2>

        {{-- エラーメッセージ --}}
        @if($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="login-form">
            @csrf

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password" required>
            </div>

            <label class="remember-wrap">
                <input type="checkbox" name="remember">
                ログイン状態を保持
            </label>

            <button type="submit" class="btn-login">ログイン</button>
        </form>
    </div>
</div>
@endsection
