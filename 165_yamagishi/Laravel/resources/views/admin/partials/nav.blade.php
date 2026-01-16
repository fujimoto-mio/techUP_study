<nav class="admin-nav">
    <div class="admin-nav-inner">

        {{-- 左側：ロゴ＋会社名＋メニュー --}}
        <div class="admin-nav-left">
            <a href="{{ route('admin.dashboard') }}" class="admin-brand">
                <img src="{{ asset('images/GN_Logo_White.svg') }}" alt="GLOBE NATION" class="admin-brand-logo">
                <span class="admin-brand-name">GLOBE NATION</span>
            </a>

            <ul class="admin-nav-list">

                {{-- ダッシュボード --}}
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="admin-nav-item">
                        ダッシュボード
                    </a>
                </li>


                {{-- ＋ 新規投稿 --}}
                <li class="has-dropdown
                    {{ request()->routeIs('admin.posts.create') || request()->routeIs('admin.works.create') ? 'active' : '' }}">

                    <span class="dropdown-trigger admin-nav-item">
                        ＋ 新規投稿
                    </span>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin.posts.create') }}">
                                NEWS & BLOG 新規投稿
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.works.create') }}">
                                WORKS 新規投稿
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- 投稿一覧 --}}
                <li class="has-dropdown
                    {{ request()->routeIs('admin.posts.index') || request()->routeIs('admin.works.index') ? 'active' : '' }}">

                    <span class="dropdown-trigger admin-nav-item">
                        投稿一覧
                    </span>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin.posts.index') }}">
                                NEWS & BLOG 一覧
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.works.index') }}">
                                WORKS 一覧
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>

        {{-- 右側：ログインユーザー --}}
        <div class="admin-nav-user">
            <span class="admin-user-name">
                {{ Auth::user()->name ? Auth::user()->name . ' さん' : Auth::user()->email }}
            </span>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="logout-btn">
                    ログアウト
                </button>
            </form>

            {{-- ハンバーガー --}}
            <button class="hamburger" id="hamburgerBtn">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="menu-overlay" id="menuOverlay"></div>
            <div class="mobile-menu" id="mobileMenu">
                <ul class="mobile-nav-list">

                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        ダッシュボード
                        </a>
                    </li>

                    <li class="mobile-dropdown">
                        <button class="mobile-dropdown-trigger">
                            ＋ 新規投稿
                        </button>
                        <ul class="mobile-dropdown-menu">
                            <li><a href="{{ route('admin.posts.create') }}">NEWS & BLOG 新規投稿</a></li>
                            <li><a href="{{ route('admin.works.create') }}">WORKS 新規投稿</a></li>
                        </ul>
                    </li>

                    <li class="mobile-dropdown">
                        <button class="mobile-dropdown-trigger">
                            投稿一覧
                        </button>
                        <ul class="mobile-dropdown-menu">
                            <li><a href="{{ route('admin.posts.index') }}">NEWS & BLOG</a></li>
                            <li><a href="{{ route('admin.works.index') }}">WORKS</a></li>
                        </ul>
                    </li>

                    <li class="mobile-divider"></li>

                    <li class="mobile-user">
                        {{ Auth::user()->name }} さん
                    </li>

                    <li>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button class="mobile-logout">ログアウト</button>
                        </form>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</nav>
