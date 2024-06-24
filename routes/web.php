<?php

use App\Http\Controllers\Business\BusinessController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Business\RegisteredBusinessController;
use App\Models\Business;
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

    Route::get('/business/create', [RegisteredBusinessController::class, 'create'])->name('business.create');
    Route::post('/business', [RegisteredBusinessController::class, 'store'])->name('business.store');
    Route::get('/business', [BusinessController::class, 'index'])->name('business.index');
    Route::get('/business/{id}', [BusinessController::class, 'show'])->name('business.show');
});

require __DIR__ . '/auth.php';
