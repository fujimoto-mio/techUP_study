<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $fillable = ['code', 'name'];
    public $timestamps = false;

    public function onsens()
    {
        return $this->hasMany(Onsen::class);
    }
}