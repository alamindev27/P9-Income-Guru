<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('setting')) {
    function setting()
    {
        return Cache::rememberForever('app_setting', function () {
            return Setting::select([
                'author_name',
                'logo',
                'favicon',
                'meta_title',
                'meta_keywords',
                'meta_description',
                'copywright',
                'instagram_link',
                'linkedin_link',
                'twitter_link',
                'github_link',
                'facebook_link',
            ])
                ->first();
        });
    }
}
