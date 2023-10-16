<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- 左側に配置するメニューはここに追加 -->
            <ul class="navbar-nav mr-auto">
                <!-- 左側メニューの項目を追加 -->
            </ul>

            <ul class="navbar-nav ml-auto">
                @guest
                <!-- ログインしていない場合の表示 -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('アカウント新規作成') }}</a>
                </li>
                @endif
                @else
                <!-- ログインしている場合の表示 -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.mypage', ['id' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a>
                </li>

                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('ログアウト') }}
                    </a>
                </li>
                <!-- Upload Form リンクを追加 -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('upload.form') }}">{{ __('新規投稿') }}</a>
                </li>

                <!-- ユーザーが管理者の場合に管理者画面へのリンクを表示 -->
                @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('admin.users') }}" class="nav-link">ユーザー管理</a>
                @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>
