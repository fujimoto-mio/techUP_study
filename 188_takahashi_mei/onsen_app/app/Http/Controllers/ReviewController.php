<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Onsen;
use Illuminate\Support\Facades\Auth;
use App\Services\NgWordService;
use App\Models\ReviewImage;

class ReviewController extends Controller
{
    //権限チェック
    public function edit(Review $review)
    {
        abort_if($review->user_id !== auth()->id(), 403);

        return view('reviews.edit', compact('review'));
    }
    //投稿フォーム表示
    public function create($onsenId)
    {
        $onsen = Onsen::findOrFail($onsenId);
        return view('reviews.create', compact('onsen'));
    }
    // 投稿保存
    public function store(Request $request, $onsenId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        // NGワードチェック
        $comment = $request->comment
            ? NgWordService::mask($request->comment)
            : null;
        $review = Review::create([
            'onsen_id' => $onsenId,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $comment,
        ]);
        //dd($review); // 投稿できるか確認
        //画像保存
        if ($request->hasFile('images')) {
            //dd($request->file('images')); // ここで配列が表示されるか確認
            foreach ($request->file('images') as $index => $image) {
                try {
                    $path = $image->store('review_images', 'public');
                    $review->images()->create([
                        'image_path' => '/storage/' . $path,
                        'sort_order' => $index,
                    ]);
                } catch (\Exception $e) {
                    // ログに出すだけで処理を止めない
                    \Log::error('画像保存エラー: ' . $e->getMessage());
                }
            }
        }

        return redirect()->route('onsens.show', $onsenId)->with('success', 'レビューを投稿しました');
    }
    //編集
    public function update(Request $request, Review $review)
    {
        abort_if($review->user_id !== auth()->id(), 403);

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'delete_images' => 'array',
            'delete_images.*' => 'integer|exists:review_images,id',
        ]);
        //NGワードマスク
        $validated['comment'] = NgWordService::mask($validated['comment']);
        $review->update($validated);
        //画像削除
        if ($request->filled('delete_images')) {
            ReviewImage::whereIn('id', $request->delete_images)->delete();
        }
        // 新しい画像追加
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('review_images', 'public');
                $review->images()->create([
                    'image_path' => '/storage/' . $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()
            ->route('mypage')
            ->with('success', 'レビューを更新しました');
    }
    //削除
    public function destroy(Review $review)
    {
        abort_if($review->user_id !== auth()->id(), 403);

        $review->delete();

        return redirect()
            ->route('mypage')
            ->with('success', 'レビューを削除しました');
    }

}