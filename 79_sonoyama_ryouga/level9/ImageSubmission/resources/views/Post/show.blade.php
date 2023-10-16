@extends('layouts.app')

@section('content')
<div class="container">
    <div id="page" class="fade-in">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                        <!-- 投稿の画像がある場合、画像を表示。ない場合は、「画像が存在しません」と表示 -->
                        @if ($post->getImageUrl())
                        <a href="{{ $post->getImageUrl() }}" target="_blank">
                            <img src="{{ $post->getImageUrl() }}" alt="{{ $post->title }}">
                        </a>
                        @else
                        画像が存在しません
                        @endif

                        <!-- 投稿者名と投稿日時を表示 -->
                        <div>
                            <strong>投稿者:</strong> {{ $post->user->name }}
                        </div>
                        <div>
                            <strong>投稿日時:</strong> {{ $post->created_at }}
                        </div>

                        <!-- 作品コメントを表示 -->
                        <div class="author-comment">
                            <h3>作品コメント</h3>
                            <p>{{ $post->comment }}</p>
                        </div>

                        <!-- いいねボタン -->
                        <!-- ボタンを押すと、いいねの数が増える -->
                        <form action="{{ route('post.like', ['post' => $post->id]) }}" method="POST" class="mypage-btn">
                            @csrf
                            <button type="submit" class="btn btn-primary">いいね ({{ $post->likes()->count() }})</button>
                        </form>

                        <!-- コメント投稿フォーム -->
                        <!-- ユーザーがコメントを入力し、送信ボタンを押すとコメントが投稿される -->
                        <form action="{{ route('post.addReview', ['post' => $post->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comment">コメント</label>
                                <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3"></textarea>
                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">コメントを投稿</button>
                        </form>

                        <!-- 投稿に対するコメント一覧 -->
                        <!-- コメントがある場合は、それぞれのコメントを表示。ない場合は、「まだレビューがありません」と表示 -->
                        <h3>コメント</h3>
                        <ul class="author-comment">
                            @if ($post->reviews()->count() > 0)
                            @foreach ($post->reviews as $review)
                            <li>
                                <strong>{{ $review->user->name }}:</strong>
                                <div>投稿日時: {{ $review->created_at }}</div><br>
                                {{ $review->comment }}

                            </li>
                            @endforeach
                            @else
                            <li>まだレビューがありません</li>
                            @endif
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 追加: スペースを作成 -->
    <!-- ページ下部にスペースを追加するための div 要素 -->
    <div style="margin-bottom: 5rem;"></div>
</div>
@endsection