<x-app-layout bg="images/bg.jpg">

    <div class="max-w-5xl mx-auto px-4 py-2">
        <div class="bg-[#] bg-center shadow-xl py-6 px-8 bg-white/50 hadow-xl backdrop-blur-sm">
            <h1 class="bg-[#E7B6B6] border-l-8 border-[#9CAF88] px-4 py-2 text-2xl font-bold mb-6">{{ $title }}</h1>

            <div class="space-y-4">

                @forelse($rankings as $index => $onsen)
                    <div class="flex items-center justify-center md:w-20 text-orange-600 text-2xl font-bold">
                      
                    </div>
                    <div class="bg-white shadow-lg relative">
                        <!-- ランキングメダル -->
                        <img src="{{ asset('images/ranking/rank_' . ($index + 1) . '.png') }}"
                            class="w-28 h-26 absolute -top-8 -left-2 rotate-12 z-10">
                        <div class="flex flex-col md:flex-row">
                            <div
                                class="flex items-center justify-center md:w-10 bg-[#E7B6B6] border-l-8 border-[#9CAF88]">
                            </div>

                            <!-- 画像 -->
                            @if($onsen->images->first())
                                <div class="md:w-1/3 p-3">
                                    <img src="{{ $onsen->images->first()->image_path }}"
                                        class="w-full h-full object-cover rounded">
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
                                            <span class="text-xs bg-[#CFF7AA] text-[#2F4F2F] px-2 py-1 rounded-full">
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
    </div>

</x-app-layout>