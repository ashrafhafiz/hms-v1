<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', [DashboardController::class, 'user_dashbaord'])->name('user.dashboard');
});
Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin_dashbaord'])->name('admin.dashboard');
});
