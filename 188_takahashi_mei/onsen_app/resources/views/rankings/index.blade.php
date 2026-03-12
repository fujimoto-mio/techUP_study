<x-app-layout bg="images/red.jpg">
    <x-slot name="header">
        <h1 class="font-bold">
            温泉ランキング
        </h1>
    </x-slot>

    <div class="mt-10 bg-orange-50 border border-orange rounded-lg p-6 mb-4">
        <h2 class="font-semibold text-lg mb-2 text-gray-800">
            ランキングについて
        </h2>

        <p class="text-gray-600 leading-relaxed">
            ユーザーのレビュー評価や投稿数をもとに、
            みんなに人気の温泉をランキング形式で紹介しています。
            気になるランキングを選んで、今話題の温泉や評価の高い温泉を
            ぜひチェックしてみてください。
        </p>
    </div>

    <div class="grid gap-4">
        @php
            $rankingImages = [
                'overall' => 'images/onsenTOP1.jpg',
                'review_count' => 'images/onsenTOP2.jpg',
            ];
        @endphp
        @foreach($rankingTypes as $key => $name)

            <a href="{{ route('rankings.show', $key) }}"
                class="group block rounded-lg overflow-hidden shadow-md hover:shadow-lg transition transform hover:scale-[1.02] relative h-40">
                <!-- 背景画像 -->
                <img src="{{ asset($rankingImages[$key]) }}" alt="{{ $name }}"
                    class="absolute inset-0 w-full h-full object-cover">

                <!-- 暗くオーバーレイ -->
                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition"></div>
                <div class="relative flex justify-between items-center p-5 text-white h-full">
                    <span class="text-lg font-semibold">{{ $name }}</span>
                    <span class="text-sm">→</span>
                </div>
            </a>
        @endforeach
    </div>




    </div>

</x-app-layout>