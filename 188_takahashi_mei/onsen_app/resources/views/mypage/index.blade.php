<x-app-layout>
    <h1 class="text-xl font-bold">{{ $user->name }}</h1>

    {{-- アイコン --}}
    @if($user->icon)
        <img src="{{ $user->icon }}" class="w-20 h-20 rounded-full">
    @endif

    <hr>
    <form method="POST" action="{{ route('mypage.icon') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="icon" class="mt-2">
        <button class="mt-2 bg-blue-500 text-white px-3 py-1 rounded">
            アイコン更新
        </button>
    </form>
    <hr>
    <h2>投稿レビュー</h2>
    @foreach($reviews as $review)
        <p>{{ $review->onsen->name }}</p>
        <!-- 星評価 -->
        <div class="flex items-center gap-1">
            @for ($i = 1; $i <= 5; $i++)
                @if ($review->rating >= $i)
                    <span class="text-yellow-400">★</span>
                @else
                    <span class="text-gray-300">★</span>
                @endif
            @endfor
            <span class="ml-2 text-sm text-gray-600">
                {{ $review->rating }} / 5
            </span>
        </div>
        <!-- 画像 -->
        <p>{{ $review->comment }}</p>
        <div class="flex gap-2 mt-2">
            @foreach($review->images as $image)
                <img src="{{ $image->image_path }}" class="w-24 h-24 object-cover rounded">
            @endforeach
        </div>

        <a href="{{ route('reviews.edit', $review) }}">編集</a>

        <form action="{{ route('reviews.destroy', $review) }}" method="POST">
            @csrf @method('DELETE')
            <button>削除</button>
        </form>
    @endforeach

    {{ $reviews->links() }}

    <hr>

    <h2>いいねした温泉</h2>
    @foreach($likes as $onsen)
        <a href="{{ route('onsens.show', $onsen) }}">
            {{ $onsen->name }}
        </a>
    @endforeach

    {{ $likes->links() }}
</x-app-layout>