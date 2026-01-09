<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            温泉登録
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6">
        <form method="POST" action="{{ route('onsens.store') }}">
            @csrf

            <label class="block mb-2">温泉名</label>
            <input type="text" name="name" class="w-full mb-4 p-2 border rounded">

            <label class="block mb-2">住所</label>
            <input type="text" name="address" class="w-full mb-4 p-2 border rounded">

            <label class="block mb-2">都道府県</label>
            <select name="prefecture_id" class="w-full mb-4 p-2 border rounded">
                <option value="">選択してください</option>
                @foreach ($prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}">
                        {{ $prefecture->name }}
                    </option>
                @endforeach
            </select>
            <label class="block mb-2">タグ</label>
            <div class="mb-4">
                @foreach ($tags as $tag)
                    <label class="inline-flex items-center mr-6">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                        {{ $tag->name }}
                    </label>
                @endforeach
            </div>

            <label class="block mb-2">説明</label>
            <textarea name="description" class="w-full mb-4 p-2 border rounded"></textarea>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                登録
            </button>
        </form>
    </div>
</x-app-layout>