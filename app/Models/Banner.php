<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Banner extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saved(fn() => Cache::forget('banner'));
        static::deleted(fn() => Cache::forget('banner'));
    }
}
