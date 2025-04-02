<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\CargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController; 
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('/motoristas', MotoristaController::class);
    Route::resource('/veiculos', VeiculoController::class);
    Route::resource('/cargas', CargaController::class);
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


require __DIR__.'/auth.php';
