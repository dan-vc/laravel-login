<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
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
});

require __DIR__.'/auth.php';

Route::middleware('auth', 'admin')->get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('login/{provider}', [AuthenticatedSessionController::class, 'redirectToProvider'])->name('login.provider');
Route::get('login/{provider}/callback', [AuthenticatedSessionController::class, 'handleProviderCallback'])->name('login.provider.callback');    
