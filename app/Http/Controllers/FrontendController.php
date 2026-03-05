<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Promo;
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
}
