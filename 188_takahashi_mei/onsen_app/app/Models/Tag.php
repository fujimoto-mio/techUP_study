<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function onsens()
    {
        return $this->belongsToMany(Onsen::class);
    }
}
