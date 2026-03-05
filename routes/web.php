<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::controller(FrontendController::class)->as('frontend.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/videos', 'videos')->name('videos');
    Route::get('/watch/{slug}', 'watch')->name('video.watch');

});

Auth::routes([
    'register' => false,
]);


// --- Admin Routes ---
Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(base_path('routes/admin.php'));
