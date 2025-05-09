<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    /**
     * カレンダー画面を表示
     */
    public function index()
    {
        // 対象月（今月＋来月）
        $start = Carbon::today()->startOfMonth();
        $end = Carbon::today()->addMonth()->endOfMonth();

        // 指定期間内の予約を取得
        $reservations = DB::table('reservations')
            ->select('reservation_date', DB::raw('count(*) as total'))
            ->whereBetween('reservation_date', [$start, $end])
            ->where('status', '!=', 'キャンセル')
            ->groupBy('reservation_date')
            ->get();

        // 日付ごとの予約数をマッピング
        $reservationCounts = $reservations->pluck('total', 'reservation_date')->toArray();

        // 表示するイベントデータを作成
        $calendarEvents = [];

        // 毎日をループして予約可能か判断
        $date = $start->copy();
        while ($date <= $end) {
            $dateString = $date->format('Y-m-d');
            $count = $reservationCounts[$dateString] ?? 0;

            $isFull = $count >= 12; // 1日に12件まで予約可
            $calendarEvents[] = [
                'title' => $isFull ? '満席' : '予約可能',
                'start' => $dateString,
                'url'   => $isFull ? null : route('reserve.form', ['date' => $dateString]),
                'clickable' => !$isFull,
                'color' => $isFull ? '#ccc' : '#8B5E3C',
            ];

            $date->addDay();
        }

        return view('calendar.index', compact('calendarEvents'));
    }
}
