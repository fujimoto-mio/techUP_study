<x-guest-layout>
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow rounded">
        <h2 class="text-2xl font-bold mb-6 text-center">予約内容の確認</h2>

        @if (session('status'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 text-red-600 font-semibold">
                {{ session('error') }}
            </div>
        @endif

        <table class="w-full text-sm mb-6">
            <tr>
                <th class="text-left py-2">名前：</th>
                <td class="py-2">{{ $reservation->user_name }}</td>
            </tr>
            <tr>
                <th class="text-left py-2">ふりがな：</th>
                <td class="py-2 text-gray-600">{{ $reservation->user_kana }}</td>
            </tr>
            <tr>
                <th class="text-left py-2">予約日：</th>
                <td class="py-2">{{ $reservation->reservation_date }}</td>
            </tr>
            <tr>
                <th class="text-left py-2">時間：</th>
                <td class="py-2">
                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $reservation->time_slot)->format('H:i') }}
                </td>
            </tr>
            <tr>
                <th class="text-left py-2">人数：</th>
                <td class="py-2">{{ $reservation->people }} 人</td>
            </tr>
            <tr>
                <th class="text-left py-2">ステータス：</th>
                <td class="py-2">{{ $reservation->status }}</td>
            </tr>
        </table>

        @if ($reservation->status !== 'キャンセル')
            <form method="POST" action="{{ route('reservations.guestCancel') }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="token" value="{{ $reservation->token }}">

                <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 w-full">
                    この予約をキャンセルする
                </button>
            </form>
        @else
            <p class="text-center text-gray-500">この予約はすでにキャンセルされています。</p>
        @endif
    </div>
</x-guest-layout>
