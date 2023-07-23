<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::middleware(['auth', 'verified'])->group(function () {
            Route::get('user/dashboard', [DashboardController::class, 'user_dashbaord'])->name('user.dashboard');
        });
        Route::middleware(['auth:admin', 'verified'])->group(function () {
            Route::get('admin/dashboard', [DashboardController::class, 'admin_dashbaord'])->name('admin.dashboard');
        });
    }
);
