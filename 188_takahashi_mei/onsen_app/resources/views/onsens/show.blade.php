<x-app-layout bg="/images/washibg.jpg">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl">
                {{ $onsen->name }}
            </h2>

            @auth
                <button type="button" class="like-btn text-3xl" data-onsen-id="{{ $onsen->id }}">
                    <span class="heart">
                        {{ auth()->user()?->likedOnsens->contains($onsen->id) ? '❤️' : '🤍' }}
                    </span>
                </button>
            @else
                <a href="{{ route('login') }}" class="text-gray-400 text-sm">
                    🤍 ログインしていいね
                </a>
            @endauth
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto py-10 space-y-10">

        <!-- 画像と基本情報 -->
        <div class="grid md:grid-cols-2 gap-8 items-start">

            @if($onsen->images->count())
                <div class="space-y-4">
                    <div class="swiper rounded-2xl overflow-hidden shadow">
                        <div class="swiper-wrapper">
                            @foreach($onsen->images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image->image_path }}"
                                         class="w-full h-[320px] object-cover cursor-pointer"
                                         onclick="openModal('{{ $image->image_path }}')">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            @endif

            <div class="space-y-4">

                <!-- 星評価 -->
                @php $rating = round($onsen->reviews_avg_rating ?? 0, 1); @endphp

                <div class="flex items-center gap-2 text-lg">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($rating >= $i)
                            <span class="text-amber-400">★</span>
                        @elseif ($rating >= $i - 0.5)
                            <span class="text-amber-400">☆</span>
                        @else
                            <span class="text-gray-300">☆</span>
                        @endif
                    @endfor
                    <span class="text-gray-600 text-sm">
                        {{ number_format($rating, 1) }}
                    </span>
                </div>

                <p class="text-gray-700 leading-relaxed">
                    {{ $onsen->description }}
                </p>

                <div class="text-sm text-gray-500">
                    住所：{{ $onsen->address }}
                </div>
            </div>
        </div>

        <!-- レビュー一覧 -->
        <div class="space-y-6">
            <h3 class="text-xl font-semibold">レビュー</h3>

            @forelse ($onsen->reviews as $review)
                <div class="bg-white rounded-2xl shadow-sm p-5 space-y-3">

                    @php $rating = $review->rating; @endphp

                    <div class="flex items-center gap-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <span class="{{ $rating >= $i ? 'text-amber-400' : 'text-gray-300' }}">★</span>
                        @endfor
                        <span class="ml-2 text-sm text-gray-500">
                            {{ $rating }} / 5
                        </span>
                    </div>

                    @if($review->images->count())
                        <div class="flex gap-2 overflow-x-auto">
                            @foreach($review->images as $image)
                                <img src="{{ $image->image_path }}"
                                     class="w-28 h-28 object-cover rounded-lg cursor-pointer hover:scale-105 transition"
                                     onclick="openModal('{{ $image->image_path }}')">
                            @endforeach
                        </div>
                    @endif

                    <p class="text-gray-700">
                        {{ $review->comment }}
                    </p>

                    <p class="text-xs text-gray-400">
                        投稿者：{{ $review->user->name ?? '匿名' }}
                    </p>
                </div>
            @empty
                <p class="text-gray-500">まだレビューがありません</p>
            @endforelse
        </div>

        <!-- レビュー投稿 -->
        @auth
            <div class="bg-orange-100 border-2 border-stone-500 rounded-2xl shadow-sm p-6 space-y-4">
                <h3 class="text-lg font-semibold">レビューを書く</h3>

                <form method="POST" action="{{ route('reviews.store', $onsen->id) }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block mb-2 font-medium">評価</label>
                        <input type="hidden" name="rating" id="ratingInput" value="{{ old('rating') }}">

                        <div id="starRating" class="flex gap-1 text-3xl cursor-pointer">
                            @for ($i = 1; $i <= 5; $i++)
                                <span data-value="{{ $i }}" class="star text-gray-300">★</span>
                            @endfor
                        </div>
                        @error('rating')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">コメント</label>
                        <textarea name="comment" rows="4" class="w-full border rounded-lg p-3"></textarea>
                        @error('comment')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium">画像（複数可）</label>
                        <input type="file" name="images[]" multiple class="border rounded-lg p-2 w-full">
                    </div>

                    <button class="px-6 py-2 bg-amber-500 hover:bg-amber-600 text-white rounded-lg">
                        投稿する
                    </button>
                </form>
            </div>
        @else
            <p class="text-center text-gray-500">
                レビューを書くには <a href="/login" class="text-blue-500 underline">ログイン</a> してください
            </p>
        @endauth

    </div>

    <!-- 画像モーダル -->
    <div id="imageModal" class="fixed inset-0 bg-black/70 flex items-center justify-center hidden z-50">
        <span class="absolute top-4 right-6 text-white text-4xl cursor-pointer" onclick="closeModal()">&times;</span>
        <img id="modalImg" src="" class="max-h-[90%] max-w-[90%] rounded-xl shadow-xl">
    </div>

    <script>
        // 星評価
        document.querySelectorAll('#starRating .star').forEach(star => {
            star.addEventListener('click', function () {
                let value = this.dataset.value;
                document.getElementById('ratingInput').value = value;

                document.querySelectorAll('#starRating .star').forEach(s => {
                    s.classList.toggle('text-amber-400', s.dataset.value <= value);
                    s.classList.toggle('text-gray-300', s.dataset.value > value);
                });
            });
        });

        // いいね
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

        // Swiper
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.swiper', {
                loop: true,
                pagination: { el: '.swiper-pagination', clickable: true },
            });
        });

        // モーダル
        function openModal(src) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImg');
            modalImg.src = src;
            modal.classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
</x-app-layout>