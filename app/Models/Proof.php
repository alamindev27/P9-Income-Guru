<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Proof extends Model
{
    protected $guarded = [];

    protected static function booted()
    {
        static::saved(fn() => Cache::forget('proofs'));
        static::deleted(fn() => Cache::forget('proofs'));
    }
}
