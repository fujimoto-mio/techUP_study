@extends('layouts.app')

@section('content')
<div class="container">
    <div id="page" class="fade-in">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- 新規作成フォームの開始 -->
                    <div class="card-header">{{ __('新規作成') }}</div>

                    <div class="card-body">
                        <!-- フォームの開始 -->
                        <form id="registration-form" method="POST" action="{{ route('register') }}" novalidate="{{ $novalidate }}">
                            @csrf

                            <!-- 名前入力フィールド -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    <!-- エラーメッセージ -->
                                    @error('name')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- メールアドレス入力フィールド -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    <!-- エラーメッセージ -->
                                    @error('email')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- パスワード入力フィールド -->
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    <!-- エラーメッセージ -->
                                    @error('password')
                                    <span class="invalid-feedback" role="alert" style="color: red;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- パスワード確認入力フィールド -->
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <!-- 登録ボタン -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <!-- アカウントを持っている場合のログインページリンク -->
                            <div class="form-group row mb-0 mt-3">
                                <div class="col-md-8 offset-md-4">
                                    <!-- ログインページへのリンク -->
                                    <p>アカウントを既にお持ちの場合は<a href="{{ route('login') }}">こちら</a>からログインしてください。</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // ページが読み込まれたときに novalidate 属性を追加する
    window.addEventListener('load', function() {
        var form = document.getElementById('registration-form');
        if (form) {
            form.setAttribute('novalidate', 'true');
        }
    });
</script>
@endsection