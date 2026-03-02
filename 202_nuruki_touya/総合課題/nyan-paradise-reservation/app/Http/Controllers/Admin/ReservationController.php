<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\ReservationConfirmed;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    // 一覧表示
    // App\Http\Controllers\Admin\ReservationController.php に入れる

    public function index(Request $request)
    {
        $selectedDate = $request->query('date') 
         ? \Carbon\Carbon::parse($request->query('date')) 
        : \Carbon\Carbon::today();
        $reservations = Reservation::whereDate('reservation_date', $selectedDate)->orderBy('time_slot')->get();

    return view('dashboard', [
        'reservations' => $reservations,
        'selectedDate' => $selectedDate,
        'previousDate' => $selectedDate->copy()->subDay(),
        'nextDate' => $selectedDate->copy()->addDay(),
    ]);
}


    // キャンセル処理
    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->status = 'キャンセル';
        $reservation->save();

        return redirect()->route('dashboard')->with('status', '予約をキャンセルしました。');
    }

    // 編集フォーム表示
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    // 編集内容保存
    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $request->validate([
            'user_name'         => 'required|string|max:255',
            'user_kana'         => 'required|string|max:255',
            'people'            => 'required|integer|min:1|max:4',
            'email'             => 'required|email',
            'phone'             => 'required|string|max:20',
            'reservation_date'  => 'required|date',
            'time_slot'         => 'required',
            'status'            => 'required',
        ]);

        $reservation->update($request->all());

        return redirect()->route('dashboard')->with('status', '予約を更新しました。');
    }

    // 追加フォーム表示（新規予約）
    public function create()
    {
        return view('reservations.create');
    }

    // 新規予約保存処理
    public function store(Request $request)
    {
        $request->validate([
            'user_name'         => 'required|string|max:255',
            'user_kana'         => 'required|string|max:255',
            'people'            => 'required|integer|min:1|max:4',
            'email'             => 'required|email',
            'phone'             => 'required|string|max:20',
            'reservation_date'  => 'required|date',
            'time_slot'         => 'required',
            'status'            => 'required',
        ]);
    
        // トークンを追加
        $request->merge([
            'token' => \Str::random(40),
        ]);
    
        // 予約登録
        $reservation = Reservation::create($request->all());
    
        // 自動返信メール送信
        \Mail::to($request->email)->send(new \App\Mail\ReservationConfirmed($reservation));
    
        return redirect()->route('dashboard')->with('status', '予約を追加しました。');
    }
    
}
