<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#8B5E3C] leading-tight">
            {{ __('予約追加') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #FCEFD6;">
    <div class="max-w-xl mx-auto bg-white px-6 py-12 sm:px-10 rounded-lg shadow">
            <form method="POST" action="{{ route('reservations.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium text-sm text-[#8B5E3C]">名前</label>
                    <input type="text" name="user_name" value="{{ old('user_name') }}" class="w-full border p-2 rounded bg-white">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-[#8B5E3C]">ふりがな</label>
                    <input type="text" name="user_kana" value="{{ old('user_kana') }}" class="w-full border p-2 rounded bg-white">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-[#8B5E3C]">人数（1〜4人）</label>
                    <input type="number" name="people" value="{{ old('people') }}" min="1" max="4" class="w-full border p-2 rounded bg-white">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-[#8B5E3C]">メールアドレス</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border p-2 rounded bg-white">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-[#8B5E3C]">電話番号</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border p-2 rounded bg-white">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-[#8B5E3C]">予約日</label>
                    <input type="date" name="reservation_date" value="{{ old('reservation_date') }}" class="w-full border p-2 rounded bg-white">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-[#8B5E3C]">予約時間</label>
                    <select name="time_slot" class="w-full border p-2 rounded bg-white" required>
                        @php
                            $start = \Carbon\Carbon::createFromTime(10, 0);
                            $end = \Carbon\Carbon::createFromTime(20, 0);
                        @endphp
                        @while ($start < $end)
                            <option value="{{ $start->format('H:i') }}"
                                {{ old('time_slot') === $start->format('H:i') ? 'selected' : '' }}>
                                {{ $start->format('H:i') }}
                            </option>
                            @php $start->addMinutes(15); @endphp
                        @endwhile
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-[#8B5E3C]">ステータス</label>
                    <select name="status" class="w-full border p-2 rounded bg-white">
                        <option value="予約確定済み">予約確定済み</option>
                        <option value="キャンセル">キャンセル</option>
                    </select>
                </div>

                <div class="flex space-x-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    追加
                </button>
                    <a href="{{ route('dashboard') }}" class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">
                        戻る
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
