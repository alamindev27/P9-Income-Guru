<?php

use App\Models\Setting;
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
            ])->first();
        });
    }
}
