<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostContent;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // ここで管理者であるかをチェックするロジックを追加する
        if (auth()->check() && auth()->user()->is_admin()) {
            return $next($request);
        }

        // 管理者でない場合、適切なリダイレクトまたはエラー処理を行う
        return redirect('/')->with('error', 'You are not authorized to access this page.');
    }

    public function deletePost($postId)
    {
        // 投稿を削除
        Post::destroy($postId);

        // 投稿に関連する内容を削除
        PostContent::where('post_id', $postId)->delete();

        return redirect()->back()->with('success', '投稿と内容が削除されました。');
    }
}
