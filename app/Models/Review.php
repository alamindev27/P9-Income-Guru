<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Review extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saved(fn() => Cache::forget('reviews'));
        static::deleted(fn() => Cache::forget('reviews'));
    }
}
