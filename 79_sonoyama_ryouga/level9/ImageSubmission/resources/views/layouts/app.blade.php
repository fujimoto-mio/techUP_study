<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css?20231005">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css?20231005') }}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&family=Kosugi+Maru&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <!-- スタイル -->
    <style>
        .invalid-feedback {
            color: red;
            /* エラーメッセージのテキストカラーを赤色に設定 */
        }
    </style>

    <!-- パスワード表示切替のJavaScript -->
    <script>
        var showPasswordButton = document.getElementById("showPasswordButton");
        showPasswordButton.addEventListener("click", togglePasswordVisibility);

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("passwordInput");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.textContent = "非表示";
            } else {
                passwordInput.type = "password";
                showPasswordButton.textContent = "表示";
            }
        }
    </script>

</head>

<body>

    <div id="app">
        @include('layouts.header')
        <script src="{{ asset('js/app.js') }}"></script>

        <main class="py-4">
            @yield('content')

        </main>

        @include('layouts.footer')
    </div>

    <!-- 投稿削除のJavaScript -->
    <script>
        function deletePost(postId) {
            if (confirm('投稿と内容を削除しますか？')) {
                axios.delete(`/admin/delete-post/${postId}`)
                    .then(response => {
                        // 成功時の処理
                        alert('投稿と内容が削除されました。');
                        $('#myModal').modal('hide'); // モーダルを閉じるなどの処理を追加する場合
                    })
                    .catch(error => {
                        // エラー時の処理
                        alert('削除に失敗しました。');
                    });
            }
        }
    </script>
</body>

</html>