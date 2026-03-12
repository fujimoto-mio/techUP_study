<header x-data="{ open: false }" class="relative z-40 bg-[#FFF7ED] border-b border-white/20">
    <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">

        <!-- ロゴ -->
        <div class="flex gap-5">
            <a href="{{ route('home') }}" class="text-xl font-bold text-[#F59E0B]">
                ゆさんぽ
            </a>
            <div class="text-sm text-[#F59E0B] py-1">
                全国の温泉レビュー共有サービス
            </div>
        </div>
        <!-- PCナビ -->
        <nav class="hidden md:flex items-center gap-6 text-sm">

            <a href="{{ route('onsens.index') }}" class="text-gray-700 hover:text-orange-500">

                温泉一覧
            </a>
            <span class="text-green-600">|</span>
            <a href="{{ route('rankings.index') }}" class="text-gray-700 hover:text-orange-500">
                ランキング
            </a>
            <span class="text-green-600">|</span>
            @auth
                <a href="{{ route('mypage') }}" class="text-gray-700 hover:text-orange-500">
                    マイページ
                </a>
                <span class="text-green-700">|</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-gray-600 hover:text-orange-500">
                        ログアウト
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-orange-500">
                    ログイン
                </a>
            @endauth

        </nav>


        <!-- ハンバーガー -->
        <div class="relative md:hidden">
            <button @click="open = !open" class="text-gray-700 hover:text-orange-500 border border-gray-300 rounded-lg p-2">
                <x-icon.menu class="w-6 h-6" />
            </button>

            <!-- ドロップダウン -->
            <div x-show="open" @click.outside="open = false" x-transition x-cloak
                class="absolute right-0 top-full mt-2 w-48 bg-white shadow-lg rounded-lg p-4 space-y-3 z-50">


                <a href="{{ route('onsens.index') }}" class="block text-gray-700 hover:text-orange-500">
                    温泉一覧
                </a>
                <a href="{{ route('rankings.index') }}" class="block text-gray-700 hover:text-orange-500">
                    ランキング
                </a>

                @auth
                    <a href="{{ route('mypage') }}" class="block text-gray-700 hover:text-orange-500">
                        マイページ
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="block text-gray-700 hover:text-orange-500">
                            ログアウト
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-gray-700 hover:text-orange-500">
                        ログイン
                    </a>
                @endauth

            </div>
        </div>
    </div>
</header>