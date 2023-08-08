<?php

use App\Http\Controllers\Dashboard\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::middleware(['auth', 'verified'])->group(function () {
            // User Dashboard
            Route::get('user/dashboard', [DashboardController::class, 'user_dashbaord'])->name('user.dashboard');
        });

        Route::middleware(['auth:admin', 'verified'])->group(function () {
            // Admin Dashboard
            Route::get('admin/dashboard', [DashboardController::class, 'admin_dashbaord'])->name('admin.dashboard');
            // Sections
            Route::resource('sections', SectionController::class);
            // Doctors
            Route::resource('doctors', DoctorController::class);
            Route::put('doctors/{doctor}/change-password', [DoctorController::class, 'changePassword'])->name('doctor.change-password');
            Route::put('doctors/{doctor}/change-status', [DoctorController::class, 'changeStatus'])->name('doctor.change-status');

            // Demos
            Route::prefix('demo')->group(function () {
                Route::view('form-elements', 'dashboard.demo.form-elements');
                Route::view('buttons', 'dashboard.demo.buttons');
                Route::view('modals', 'dashboard.demo.modals');
                Route::view('alerts', 'dashboard.demo.alerts');
                Route::view('notification', 'dashboard.demo.notification');
                Route::view('popover', 'dashboard.demo.popover');
                Route::view('sweet-alert', 'dashboard.demo.sweet-alert');
                Route::view('form-elements', 'dashboard.demo.form-elements');
                Route::view('form-layouts', 'dashboard.demo.form-layouts');
                Route::view('form-editor', 'dashboard.demo.form-editor');
                Route::view('form-advanced', 'dashboard.demo.form-advanced');
            });
        });
    }
);
