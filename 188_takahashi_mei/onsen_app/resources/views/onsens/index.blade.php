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

                <p class="text-sm text-gray-600 mt-1">
                    住所：{{ $onsen->address }}
                </p>

                <p class="text-sm text-gray-600">
                    評価：{{ $onsen->avg_rating ?? '未評価' }}
                </p>
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
</x-app-layout>