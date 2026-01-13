<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Onsen;
use Illuminate\Support\Facades\Auth;
use App\Services\NgWordService;

class ReviewController extends Controller
{
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
        ]);
        // NGワードチェック
        $comment = $request->comment
        ? NgWordService::mask($request->comment)
        : null;
        Review::create([
            'onsen_id' => $onsenId,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $comment,
        ]);
        return redirect()->route('onsens.show', $onsenId)->with('success', 'レビューを投稿しました');
    }

}