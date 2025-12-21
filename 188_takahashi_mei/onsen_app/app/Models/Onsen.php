<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

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
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
