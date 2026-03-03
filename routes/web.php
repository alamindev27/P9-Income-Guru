<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');

    return redirect('/login');
});

Auth::routes();


// --- Admin Routes ---
Route::prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(base_path('routes/admin.php'));
