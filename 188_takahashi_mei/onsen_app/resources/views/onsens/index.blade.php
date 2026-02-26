
<x-app-layout bg="/images/home1.jpg">

    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            温泉一覧
        </h2>
    </x-slot>

    <div class="bg-yellow-50/80 backdrop-blur-sm bg-cover bg-center py-10 rounded-2xl shadow-xl">
        <div class="max-w-5xl mx-auto px-6">

            <!-- 検索フォーム -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-8">
                <form method="GET" action="{{ route('onsens.index') }}" class="space-y-4">

                    <div class="flex flex-col md:flex-row gap-4">

                        <!-- 都道府県 -->
                        <select name="prefecture_id"
                                class="border rounded-xl px-4 py-2 focus:ring-2 focus:ring-amber-400 focus:outline-none">
                            <option value="">すべての都道府県</option>
                            @foreach ($prefectures as $prefecture)
                                <option value="{{ $prefecture->id }}"
                                    {{ request('prefecture_id') == $prefecture->id ? 'selected' : '' }}>
                                    {{ $prefecture->name }}
                                </option>
                            @endforeach
                        </select>

                        <!-- フリーワード -->
                        <input type="text"
                               name="keyword"
                               value="{{ request('keyword') }}"
                               placeholder="温泉名・住所・説明で検索"
                               class="flex-1 border rounded-xl px-4 py-2 focus:ring-2 focus:ring-amber-400 focus:outline-none">

                        <button class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-2 rounded-xl transition">
                            検索
                        </button>

                        <a href="{{ route('onsens.index') }}" class="text-sm underline text-gray-500 self-center">
                            条件クリア
                        </a>
                    </div>

                    <!-- タグ検索 -->
                    <div class="flex flex-wrap gap-2">
                        @foreach ($tags as $tag)
                            <label class="flex items-center gap-1 bg-slate-100 px-3 py-1 rounded-full text-sm cursor-pointer hover:bg-slate-200">
                                <input type="checkbox"
                                       name="tags[]"
                                       value="{{ $tag->id }}"
                                       class="accent-amber-500"
                                       {{ collect(request('tags'))->contains($tag->id) ? 'checked' : '' }}>
                                {{ $tag->name }}
                            </label>
                        @endforeach
                    </div>

                </form>
            </div>

            <!-- 一覧 -->
            <div class="space-y-4">
                @forelse ($onsens as $onsen)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

                        <div class="flex flex-col md:flex-row">

                            <!-- 画像 -->
                            @if($onsen->images->first())
                                <div class="md:w-1/3 p-3">
                                    <img src="{{ $onsen->images->first()->image_path }}"
                                        class="w-full h-full object-cover md:h-full">
                                </div>
                            @endif

                            <!--テキスト情報 -->
                            <div class="p-5 space-y-2 md:w-2/3">

                                <div class="flex items-start justify-between">
                                    <h3 class="text-lg font-semibold">
                                        <a href="{{ route('onsens.show', $onsen->id) }}" class="hover:underline">
                                            {{ $onsen->name }}
                                        </a>
                                    </h3>

                                    @auth
                                        <button type="button" class="like-btn text-2xl" data-onsen-id="{{ $onsen->id }}">
                                            <span class="heart">
                                                {{ auth()->user()?->likedOnsens->contains($onsen->id) ? '❤️' : '🤍' }}
                                            </span>
                                        </button>
                                    @else
                                        <a href="{{ route('login') }}" class="text-gray-400 text-sm">🤍 ログインしていいね</a>
                                    @endauth
                                </div>

                                <p class="text-sm text-gray-600">
                                    住所：{{ $onsen->address }}
                                </p>

                                <!-- 星評価 -->
                                @php $rating = round($onsen->reviews_avg_rating ?? 0, 1); @endphp

                                <div class="flex items-center gap-1">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($rating >= $i)
                                            <span class="text-amber-400">★</span>
                                        @elseif ($rating >= $i - 0.5)
                                            <span class="text-amber-400">☆</span>
                                        @else
                                            <span class="text-gray-300">☆</span>
                                        @endif
                                    @endfor
                                    <span class="text-sm text-gray-600 ml-1">
                                        {{ number_format($rating, 1) }}
                                    </span>
                                </div>

                                <!-- タグ -->
                                @if ($onsen->tags->isNotEmpty())
                                    <div class="flex flex-wrap gap-2 pt-2">
                                        @foreach ($onsen->tags as $tag)
                                            <span class="text-xs bg-amber-100 text-amber-800 px-2 py-1 rounded-full">
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                @empty
                    <p class="text-gray-600">該当する温泉がありません。</p>
                @endforelse
            </div>

            <!-- ページネーション -->
            <div class="mt-10">
                {{ $onsens->links() }}
            </div>

        </div>
    </div>

    <!-- いいねAjax -->
    <script>
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
    </script>

</x-app-layout>