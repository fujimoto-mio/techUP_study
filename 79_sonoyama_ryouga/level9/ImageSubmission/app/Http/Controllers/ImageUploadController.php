<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class ImageUploadController extends Controller
{
    // 画像アップロードフォームの表示
    public function showUploadForm()
    {
        return view('upload_form');
    }

    // 画像のアップロード処理
    public function upload(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => ['required', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:12048'],
            'comment' => ['required', 'max:500'],
        ], Lang::get('validation'));

        // 画像アップロード処理
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');

            $post = new Post();
            $post->user_id = Auth::user()->id; // ログイン中のユーザーIDを取得
            $post->title = $request->input('title');
            $post->image_path = $imagePath;
            $post->comment = $request->input('comment');
            $post->save();
        }

        return redirect()->route('image.details', ['id' => $post->id]);
    }

    // 画像一覧の表示
    public function showImages()
    {
        $images = Post::all(); // 仮定: 画像モデルから全画像を取得
        return view('image', compact('images'));
    }

    // 画像詳細の表示
    public function showDetails($id)
    {
        $image = Post::findOrFail($id); // Imageモデルから該当の投稿を取得
        return view('image_details', compact('image'));
    }
}
