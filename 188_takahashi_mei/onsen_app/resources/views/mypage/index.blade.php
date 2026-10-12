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
    <p>{{ $review->comment }}</p>

    <a href="{{ route('reviews.edit',$review) }}">編集</a>

    <form action="{{ route('reviews.destroy',$review) }}" method="POST">
        @csrf @method('DELETE')
        <button>削除</button>
    </form>
@endforeach

{{ $reviews->links() }}

<hr>

<h2>いいねした温泉</h2>
@foreach($likes as $onsen)
    <a href="{{ route('onsens.show',$onsen) }}">
        {{ $onsen->name }}
    </a>
@endforeach

{{ $likes->links() }}