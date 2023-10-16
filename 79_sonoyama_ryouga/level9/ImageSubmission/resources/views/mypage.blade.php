@extends('layouts.app')

@section('content')

<div class="container">
    <div id="page" class="fade-in">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- ページタイトル -->
                    <div class="card-header">
                        <h1 class="page-title">{{ __('マイページ') }}</h1>
                    </div>

                    <!-- ページ本文 -->
                    <div class="card-body">
                        <div class="container">
                            <!-- ユーザー名とマイページタイトル -->
                            <h2 class="user-name">{{ $user->name }}のマイページ</h2>
                            <!-- 投稿一覧タイトル -->
                            <h3 class="post-list-title">投稿一覧</h3>

                            <!-- 投稿がある場合、投稿一覧を表示 -->
                            @if($posts->count() > 0)
                            <div class="row post-list">
                                @foreach($posts as $post)
                                <div class="col-md-2 mb-4">
                                    <!-- 各投稿の画像とタイトルをリンクとして表示 -->
                                    <a href="{{ route('post.show', ['id' => $post->id]) }}">
                                        <div class="post-image-container">
                                            <div class="post-image" style="background-image: url('{{ asset('storage/' . $post->image_path) }}');"></div>
                                        </div>
                                    </a>
                                    <!-- 投稿のタイトルを表示 -->
                                    <div class="image-info">
                                        <h4 class="post-title">{{ $post->title }}</h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <!-- 投稿がない場合、メッセージを表示 -->
                            @else
                            <p>投稿はありません。</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 追加: スペースを作成 -->
    <!-- ページ下部にスペースを追加するための div 要素 -->
    <div style="margin-bottom: 5rem;"></div>

    @endsection

    <!-- スタイル定義 -->
    <style>
        /* 投稿一覧のスタイル */
        .post-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* 各投稿のスタイル */
        .post-list .col-md-2 {
            flex: 0 0 19%;
            max-width: 19%;
            padding: 10px;
            box-sizing: border-box;
        }

        /* 投稿画像のコンテナスタイル */
        .post-image-container {
            width: 100%;
            padding-top: 100%;
            overflow: hidden;
            position: relative;
            border-radius: 10px;
            background-size: cover;
        }

        /* 投稿画像のスタイル */
        .post-image {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 10px;
            background-size: cover;
        }

        /* 投稿情報のスタイル */
        .image-info {
            padding: 7px;
        }

        /* カーソルが重なったときの暗くなる効果の設定 */
        .post-image:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0);
            transition: background 0.3s ease-in-out;
        }

        /* カーソルが重なったときの暗くなる効果の設定 */
        .post-image:hover:before {
            background: rgba(0, 0, 0, 0.5);
        }

        .row {
            justify-content: center;
        }
    </style>