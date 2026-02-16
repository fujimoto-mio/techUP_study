<x-app-layout>
    <div class="max-w-3xl mx-auto py-10">

        <h1 class="text-2xl font-bold mb-6">
            温泉 登録（管理者）
        </h1>

        <form method="POST" action="{{ route('admin.onsens.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- 温泉名 --}}
            <div>
                <label class="block mb-1">温泉名</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2">
            </div>

            {{-- 住所 --}}
            <div>
                <label class="block mb-1">住所</label>
                <input type="text" name="address" class="w-full border rounded px-3 py-2">
            </div>

            {{-- 説明 --}}
            <div>
                <label class="block mb-1">説明</label>
                <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
            </div>

            {{-- 都道府県 --}}
            <div>
                <label class="block mb-1">都道府県</label>
                <select name="prefecture_id" class="w-full border rounded px-3 py-2">
                    @foreach ($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}">
                            {{ $prefecture->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- タグ --}}
            <div>
                <label class="block mb-2">タグ</label>
                <div class="flex gap-3 flex-wrap">
                    @foreach ($tags as $tag)
                        <label>
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div>
                <label class="block mb-1">画像</label>
                <input type="file" name="images[]" multiple>
            </div>
            <div>
                <label class="block mb-1">画像URL</label>
                <input type="text" name="image_urls[]" class="w-full border rounded px-3 py-2 mb-2"
                    placeholder="https://example.com/image.jpg">
                <input type="text" name="image_urls[]" class="w-full border rounded px-3 py-2" placeholder="複数登録したい場合">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">
                登録する
            </button>

        </form>

    </div>
</x-app-layout>