<x-app-layout bg="/images/washibg.jpg">
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

        @foreach($rankingTypes as $key => $name)

            <a href="{{ route('rankings.show', $key) }}"
                class="block bg-white shadow-md p-5 hover:shadow-lg hover:bg-orange-50 transition">

                <div class="flex justify-between items-center">

                    <span class="text-lg font-semibold text-gray-800">
                        {{ $name }}
                    </span>

                    <span class="text-sm text-gray-400">
                        →
                    </span>

                </div>

            </a>

        @endforeach

    </div>




    </div>

</x-app-layout>