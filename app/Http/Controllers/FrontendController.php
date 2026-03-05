<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Promo;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    public function index()
    {

        $banner = Cache::rememberForever('banner', function () {
            return Banner::select(['heading_1', 'heading_2', 'short_description', 'image'])->first();
        });

        $promos = Cache::rememberForever('promos', function () {
            return Promo::select(['name', 'icon', 'link', 'promo_code'])->get();
        });

        return view('frontend.index', compact('banner', 'promos'));
    }

    public function videos()
    {
        $videos = Cache::rememberForever('videos', function () {
            return Video::select(['title', 'slug', 'thumbnail'])->get();
        });
        return view('frontend.videos.index', compact('videos'));
    }

    public function watch($slug)
    {
        $video = Video::where('slug', $slug)->firstOrFail();
        return view('frontend.videos.watch', compact('video'));
    }
}
