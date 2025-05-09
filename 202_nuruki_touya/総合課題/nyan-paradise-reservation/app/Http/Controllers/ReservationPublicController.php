<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationPublicController extends Controller
{
    /**
     * 顧客が予約確認ページにアクセス（tokenで検索）
     */
    public function confirm(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            abort(404, 'トークンが見つかりません');
        }

        $reservation = Reservation::where('token', $token)->first();

        if (!$reservation) {
            abort(404, '予約が見つかりません');
        }

        return view('reservations.confirm', compact('reservation'));
    }

    /**
     * 顧客が予約をキャンセル（tokenで確認）
     */
    public function guestCancel(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        $reservation = Reservation::where('token', $request->input('token'))->first();

        if (!$reservation) {
            return redirect()->back()->with('error', '予約が見つかりません');
        }

        $reservation->status = 'キャンセル';
        $reservation->save();

        return redirect()->back()->with('status', '予約をキャンセルしました。');
    }
}
