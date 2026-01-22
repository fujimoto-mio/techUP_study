<?php

namespace App\Http\Controllers;

use App\Models\Onsen;
use Illuminate\Http\Request;
use App\Models\Prefecture;
use App\Models\Tag;

class OnsenController extends Controller
{
    public function create()
    {
        $prefectures = Prefecture::orderBy('code')->get();
        $tags = Tag::all();
        return view('onsens.create', compact('prefectures', 'tags'));
    }
    // 一覧 + 都道府県検索
    public function index(Request $request)
    {
        $query = Onsen::with('tags')
            ->withAvg('reviews', 'rating')
            ->withCount('likes');
        // 都道府県で絞り込み
        if ($request->filled('prefecture_id')) {
            $query->where('prefecture_id', $request->prefecture_id);
        }
        // タグで絞り込み（複数・OR検索）
        if ($request->filled('tags')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->whereIn('tags.id', $request->tags);
            });
        }

        $onsens = $query->paginate(10)->withQueryString();
        $prefectures = Prefecture::all();
        $tags = Tag::all();
        return view('onsens.index', compact('onsens', 'prefectures','tags'));
    }
    
    //追加
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "address" => "required|string|max:255",
            "prefecture_id" => "required|integer|exists:prefectures,id",
            "description" => "nullable|string",
            "image_url" => "nullable|url",
            "avg_rating" => "nullable|numeric|min:0|max:5",
            "tags" => "nullable|array",
            "tags.*" => "exists:tags,id",
        ]);
        $onsen = Onsen::create([
            "name" => $request->name,
            "address" => $request->address,
            "prefecture_id" => $request->prefecture_id,
            "description" => $request->description,
            "image_url" => $request->image_url,
            "avg_rating" => $request->avg_rating ?? 0,
        ]);
        if ($request->filled('tags')) {
            $onsen->tags()->sync($request->tags);
        }
        return redirect()
            ->route('onsens.index')
            ->with('success', '温泉を登録しました');
    }
    //詳細
    public function show($id)
    {
        $onsen = Onsen::with(['reviews.user'])->findOrFail($id);
        return view('onsens.show', compact('onsen'));
    }
    //編集
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "address" => "required|string|max:255",
            "prefecture_id" => "required|integer|exists:prefectures,id",
            "description" => "nullable|string",
            "image_url" => "nullable|url",
            "avg_rating" => "nullable|numeric|min:0|max:5"
        ]);
        $onsen = Onsen::findOrFail($id);
        $onsen->update([
            "name" => $request->name,
            "address" => $request->address,
            "prefecture_id" => $request->prefecture_id,
            "description" => $request->description,
            "image_url" => $request->image_url,
            "avg_rating" => $request->avg_rating ?? 0,
        ]);
        return response()->json($onsen);
    }
    //削除
    public function destroy(Request $request, $id)
    {
        $onsen = Onsen::findOrFail($id);
        $onsen->delete();
        return response()->json(["messege" => "削除しました"]);
    }
}
