<x-app-layout>
    <div class="max-w-5xl mx-auto py-10">

        <h1 class="text-xl font-bold mb-6">温泉管理</h1>
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif
        <!-- 都道府県で絞る -->
        <form method="GET" action="{{ route('admin.onsens.index') }}" class="mb-4 flex gap-3">

            <select name="prefecture_id" class="border rounded px-3 py-2">
                <option value="">すべての都道府県</option>
                @foreach($prefectures as $prefecture)
                    <option value="{{ $prefecture->id }}" {{ request('prefecture_id') == $prefecture->id ? 'selected' : '' }}>
                        {{ $prefecture->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                絞り込み
            </button>
        </form>

        <!-- 温泉一覧結果 -->
        <table class="w-full border">
            <tr class="border-b">
                <th>名前</th>
                <th>都道府県</th>
                <th>操作</th>
            </tr>

            @foreach($onsens as $onsen)
                <tr class="border-b">
                    <td>{{ $onsen->name }}</td>
                    <td>{{ $onsen->prefecture->name }}</td>
                    <td class="flex gap-3">
                        <a href="{{ route('admin.onsens.edit', $onsen) }}">編集</a>

                        <form method="POST" action="{{ route('admin.onsens.destroy', $onsen) }}">
                            @csrf
                            @method('DELETE')
                            <button>削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>
</x-app-layout>