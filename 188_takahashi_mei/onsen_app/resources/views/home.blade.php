<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-20 text-center">

        <h1 class="text-4xl font-bold mb-4">
            あなたにぴったりの温泉を見つけよう
        </h1>

        <p class="text-gray-600 mb-8">
            全国の温泉レビュー共有サービス
        </p>

        <form method="GET" action="{{ route('onsens.index') }}" class="flex justify-center gap-3">
            <input
                type="text"
                name="keyword"
                placeholder="温泉名・エリアで検索"
                class="border rounded px-4 py-3 w-80"
            >
            <button class="bg-blue-500 text-white px-6 py-3 rounded">
                検索
            </button>
            
        </form>

        <div class="mt-6 space-x-4">
            <a href="{{ route('login') }}" class="underline">ログイン</a>
            <a href="{{ route('register') }}" class="bg-gray-800 text-white px-4 py-2 rounded">
                新規登録
            </a>
        </div>

    </div>
</x-app-layout>