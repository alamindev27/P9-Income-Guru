<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('/reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    dd('Done');
});


Route::controller(FrontendController::class)->as('frontend.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/videos', 'videos')->name('videos');
    Route::get('/watch/{slug}', 'watch')->name('video.watch');
    Route::get('/verify/player', 'verifyPlayer')->name('verify.player');
    Route::post('/verify/player', 'playerPromotion')->name('player.promotion');
    Route::get('/promotion/{playerId}/{serverName}/{depositAmount}/{promoId}', 'promotion')->name('promotion.run');

});

Auth::routes([
    'register' => false,
]);


// --- Admin Routes ---
Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(base_path('routes/admin.php'));
