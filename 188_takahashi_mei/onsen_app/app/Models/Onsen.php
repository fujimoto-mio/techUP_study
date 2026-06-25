<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\Like;
use App\Models\OnsenImage;

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
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function images()
    {
        return $this->hasMany(OnsenImage::class);
    }
}
