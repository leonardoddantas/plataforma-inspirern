<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Business\RegisteredBusinessController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/business', [RegisteredBusinessController::class, 'create'])->name('business.create');
    // Route::get('/confirmation', function () {
    //     return view('business/confirmation');
    // });
});

require __DIR__ . '/auth.php';
