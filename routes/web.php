<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('frontend.index');
    // Add more frontend routes here if needed
});

Auth::routes([
    'register' => false,
]);


// --- Admin Routes ---
Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(base_path('routes/admin.php'));
