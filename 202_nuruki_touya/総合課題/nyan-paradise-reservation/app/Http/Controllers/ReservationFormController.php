<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmed;

class ReservationFormController extends Controller
{
    /**
     * フォーム表示
     */
    public function showForm(Request $request)
    {
        $defaultDate = $request->query('date'); // クエリ文字列から取得
        return view('reserve.form', compact('defaultDate'));
    }

    /**
     * フォーム送信処理
     */
    public function submitForm(Request $request)
    {
        $request->validate([
            'user_name'         => 'required|string|max:255',
            'user_kana'         => 'required|string|max:255',
            'people'            => 'required|integer|min:1|max:4',
            'email'             => 'required|email',
            'phone'             => 'required|string|max:20',
            'reservation_date'  => 'required|date',
            'time_slot'         => 'required',
        ]);

        // トークン生成
        $request->merge([
            'token' => Str::random(40),
            'status' => '予約確定済み',
        ]);

        // DB保存
        $reservation = Reservation::create($request->all());

        // 自動返信メール送信
        Mail::to($request->email)->send(new ReservationConfirmed($reservation));

        return redirect()->route('reserve.thanks');
    }
}
