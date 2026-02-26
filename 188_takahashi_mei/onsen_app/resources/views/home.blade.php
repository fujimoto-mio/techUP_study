<x-app-layout bg="/images/home1.jpg">
    @php
        $images = ['onsenTOP1.jpg', 'onsenTOP2.jpg', 'onsenTOP3.jpg'];
        $image = $images[array_rand($images)];
    @endphp
    <div class="relative min-h-[80vh] flex items-center justify-center">

        <!-- TOP画像 -->
        <div class="absolute inset-0 rounded-3xl
                bg-black/30 blur-2xl scale-105">
    </div>
        <img id="heroImage" src="{{ asset('images/' . $image) }}" alt="温泉"
            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 rounded-3xl">
        <div class="absolute inset-0 bg-black/10 rounded-3xl"></div>

        <!-- コンテンツ　-->
        <div class="relative max-w-2xl w-full text-center text-white px-6">

            <h1 class="text-3xl md:text-5xl font-bold mb-4 leading-tight">
                ふらっと、ゆさんぽ。<br>
                ココロほぐれる お湯探し。
            </h1>

            <p class="text-white/80 mb-8">
                全国の温泉レビュー共有サービス<br>
                あなたにぴったりの温泉を見つけよう
            </p>

            <!-- 検索欄 -->
            <form method="GET" action="{{ route('onsens.index') }}"
                class="flex flex-col sm:flex-row gap-3 justify-center">
                <input type="text" name="keyword" placeholder="温泉名・エリアで検索" value="{{ request('keyword') }}"
                    class="w-full sm:w-80 px-4 py-3 rounded-xl text-gray-800 focus:outline-none">
                <button class="bg-amber-500 hover:bg-amber-600 px-6 py-3 rounded-xl font-semibold transition">
                    検索
                </button>
            </form>

            <!-- ログイン　新規登録リンク -->
            <div class="mt-8 flex items-center justify-center gap-6 text-sm">
                <a href="{{ route('login') }}" class="underline hover:opacity-80">ログイン</a>
                <a href="{{ route('register') }}"
                    class="bg-white text-gray-900 px-5 py-2 rounded-full font-semibold hover:bg-gray-200 transition">
                    新規登録
                </a>
            </div>

        </div>
    </div>

    <!-- TOP画像JS -->
    <script>
        const images = [
            "/images/onsenTOP1.jpg",
            "/images/onsenTOP2.jpg",
            "/images/onsenTOP3.jpg"
        ];

        let index = 0;
        const hero = document.getElementById("heroImage");

        setInterval(() => {
            index = (index + 1) % images.length;
            hero.style.opacity = 0.4;

            setTimeout(() => {
                hero.src = images[index];
                hero.style.opacity = 1;
            }, 3000);
        }, 9000);
    </script>

</x-app-layout >