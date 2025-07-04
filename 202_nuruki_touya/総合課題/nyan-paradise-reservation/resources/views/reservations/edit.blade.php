<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('予約編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white px-6 py-12 sm:px-10 rounded-lg shadow">
            <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">名前</label>
                    <input type="text" name="user_name" value="{{ old('user_name', $reservation->user_name) }}" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">ふりがな</label>
                    <input type="text" name="user_kana" value="{{ old('user_kana', $reservation->user_kana) }}" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">人数（1〜4人）</label>
                    <input type="number" name="people" value="{{ old('people', $reservation->people) }}" min="1" max="4" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">予約日</label>
                    <input type="date" name="reservation_date" value="{{ old('reservation_date', $reservation->reservation_date) }}" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">予約時間</label>
                    <select name="time_slot" class="form-input mt-1 block w-full border p-2 rounded" required>
                        @php
                            $start = \Carbon\Carbon::createFromTime(10, 0);
                            $end = \Carbon\Carbon::createFromTime(20, 0);
                        @endphp

                        @while ($start < $end)
                            <option value="{{ $start->format('H:i') }}"
                                {{ old('time_slot', $reservation->time_slot ?? '') === $start->format('H:i') ? 'selected' : '' }}>
                                {{ $start->format('H:i') }}
                            </option>
                            @php $start->addMinutes(15); @endphp
                        @endwhile
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">ステータス</label>
                    <select name="status" class="w-full border p-2 rounded">
                        <option value="予約確定済み" @selected($reservation->status === '予約確定済み')>予約確定済み</option>
                        <option value="キャンセル" @selected($reservation->status === 'キャンセル')>キャンセル</option>
                    </select>
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">更新</button>
                    <a href="{{ route('dashboard') }}" class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">戻る</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
