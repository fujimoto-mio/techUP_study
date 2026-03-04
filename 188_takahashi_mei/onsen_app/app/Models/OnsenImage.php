<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Onsen;

class OnsenImage extends Model
{
    //
    protected $fillable = ['onsen_id', 'image_path', 'sort_order'];
    public function onsen()
    {
        return $this->belongsTo(Onsen::class);
    }
}
