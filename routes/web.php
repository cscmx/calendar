<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\AppointmentController; 
use App\Http\Controllers\DashboardController; 

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/members', MemberController::class)->only('create', 'store', 'index', 'edit', 'update', 'show', 'destroy');
    Route::resource('/labels', LabelController::class)->only('create', 'store', 'index', 'edit', 'update', 'destroy');
    Route::resource('/appointments', AppointmentController::class)->only('create', 'store', 'index', 'edit', 'update', 'show', 'destroy');
    Route::get ('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
