<?php

use App\Http\Controllers\Business\BusinessController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Business\RegisteredBusinessController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', function () {
        if (auth()->user()->type === 'admin') {
            return redirect(route('admin.dashboard'));
        } else {
            return view('user.dashboard');
        }
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Business
    Route::get('/business/create', [RegisteredBusinessController::class, 'create'])->name('business.create');
    Route::post('/business', [RegisteredBusinessController::class, 'store'])->name('business.store');

    // middleware AdminAcess
    Route::middleware('admin')->group(function () {

        // Business
        Route::get('/business', [BusinessController::class, 'index'])->name('business.index');
        Route::get('/business/{id}', [BusinessController::class, 'show'])->name('business.show');
        Route::post('/business/avaliation', [BusinessController::class, 'avaliation'])->name('business.avaliation');
    });
});

require __DIR__ . '/auth.php';
