<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Social extends Model
{
    protected $guarded = [];
    protected static function booted()
    {
        static::saved(fn() => Cache::forget('social'));
        static::deleted(fn() => Cache::forget('social'));
    }
}
