<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            {{ $onsen->name }}
        </h2>
        @auth
            <button type="button" class="like-btn text-red-500 text-2xl" data-onsen-id="{{ $onsen->id }}">
                <span class="heart">
                    {{ auth()->user()?->likedOnsens->contains($onsen->id) ? '❤️' : '🤍' }}
                </span>
            </button>
        @else
            <a href="{{ route('login') }}" class="text-gray-400">
                🤍 ログインしていいね
            </a>
        @endauth
    </x-slot>

    <div class="max-w-3xl mx-auto py-6">

        <!-- 温泉情報 -->
        <div class="bg-white p-6 rounded shadow mb-6">
            @if($onsen->images->count())
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($onsen->images as $image)
                            <div class="swiper-slide">
                                <img src="{{ $image->image_path }}"
                                    class="w-full max-h-96 object-contain rounded-xl cursor-pointer">
                            </div>
                        @endforeach
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            @endif
            <!-- 星評価 -->
            @php
                $rating = round($onsen->reviews_avg_rating ?? 0, 1);
            @endphp

            <div class="flex items-center gap-1 mt-2">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($rating >= $i)
                        <span class="text-yellow-400 text-lg">★</span>
                    @elseif ($rating >= $i - 0.5)
                        <span class="text-yellow-400 text-lg">☆</span>
                    @else
                        <span class="text-gray-300 text-lg">☆</span>
                    @endif
                @endfor
                <span class="ml-2 text-sm text-gray-600">
                    {{ number_format($rating, 1) }}
                </span>
            </div>
            <p class="mt-2">{{ $onsen->description }}</p>
            <p class="text-gray-600">住所：{{ $onsen->address }}</p>
        </div>

        <!-- レビュー一覧 -->
        <div class="bg-white p-6 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">レビュー</h3>

            @forelse ($onsen->reviews as $review)
                <div class="border-b py-4">

                    @php
                        $rating = $review->rating;
                    @endphp

                    <div class="flex items-center gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($rating >= $i)
                                <span class="text-yellow-400">★</span>
                            @else
                                <span class="text-gray-300">★</span>
                            @endif
                        @endfor
                        <span class="ml-2 text-sm text-gray-600">
                            {{ $rating }} / 5
                        </span>
                    </div>

                    <p class="mt-2">{{ $review->comment }}</p>

                    <p class="text-sm text-gray-500">
                        投稿者：{{ $review->user->name ?? '匿名' }}
                    </p>
                </div>
            @empty
                <p>まだレビューがありません</p>
            @endforelse
            <!-- レビュー投稿 -->
            @auth
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-semibold mb-4">レビューを書く</h3>

                    <form method="POST" action="{{ route('reviews.store', $onsen->id) }}">
                        @csrf
                        <!-- 星評価 -->
                        <label class="block mb-2 font-semibold">評価</label>

                        <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating') }}">

                        <div id="starRating" class="flex gap-1 text-3xl cursor-pointer">
                            @for ($i = 1; $i <= 5; $i++)
                                <span data-value="{{ $i }}" class="star text-gray-300">★</span>
                            @endfor
                        </div>
                        @error('rating')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <!-- コメント -->
                        <label class="block mb-2">コメント</label>
                        <textarea name="comment" rows="4" class="w-full mb-2 p-2 border rounded"></textarea>

                        <button class="px-4 py-2 bg-blue-500 text-white rounded">
                            投稿する
                        </button>
                        @error('comment')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
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
        <!-- ⭐️評価JS -->
        <script>
            document.querySelectorAll('#starRating .star').forEach(star => {
                star.addEventListener('click', function () {
                    let value = this.dataset.value;
                    document.getElementById('ratingInput').value = value;

                    document.querySelectorAll('#starRating .star').forEach(s => {
                        if (s.dataset.value <= value) {
                            s.classList.remove('text-gray-300');
                            s.classList.add('text-yellow-400');
                        } else {
                            s.classList.remove('text-yellow-400');
                            s.classList.add('text-gray-300');
                        }
                    });
                });
            });
            // いいねJS
            document.querySelectorAll('.like-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const onsenId = this.dataset.onsenId;

                    fetch(`/onsens/${onsenId}/like`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        },
                    })
                        .then(res => {
                            if (res.status === 401) {
                                alert('ログインしてください');
                                return;
                            }
                            return res.json();
                        })
                        .then(data => {
                            if (!data) return;

                            this.querySelector('.heart').textContent = data.liked ? '❤️' : '🤍';
                        });
                });
            });
            // スライダー
            document.addEventListener('DOMContentLoaded', function () {
                new Swiper('.swiper', {
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });
            });
        </script>
</x-app-layout>