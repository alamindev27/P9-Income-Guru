<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {


    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');


    Route::controller(SettingController::class)->group(function () {
        Route::get('/site-setting', 'edit')->name('setting.edit');
        Route::post('/site-setting', 'update')->name('setting.update');

        Route::get('/security-setting', 'editSecurity')->name('setting.security.edit');
        Route::post('/security-setting', 'updateSecurity')->name('setting.security.update');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile.index');
        Route::post('/profile', 'update')->name('profile.update');
    });

    Route::resource('promos', PromoController::class)->except(['show']);
    Route::resource('banners', BannerController::class)->except(['create', 'show', 'destroy']);


});
