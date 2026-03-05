<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Promo extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saved(fn() => Cache::forget('promos'));
        static::deleted(fn() => Cache::forget('promos'));
    }
}
