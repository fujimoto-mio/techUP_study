<header x-data="{ open: false }"
        {{--  class="relative z-40 bg-white/30 backdrop-blur-md border-b border-white/20"> --}}
        class="relative z-40 bg-[#F0F3EA] border-b border-white/20">
    <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">

        <!-- ロゴ -->
        <div class="flex gap-5">
            <a href="{{ route('home') }}"
               class="text-xl font-bold text-[#C97A70]">
                ゆさんぽ
            </a>
            <div class="text-sm text-[#C97A70] py-1">
                全国の温泉レビュー共有サービス
            </div>
        </div>

        <!-- ハンバーガー -->
        <div class="relative">
            <button @click="open = !open"
                    class="text-gray-700 hover:text-orange-500">
                    <x-icon.menu class="w-6 h-6" />
            </button>

            <!-- ドロップダウン -->
            <div x-show="open"
                 @click.outside="open = false"
                 x-transition
                 x-cloak
                 class="absolute right-0 top-full mt-2 w-48 bg-white shadow-lg rounded-lg p-4 space-y-3 z-50">

                <a href="{{ route('onsens.index') }}"
                   class="block text-gray-700 hover:text-orange-500">
                    温泉一覧
                </a>

                @auth
                    <a href="{{ route('mypage') }}"
                       class="block text-gray-700 hover:text-orange-500">
                        マイページ
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="block text-gray-700 hover:text-orange-500">
                            ログアウト
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="block text-gray-700 hover:text-orange-500">
                        ログイン
                    </a>
                @endauth

            </div>
        </div>
    </div>
</header>