<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saved(fn() => Cache::forget('app_setting'));
        static::deleted(fn() => Cache::forget('app_setting'));
    }
}
