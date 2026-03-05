<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Video extends Model
{
    protected $guarded = [];
    protected static function booted()
    {
        static::saved(fn() => Cache::forget('videos'));
        static::deleted(fn() => Cache::forget('videos'));
    }
}
