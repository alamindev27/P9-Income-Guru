<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Promotion extends Model
{
    protected $guarded = [];

    // promotion

    protected static function booted()
    {
        static::saved(fn() => Cache::forget('promotion'));
        static::deleted(fn() => Cache::forget('promotion'));
    }

}
