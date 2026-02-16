<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prefecture;
use App\Models\Tag;
use App\Models\Onsen;
use Illuminate\Http\Request;
//管理者画面
class OnsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Onsen::with('images', 'tags', 'prefecture');

        //都道府県フィルタ
        if ($request->filled('prefecture_id')) {
            $query->where('prefecture_id', $request->prefecture_id);
        }
        $onsens = $query->latest()
            ->paginate(10)
            ->withQueryString();

        $prefectures = Prefecture::all();

        return view('admin.onsens.index', compact('onsens', 'prefectures'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $prefectures = Prefecture::all();
        $tags = Tag::all();

        return view("admin.onsens.create", compact("prefectures", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   //dd($request->all());
        //
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'nullable',
            'prefecture_id' => 'required|exists:prefectures,id',
            'tags' => 'array',
            'images.*' => 'image|max:2048',
            'image_urls.*' => 'nullable|url'
        ]);

        $onsen = Onsen::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'description' => $data['description'] ?? null,
            'prefecture_id' => $data['prefecture_id'],
        ]);

        if ($request->hasFile("images")) {
            foreach ($request->file("images") as $image) {
                $path = $image->store("onsens", "public");

                $onsen->images()->create([
                    'image_path' => $path,
                ]);
            }
        }
        if ($request->filled('image_urls')) {
            foreach ($request->image_urls as $url) {
                if ($url) {
                    $onsen->images()->create([
                        'image_path' => $url
                    ]);
                }
            }
        }

        if ($request->filled('tags')) {
            $onsen->tags()->sync($request->tags);
        }

        return redirect()
            ->route('admin.onsens.index')
            ->with('success', '温泉を登録しました');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Onsen $onsen)
    {
        //編集
        $prefectures = Prefecture::all();
        $tags = Tag::all();

        return view('admin.onsens.edit', compact('onsen', 'prefectures', 'tags'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Onsen $onsen)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'description' => 'nullable',
            'prefecture_id' => 'required',
            'tags' => 'array',
            'images.*' => 'image|max:2048',
        ]);

        $onsen->update([
            'name' => $data['name'],
            'address' => $data['address'],
            'description' => $data['description'] ?? null,
            'prefecture_id' => $data['prefecture_id'],
        ]);

        $onsen->tags()->sync($request->tags ?? []);

        return redirect()
            ->route('admin.onsens.index')
            ->with('success', '温泉を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Onsen $onsen)
    {
        //削除
        $onsen->delete();
        return redirect()
            ->route('admin.onsens.index')
            ->with('success', '温泉を削除しました');
    }
}
