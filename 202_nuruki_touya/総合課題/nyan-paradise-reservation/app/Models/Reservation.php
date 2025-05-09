<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_kana',
        'people',
        'email',
        'phone',
        'reservation_date',
        'time_slot',
        'status',
        'token',
        'calendar_event_id',
    ];
}