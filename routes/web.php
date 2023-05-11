<?php

use App\Http\Controllers\EncyclopediaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetsEncyclopediaController;
use App\Http\Controllers\StuffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('/stuff')->group(function () {
        Route::get('/show/{id}', [StuffController::class, 'show'])->name('stuff.show');
    });
    Route::get('/dashboard', [HomeController::class, 'show'])->name('dashboard');
    Route::get('/encyclopedia', [EncyclopediaController::class, 'show'])->name('encyclopedia');
    Route::get('/sets-encyclopedia', [SetsEncyclopediaController::class, 'show'])->name('sets-encyclopedia');
});

Route::fallback(function () {
    return redirect('login');
});


require __DIR__ . '/auth.php';
