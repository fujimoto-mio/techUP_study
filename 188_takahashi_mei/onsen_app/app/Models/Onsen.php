<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onsen extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "address",
        "prefecture_id",
        "description",
        "image_url",
        "avg_rating",
    ];
    //
}
