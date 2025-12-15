<?php

namespace App\Http\Controllers;

use App\Models\Onsen;
use Illuminate\Http\Request;

class OnsenController extends Controller
{
    //一覧取得
    public function index()
    {
        $onsens = Onsen::all();
        return response()->json($onsens);
    }
    //追加
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|string|max:255",
            "address"=>"required|string|max:255",
            "prefecture_id"=>"required|integer|exists:prefectures,id",
            "description"=>"nullable|string",
            "image_url"=>"nullable|url",
            "avg_rating"=>"nullable|numeric|min:0|max:5"
        ]);
        $onsen = Onsen::create([
            "name"=>$request->name,
            "address"=>$request->address,
            "prefecture_id"=>$request->prefecture_id,
            "description"=>$request->description,
            "image_url"=>$request->image_url,
            "avg_rating"=>$request->avg_rating ?? 0,
        ]);
        return response()->json($onsen,201);
    }
    //詳細
    public function show($id)
    {
        $onsen = Onsen::findOrFail($id);
        return response()->json($onsen);
    }
    //編集
    public function update(Request $request, $id)
    {
        $request->validate([
            "name"=>"required|string|max:255",
            "address"=>"required|string|max:255",
            "prefecture_id"=>"required|integer|exists:prefectures,id",
            "description"=>"nullable|string",
            "image_url"=>"nullable|url",
            "avg_rating"=>"nullable|numeric|min:0|max:5"
        ]);
        $onsen = Onsen::findOrFail($id);
        $onsen->update([
            "name"=>$request->name,
            "address"=>$request->address,
            "prefecture_id"=>$request->prefecture_id,
            "description"=>$request->description,
            "image_url"=>$request->image_url,
            "avg_rating"=>$request->avg_rating ?? 0,
        ]);
        return response()->json($onsen);
    }
    //削除
    public function destroy(Request $request, $id)
    {
        $onsen = Onsen::findOrFail($id);
        $onsen ->delete();
        return response()->json(["messege"=>"削除しました"]);
    }
}
