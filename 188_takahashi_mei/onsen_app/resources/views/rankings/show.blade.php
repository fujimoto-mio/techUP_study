<x-app-layout>

    <div class="max-w-5xl mx-auto px-4 py-8">

        <h1 class="text-2xl font-bold mb-6">{{ $title }}</h1>

        <div class="space-y-4">

            @forelse($rankings as $index => $onsen)

                <div class="bg-white shadow-lg overflow-hidden">

                    <div class="flex flex-col md:flex-row">

                        <!-- ランキング順位 -->
                        <div
                            class="flex items-center justify-center md:w-20 bg-orange-100 text-orange-600 text-2xl font-bold">
                            @if($index == 0) 🥇
                            @elseif($index == 1) 🥈
                            @elseif($index == 2) 🥉
                            @else {{ $index + 1 }}
                            @endif
                        </div>

                        <!-- 画像 -->
                        @if($onsen->images->first())
                            <div class="md:w-1/3 p-3">
                                <img src="{{ $onsen->images->first()->image_path }}" class="w-full h-full object-cover rounded">
                            </div>
                        @endif

                        <!-- テキスト情報 -->
                        <div class="p-5 space-y-2 md:w-2/3">

                            <h3 class="text-lg font-semibold">
                                <a href="{{ route('onsens.show', $onsen->id) }}" class="hover:underline">
                                    {{ $onsen->name }}
                                </a>
                            </h3>

                            <!-- 説明 -->
                            <p class="text-sm text-gray-600">
                                {{ $onsen->short_description }}
                            </p>

                            <!-- 住所 -->
                            <p class="text-sm text-gray-600">
                                住所：{{ $onsen->address }}
                            </p>

                            <!-- 評価 -->
                            <div class="flex items-center gap-2">

                                <span class="text-amber-400 font-semibold">
                                    ★ {{ number_format($onsen->avg_rating, 1) }}
                                </span>

                                <span class="text-sm text-gray-500">
                                    ({{ $onsen->review_count }}件のレビュー)
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

                <p class="text-gray-600">ランキングデータがありません。</p>

            @endforelse

        </div>

    </div>

</x-app-layout>