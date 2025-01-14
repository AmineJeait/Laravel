<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [dashboard::class,'showDash'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/form', [dashboard::class,'doForm'])->middleware(['auth', 'verified'])->name('form');
Route::get('/form', [dashboard::class,'showForm'])->middleware(['auth', 'verified'])->name('form');
Route::get('/retrait', [dashboard::class,'showRetrait'])->middleware(['auth', 'verified'])->name('retrait');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
