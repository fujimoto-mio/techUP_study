<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#8B5E3C] leading-tight">
            {{ __('予約管理') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #FCEFD6;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4 text-[#8B5E3C]">予約一覧</h3>

                    <!-- 日付フィルター -->
                    <div class="flex justify-center items-center my-4 space-x-4">
                        <a href="{{ route('dashboard', ['date' => $previousDate->toDateString()]) }}"
                           class="px-4 py-2 rounded bg-[#FCEFD6] hover:bg-[#F9DBB8] border border-[#8B5E3C] text-[#8B5E3C]">
                           ＜ {{ $previousDate->format('m月d日（D）') }}</a>

                        <a href="{{ route('calendar.index') }}"
                           class="text-xl font-bold text-[#8B5E3C] underline hover:text-[#A06B45]">
                            {{ $selectedDate->format('m月d日（D）') }}
                        </a>

                        <a href="{{ route('dashboard', ['date' => $nextDate->toDateString()]) }}"
                           class="px-4 py-2 rounded bg-[#FCEFD6] hover:bg-[#F9DBB8] border border-[#8B5E3C] text-[#8B5E3C]">
                           {{ $nextDate->format('m月d日（D）') }} ＞</a>
                    </div>

                    <!-- 追加ボタン -->
                    <a href="{{ route('reservations.create') }}"
                       class="inline-block bg-green-600 text-white px-4 py-2 rounded mb-4 hover:bg-green-700">
                        ＋ 予約を追加
                    </a>

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-[#65A30D]">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="w-full border border-gray-300 text-sm">
                        <thead>
                            <tr class="bg-[#F9DBB8] text-left text-[#8B5E3C]">
                                <th class="border px-4 py-2">名前（ふりがな）</th>
                                <th class="border px-4 py-2">電話番号</br>メールアドレス</th>
                                <th class="border px-4 py-2">日付</th>
                                <th class="border px-4 py-2">時間</th>
                                <th class="border px-4 py-2">人数</th>
                                <th class="border px-4 py-2">ステータス</th>
                                <th class="border px-4 py-2 text-center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td class="border px-4 py-2">
                                        {{ $reservation->user_name }}
                                        <div class="text-xs text-gray-500">{{ $reservation->user_kana }}</div>
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ $reservation->phone }}<br>
                                        {{ $reservation->email }}
                                    </td>
                                    <td class="border px-4 py-2">{{ $reservation->reservation_date }}</td>
                                    <td class="border px-4 py-2">
                                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $reservation->time_slot)->format('H:i') }}
                                    </td>
                                    <td class="border px-4 py-2">{{ $reservation->people }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($reservation->status === 'キャンセル')
                                            <span class="text-[#FF6B6B] font-semibold">キャンセル</span>
                                        @else
                                            <span class="text-[#65A30D] font-semibold">予約済み（メール送信済み）</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2 text-center space-x-2">
                                        @if ($reservation->status !== 'キャンセル')
                                            <a href="{{ route('reservations.edit', $reservation->id) }}"
                                               class="text-blue-600 hover:underline">編集</a>

                                            <form action="{{ route('reservations.cancel', $reservation->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('この予約をキャンセルしますか？');"
                                                  class="inline-block">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-[#FF6B6B] hover:underline">キャンセル</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400">キャンセル済</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
