<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Onsen;
use Illuminate\Support\Facades\Auth;

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
        Review::create([
            'onsen_id' => $onsenId,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
        return redirect()->route('onsens.show', $onsenId)->with('success', 'レビューを投稿しました');
    }   
}