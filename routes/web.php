<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\View\Components\GuestLayout;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/pemerintahan', [GuestController::class, 'gov'])->name('gov');
Route::get('/demografi', [GuestController::class, 'demo'])->name('demo');
Route::get('/geografi', [GuestController::class, 'geo'])->name('geo');
Route::get('/berita', [GuestController::class, 'news'])->name('news');
Route::get('/layanan', [GuestController::class, 'service'])->name('service');



require __DIR__ . '/auth.php';
