<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ $onsen->name }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6">
       
        <!-- 温泉情報 -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <p class="text-gray-600">住所：{{ $onsen->address }}</p>
            <p class="mt-2">{{ $onsen->description }}</p>
        </div>

       <!-- レビュー一覧 -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">レビュー</h3>

            @forelse ($onsen->reviews as $review)
                <div class="border-b py-4">
                    <p>評価：{{ $review->rating }} / 5</p>
                    <p>{{ $review->comment }}</p>
                    <p class="text-sm text-gray-500">
                        投稿者：{{ $review->user->name ?? '匿名' }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500">まだレビューがありません</p>
            @endforelse
           <!-- レビュー投稿 -->
            @auth
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold mb-4">レビューを書く</h3>

                    <form method="POST" action="{{ route('reviews.store', $onsen->id) }}">
                        @csrf

                        <label class="block mb-2">評価 (1〜5)</label>
                        <input type="number" name="rating" min="1" max="5" class="w-full mb-2 p-2 border rounded" required>

                        <label class="block mb-2">コメント</label>
                        <textarea name="comment" rows="4" class="w-full mb-2 p-2 border rounded"></textarea>

                        <button class="px-4 py-2 bg-blue-500 text-white rounded">
                            投稿する
                        </button>
                    </form>
                </div>
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                             {{ session('success') }}
                        </div>
                    @endif
            @else
                <p class="text-center text-gray-500">
                    レビューを書くには <a href="/login" class="text-blue-500">ログイン</a> してください
                </p>
            @endauth

        </div>
</x-app-layout>