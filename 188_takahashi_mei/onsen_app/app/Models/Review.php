<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['onsen_id','user_id','rating','comment',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function onsen()
    {
        return $this->belongsTo(Onsen::class);
    }
}
