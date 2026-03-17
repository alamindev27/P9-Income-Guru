<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use App\Models\Promo;
use App\Models\Promotion;
use App\Models\Proof;
use App\Models\Review;
use App\Models\Social;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    public function index()
    {

        $intro = Cache::rememberForever('intro', function () {
            return Intro::select(['heading_1', 'heading_2', 'animated_text', 'image', 'winning_link'])->first();
        });

        $promos = Cache::rememberForever('promos', function () {
            return Promo::select(['name', 'icon', 'link', 'promo_code'])->get();
        });

        $proofs = Cache::rememberForever('proofs', function () {
            return Proof::select(['time', 'status'])->limit(3)->get();
        });

        $socials = Cache::rememberForever('socials', function () {
            return Social::select(['name', 'link', 'icon'])->get();
        });

        $reviews = Cache::rememberForever('reviews', function () {
            return Review::select(['description', 'image'])->get();
        });

        return view('frontend.index', compact('intro', 'promos', 'socials', 'proofs', 'reviews'));
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
        $datas = Promo::select(['id', 'name', 'icon'])->get();
        return view('frontend.verify-player', compact('datas'));
    }

    public function playerPromotion(Request $request)
    {
        $request->validate([
            'player_id' => 'required|numeric|min:1000000000|max:9999999999',
            'server_name' => 'required|string|max:10',
            'deposit_amount' => 'required|numeric| min:0',
            'promo_id' => 'required|exists:promos,id',
        ]);

        $promotion = [
            'player_id' => $request->player_id,
            'server_name' => $request->server_name,
            'deposit_amount' => $request->deposit_amount,
            'promo_id' => $request->promo_id,
        ];
        session(['promotion' => $promotion]);

        return redirect()->route('frontend.promotion.run', ['playerId' => $promotion['player_id'], 'serverName' => $promotion['server_name'], 'depositAmount' => $promotion['deposit_amount'], 'promoId' => $promotion['promo_id']]);
    }

    public function promotion($playerId, $serverName, $depositAmount, $promoId)
    {
        $promotion = session('promotion');
        if (
            !$promotion ||
            $promotion['player_id'] != $playerId ||
            $promotion['server_name'] != $serverName ||
            $promotion['deposit_amount'] != $depositAmount ||
            $promotion['promo_id'] != $promoId
        ) {
            return redirect()->route('frontend.verify.player');
        }
        $datas = Promo::select(['id', 'name', 'icon', 'promo_code'])->get();

        $promotionData = Cache::rememberForever('promotion', function () {
            return Promotion::first();
        });

        return view('frontend.promotion', compact('promotion', 'datas', 'promotionData'));
    }
}
