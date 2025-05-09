<p>{{ $reservation->user_name }} 様</p>

<p>このたびはご予約いただきありがとうございます。</p>

<p>▼ご予約内容</p>
<ul>
    <li>日付：{{ $reservation->reservation_date }}</li>
    <li>時間：{{ \Carbon\Carbon::parse($reservation->time_slot)->format('H:i') }}</li>
    <li>人数：{{ $reservation->people }} 名</li>
</ul>

<p>▼予約確認・キャンセルはこちら</p>
<p>
    <a href="{{ url('/reservations/confirm?token=' . $reservation->token) }}">
        {{ url('/reservations/confirm?token=' . $reservation->token) }}
    </a>
</p>

<p>NyanParadise 猫カフェ</p>