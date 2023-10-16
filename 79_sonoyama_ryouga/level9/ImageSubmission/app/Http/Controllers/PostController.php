<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Review;

class PostController extends Controller
{
    // 投稿の詳細表示
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            // 投稿が見つからない場合はホームにリダイレクト
            return redirect()->route('home')->with('error', '投稿が見つかりませんでした。');
        }

        // 投稿詳細画面にデータを渡す
        return view('post.show', compact('post'));
    }

    // レビューの追加
    public function addReview(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string', // コメントが必須であり、文字列であることを確認
        ], [
            'comment.required' => 'コメントを入力してください。', // エラーメッセージ
            'comment.string' => 'コメントは文字列で入力してください。', // 文字列でない場合のエラーメッセージ
        ]);

        $post = Post::find($id);

        if (!$post) {
            // 投稿が見つからない場合はホームにリダイレクト
            return redirect()->route('home')->with('error', '投稿が見つかりませんでした。');
        }

        // レビューを作成して保存
        $review = new Review();
        $review->comment = $request->input('comment');
        $review->user_id = auth()->user()->id;
        $review->post_id = $post->id;
        $review->save();

        // 投稿詳細画面にリダイレクト
        return redirect()->route('post.show', ['id' => $id])->with('success', 'レビューを投稿しました。');
    }

    // いいね機能
    public function like(Post $post)
    {
        $user = auth()->user();

        if ($user->hasLiked($post)) {
            // いいねがすでにある場合は取り消す
            $user->likes()->detach($post);
        } else {
            // いいねがない場合は追加
            $user->likes()->attach($post);
        }

        // 前のページにリダイレクト
        return redirect()->back();
    }

    // ホーム画面の表示
    public function index()
    {
        // 最新の投稿を取得
        $latestPosts = Post::orderBy('created_at', 'desc')->get();

        // 人気の投稿を取得（いいね数でソート）
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->get();

        // ビューにデータを渡す
        return view('home', [
            'latestPosts' => $latestPosts,
            'popularPosts' => $popularPosts
        ]);
    }

    public function storePost(Request $request)
    {
        // ユーザーが管理者でなければエラーを返す
        if (!auth()->check() || !auth()->user()->isAdmin()) {
            return response()->json(['error' => '権限がありません。'], 403);
        }

        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // ユーザーが管理者であれば投稿を作成
        $post = CustomPost::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id
        ]);

        return response()->json(['message' => '投稿が作成されました。', 'post' => $post], 200);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // 管理者かどうかチェック
        if (auth()->user()->isAdmin()) {
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->user_id = auth()->user()->id;
            $post->save();

            return response()->json(['message' => '投稿が作成されました。'], 201);
        } else {
            return response()->json(['message' => '管理者のみが投稿できます。'], 403);
        }
    }
}
