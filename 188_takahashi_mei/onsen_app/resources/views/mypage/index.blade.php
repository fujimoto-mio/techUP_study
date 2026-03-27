<x-app-layout bg="/images/washibg.jpg">
    <div class="max-w-5xl mx-auto py-10 space-y-10">

        <!-- プロフィールヘッダー -->
        <div class="bg-white rounded-2xl shadow-sm p-8 flex items-center gap-6">
            @if($user->icon)
                <img src="{{ $user->icon }}" class="w-24 h-24 rounded-full object-cover border">
            @else
                <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-2xl text-gray-500">
                    {{ mb_substr($user->name, 0, 1) }}
                </div>
            @endif

            <div class="flex-1">
                <h1 class="text-2xl font-bold">{{ $user->name }}</h1>

                @if (session('success'))
                    <div class="mt-3 inline-block px-4 py-2 bg-green-100 text-green-800 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- アイコン更新 -->
                <form method="POST" action="{{ route('mypage.icon') }}" enctype="multipart/form-data" class="mt-4 flex items-center gap-3">
                    @csrf
                    <input type="file" name="icon" class="text-sm">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                        アイコン更新
                    </button>
                </form>
            </div>
        </div>


        <!-- 投稿レビュー -->
        <section class="space-y-6">
            <h2 class="text-xl font-semibold border-b pb-2">投稿レビュー</h2>

            @forelse($reviews as $review)
                <div class="bg-white rounded-2xl shadow-sm p-6 space-y-4">

                    <!-- 温泉名 -->
                    <div class="flex justify-between items-start">
                        <h3 class="font-semibold text-lg">
                            {{ $review->onsen->name }}
                        </h3>

                        <!-- 削除 -->
                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('このレビューを削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 text-sm hover:underline">削除</button>
                        </form>
                    </div>

                    <!-- 星評価 -->
                    <div class="flex items-center gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="{{ $review->rating >= $i ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                        @endfor
                        <span class="ml-2 text-sm text-gray-600">{{ $review->rating }} / 5</span>
                    </div>

                    <!-- コメント -->
                    <p class="text-gray-700 leading-relaxed">{{ $review->comment }}</p>

                    <!-- 画像 -->
                    @if($review->images->count())
                        <div class="flex gap-3 flex-wrap">
                            @foreach($review->images as $image)
                                <img src="{{ $image->image_path }}" class="w-24 h-24 object-cover rounded-lg border">
                            @endforeach
                        </div>
                    @endif

                    <!-- 編集ボタン -->
                    <button onclick="openEditModal({{ $review->id }})" class="text-blue-600 text-sm hover:underline">
                        編集
                    </button>


                    <!-- 編集モーダル -->
                    <div id="modal-{{ $review->id }}" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
                        <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-6 space-y-4">

                            <h3 class="font-bold text-lg">レビュー編集</h3>

                            <form method="POST" action="{{ route('reviews.update', $review) }}" class="space-y-4">
                                @csrf
                                @method('PUT')

                                <!-- 星評価 -->
                                <input type="hidden" name="rating" id="rating-input-{{ $review->id }}" value="{{ $review->rating }}">

                                <div class="flex gap-1 text-2xl cursor-pointer">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span onclick="setRating({{ $review->id }}, {{ $i }})" id="star-{{ $review->id }}-{{ $i }}"
                                            class="{{ $review->rating >= $i ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                                    @endfor
                                </div>

                                <!-- コメント -->
                                <textarea name="comment" class="w-full border rounded-lg p-3">{{ $review->comment }}</textarea>

                                <div class="flex justify-end gap-3 pt-2">
                                    <button type="button" onclick="closeEditModal({{ $review->id }})" class="text-gray-500">
                                        キャンセル
                                    </button>

                                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                                        保存
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            @empty
                <p class="text-gray-500">まだレビューがありません。</p>
            @endforelse

            <div>
                {{ $reviews->links() }}
            </div>
        </section>


        <!-- いいねした温泉 -->
        <section class="space-y-6">
            <h2 class="text-xl font-semibold border-b pb-2">いいねした温泉</h2>

            <div class="grid sm:grid-cols-2 gap-4">
                @forelse($likes as $onsen)
                    <a href="{{ route('onsens.show', $onsen) }}" class="bg-white rounded-xl shadow-sm p-4 hover:shadow transition">
                        <p class="font-semibold">{{ $onsen->name }}</p>
                    </a>
                @empty
                    <p class="text-gray-500">まだいいねした温泉がありません。</p>
                @endforelse
            </div>

            <div>
                {{ $likes->links() }}
            </div>
        </section>

    </div>


    <script>
        function openEditModal(id) {
            const modal = document.getElementById('modal-' + id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditModal(id) {
            const modal = document.getElementById('modal-' + id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function setRating(reviewId, value) {
            document.getElementById('rating-input-' + reviewId).value = value;

            for (let i = 1; i <= 5; i++) {
                const star = document.getElementById('star-' + reviewId + '-' + i);
                if (i <= value) {
                    star.classList.add('text-yellow-400');
                    star.classList.remove('text-gray-300');
                } else {
                    star.classList.add('text-gray-300');
                    star.classList.remove('text-yellow-400');
                }
            }
        }
    </script>
</x-app-layout>
