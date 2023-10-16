@extends('layouts.app')

@section('content')
<div class="container">
    <div id="user-edit-page" class="fade-in">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ユーザー編集') }}</div>

                    <div class="card-body">
                        <form id="user-edit-form" method="POST" action="{{ route('admin.update_user', ['id' => $user->id]) }}">
                            @csrf
                            @method('PUT')

                            <!-- 名前の編集 -->
                            <div class="form-group">
                                <label for="name">{{ __('名前') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                            </div>

                            <!-- メールアドレスの編集 -->
                            <div class="form-group">
                                <label for="email">{{ __('メールアドレス') }}</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>

                            <!-- パスワードの編集 -->
                            <div class="form-group">
                                <label for="password">{{ __('パスワード') }}</label>
                                <input id="password" type="password" class="form-control" name="password">
                                <input type="checkbox" onclick="togglePasswordVisibility('password')"> 表示切替
                            </div>

                            <!-- 管理者権限の編集 -->
                            <div class="form-group">
                                <label for="is_admin">{{ __('管理者') }}</label><br>
                                <input id="is_admin" type="checkbox" class="form-check-input" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('更新') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>
@endsection
