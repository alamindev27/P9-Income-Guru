<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Intro extends Model
{
    protected $guarded = [];
    protected static function booted()
    {
        static::saved(fn() => Cache::forget('intro'));
        static::deleted(fn() => Cache::forget('intro'));
    }
}
