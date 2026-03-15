<?php

use App\Models\Setting;
use App\Models\Social;
use Illuminate\Support\Facades\Cache;

if (!function_exists('setting')) {
    function setting()
    {
        return Cache::rememberForever('app_setting', function () {
            return Setting::select([
                'author_name',
                'site_name',
                'logo',
                'favicon',
                'voice',
                'total_members',
                'total_won',
                'timer',
                'updated_at'
            ])->first();
        });
    }
}

if (!function_exists('social')) {
    function social()
    {
        return Cache::rememberForever('social', function () {
            return Social::first();
        });
    }
}
