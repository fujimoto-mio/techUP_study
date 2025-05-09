<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>予約フォーム | NyanParadise</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #FCEFD6;
            font-family: sans-serif;
            color: #333;
            padding: 2rem;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        label {
            font-weight: bold;
            margin-top: 1rem;
            display: block;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            margin-top: 1.5rem;
            padding: 10px 20px;
            background-color: #8B5E3C;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #A06B45;
        }
        .status {
            color: #65A30D;
            font-weight: bold;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ご予約</h1>

        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('reserve.submit') }}">
            @csrf

            <label>名前</label>
            <input type="text" name="user_name" value="{{ old('user_name') }}" required>

            <label>ふりがな</label>
            <input type="text" name="user_kana" value="{{ old('user_kana') }}" required>

            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>電話番号</label>
            <input type="text" name="phone" value="{{ old('phone') }}" required>

            <label>予約日</label>
            <input type="date" name="reservation_date" value="{{ old('reservation_date', $defaultDate) }}" required>

            <label>予約時間</label>
            <select name="time_slot" required>
                @php
                    $start = \Carbon\Carbon::createFromTime(10, 0);
                    $end = \Carbon\Carbon::createFromTime(20, 0);
                @endphp
                @while ($start < $end)
                    <option value="{{ $start->format('H:i') }}"
                        @selected(old('time_slot') === $start->format('H:i'))>
                        {{ $start->format('H:i') }}
                    </option>
                    @php $start->addMinutes(15); @endphp
                @endwhile
            </select>

            <label>人数（1〜4人）</label>
            <input type="number" name="people" min="1" max="4" value="{{ old('people') }}" required>

            <button type="submit">予約する</button>
        </form>
    </div>
</body>
</html>
