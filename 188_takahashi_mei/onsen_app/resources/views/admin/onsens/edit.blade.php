<x-app-layout>
    <div class="max-w-3xl mx-auto py-10">

        <h1 class="text-2xl font-bold mb-6">
            温泉 編集（管理者）
        </h1>

        <form method="POST" action="{{ route('admin.onsens.update', $onsen) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label>温泉名</label>
                <input type="text" name="name" value="{{ old('name', $onsen->name) }}" class="w-full border px-3 py-2">
            </div>

            <div>
                <label>住所</label>
                <input type="text" name="address" value="{{ old('address', $onsen->address) }}" class="w-full border px-3 py-2">
            </div>

            <div>
                <label>説明</label>
                <textarea name="description" class="w-full border px-3 py-2">{{ old('description', $onsen->description) }}</textarea>
            </div>

            <div>
                <label>都道府県</label>
                <select name="prefecture_id" class="w-full border px-3 py-2">
                    @foreach ($prefectures as $prefecture)
                        <option value="{{ $prefecture->id }}"
                            {{ $onsen->prefecture_id == $prefecture->id ? 'selected' : '' }}>
                            {{ $prefecture->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>タグ</label>
                <div class="flex gap-3 flex-wrap">
                    @foreach ($tags as $tag)
                        <label>
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                {{ $onsen->tags->contains($tag->id) ? 'checked' : '' }}>
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">
                更新する
            </button>

        </form>

    </div>
</x-app-layout>