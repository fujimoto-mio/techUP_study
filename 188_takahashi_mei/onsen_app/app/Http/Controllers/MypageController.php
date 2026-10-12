<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();

        $reviews = $user->reviews()
            ->with('onsen')
            ->latest()
            ->paginate(5, ['*'], 'reviews_page');

        $likes = $user->likedOnsens()
            ->withAvg('reviews', 'rating')
            ->paginate(5, ['*'], 'likes_page');

        return view('mypage.index', compact('user', 'reviews', 'likes'));
    }
    public function updateIcon(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|max:2048',
        ]);

        $path = $request->file('icon')->store('icons', 'public');

        $user = auth()->user();
        $user->icon = '/storage/' . $path;
        $user->save();

        return back();
    }
}
