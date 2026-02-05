<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            温泉一覧
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6">

         {{-- 検索フォーム --}}
        <form method="GET" action="{{ route('onsens.index') }}" class="mb-6">
            <div class="flex items-center gap-4">
                <select name="prefecture_id" class="border rounded px-3 py-2">
                    <option value="">すべての都道府県</option>
                    @foreach ($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}"
                            {{ request('prefecture_id') == $prefecture->id ? 'selected' : '' }}>
                            {{ $prefecture->name }}
                        </option>
                    @endforeach
                </select>
                {{-- タグ検索 --}}
                <div class="flex gap-2 flex-wrap">
                    @foreach ($tags as $tag)
                        <label class="text-sm">
                             <input type="checkbox"
                                    name="tags[]"
                                    value="{{ $tag->id }}"
                                    {{ collect(request('tags'))->contains($tag->id) ? 'checked' : '' }}>
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </div>

                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    検索
                </button>
            </div>
            <!-- フリーワード検索 -->
            <input  type="text"
                    name="keyword"
                    value="{{ request('keyword') }}"
                    placeholder="温泉名・住所・説明で検索"
                    class="border rounded px-4 py-2 w-64"
            >
            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                検索
            </button>
            <a href="{{ route('onsens.index') }}" class="text-sm underline text-gray-500">
                条件クリア
            </a>
        </form>

        {{-- 一覧 --}}
        @forelse ($onsens as $onsen)
            <div class="bg-white p-4 rounded shadow mb-4">
                <h3 class="text-lg font-semibold">
                    <a href="{{ route('onsens.show', $onsen->id) }}"
                       class="text-blue-600 hover:underline">
                        {{ $onsen->name }}
                    </a>
                </h3>
                @auth
                <button 
                    type="button"
                    class="like-btn text-red-500 text-2xl"
                    data-onsen-id="{{ $onsen->id }}"
                >
                    <span class="heart">
                        {{ auth()->user()?->likedOnsens->contains($onsen->id) ? '❤️' : '🤍' }}
                    </span>
                </button>
                @else
                <a href="{{ route('login') }}" class="text-gray-400">
                🤍 ログインしていいね
                </a>
                @endauth

                @if($onsen->image_url)
                     <img src="{{ $onsen->image_url }}" 
                     class="w-full max-h-40 object-contain rounded-lg mb-2">
                @endif
                <p class="text-sm text-gray-600 mt-1">
                    住所：{{ $onsen->address }}
                </p>
                <!-- 星評価表示 -->
                @php
                    $rating = round($onsen->reviews_avg_rating ?? 0, 1);
                @endphp

                <div class="flex items-center gap-1">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($rating >= $i)
                            <span class="text-yellow-400">★</span>
                        @elseif ($rating >= $i - 0.5)
                            <span class="text-yellow-400">☆</span>
                        @else
                            <span class="text-gray-300">☆</span>
                        @endif
                    @endfor
                    <span class="text-sm text-gray-600 ml-1">
                         {{ number_format($rating, 1) }}
                    </span>
                </div>

                {{-- タグ --}}
                @if ($onsen->tags->isNotEmpty())
                    <div class="mt-2 flex flex-wrap gap-2">
                        @foreach ($onsen->tags as $tag)
                        <span class="text-xs text-red-700 bg-red-100 px-2 py-1 rounded">
                             {{ $tag->name }}
                        </span>
                        @endforeach
                    </div>
                @endif
            </div>
        @empty
            <p class="text-gray-600">該当する温泉がありません。</p>
        @endforelse
        <div class="mt-6">
             {{ $onsens->links() }}
        </div>
    </div>

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