<?php

use App\Http\Controllers\BusinessTripController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RefillingController;
use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Models\Salary;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/salaries', [SalaryController::class, 'index'])->name('salary.index');
    Route::get('/salary/new', [SalaryController::class, 'create'])->name('salary.new');
    Route::post('/salary/store', [SalaryController::class, 'store'])->name('salary.store');
    Route::get('/salary/{salary}/show', [SalaryController::class, 'show'])->name('salary.show');
    Route::get('/salary/{salary}/edit', [SalaryController::class, 'edit'])->name('salary.edit');
    Route::put('/salary/{salary}', [SalaryController::class, 'update'])->name('salary.update');
    Route::delete('/salary/{salary}/destroy')->name('salary.destroy');

    Route::get('/refillings', [RefillingController::class, 'index'])->name('refillings');
    Route::get('/refilling/new', [RefillingController::class, 'create'])->name('refilling-new');
    Route::post('/refilling/store', [RefillingController::class, 'store'])->name('refilling-store');

    Route::get('/b-trips', [BusinessTripController::class, 'index'])->name('b-trips');
    Route::get('/b-trip/new', [BusinessTripController::class, 'create'])->name('b-trip-new');
    Route::post('/b-trip/store', [BusinessTripController::class, 'store'])->name('b-trip-store');
});
