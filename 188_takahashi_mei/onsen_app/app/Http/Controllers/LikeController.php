<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onsen;
use App\Models\Like;

class LikeController extends Controller
{
    public function toggle(Onsen $onsen)
    {
        $user = auth()->user();

        $like = Like::where('user_id', $user->id)
                    ->where('onsen_id', $onsen->id)
                    ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => $user->id,
                'onsen_id' => $onsen->id,
            ]);
        }

        return back();
    }
}
