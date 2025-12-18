<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('レビュー投稿') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-2xl mx-auto">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <h3 class="text-lg font-semibold mb-4">{{ $onsen->name }} へのレビュー</h3>

            <form method="POST" action="{{ route('reviews.store', $onsen->id) }}">
                @csrf

                <!-- 評価 -->
                <label class="block mb-2">評価 (1-5)</label>
                <input type="number" name="rating" min="1" max="5"
                       class="w-full mb-2 p-2 border rounded" required>
                @error('rating')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <!-- コメント -->
                <label class="block mb-2">コメント</label>
                <textarea name="comment" rows="5"
                          class="w-full mb-2 p-2 border rounded"></textarea>
                @error('comment')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <!-- 投稿ボタン -->
                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    投稿する
                </button>
            </form>

        </div>
    </div>
</x-app-layout>