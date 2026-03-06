<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Promo;
use App\Models\Social;
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

        $socials = Cache::rememberForever('socials', function () {
            return Social::where('status', 'active')->select(['name', 'link', 'subscriber', 'icon'])->get();
        });

        return view('frontend.index', compact('banner', 'promos', 'socials'));
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


    public function verifyPlayer()
    {
        $promos = Cache::rememberForever('promos', function () {
            return Promo::select(['id', 'name', 'icon'])->get();
        });
        return view('frontend.verify-player', compact('promos'));
    }

    public function playerPromotion(Request $request)
    {
        $request->validate([
            'player_id' => 'required|numeric|min:1000000000|max:9999999999',
            'server_name' => 'required|string|max:10',
            'promo_id' => 'required|exists:promos,id',
        ]);
        // return $request;


        $promotion = [
            'player_id' => $request->player_id,
            'server_name' => $request->server_name,
            'promo_id' => $request->promo_id,
        ];
        session(['promotion' => $promotion]);

        return redirect()->route('frontend.promotion.run');
    }

    public function promotion()
    {

        $promotion = session('promotion');



        return view('frontend.promotion', compact('promotion'));
    }
}
