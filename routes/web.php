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
    Route::post('/salary/{salary}', [SalaryController::class, 'update'])->name('salary.update');
    Route::delete('/salary/{salary}/destroy', [SalaryController::class, 'destroy'])->name('salary.destroy');

    Route::get('/b-trips', [BusinessTripController::class, 'index'])->name('b-trip.index');
    Route::get('/b-trip/new', [BusinessTripController::class, 'create'])->name('b-trip.new');
    Route::post('/b-trip/store', [BusinessTripController::class, 'store'])->name('b-trip.store');
    Route::get('/b-trip/{BusinessTrip}/show', [BusinessTripController::class, 'show'])->name('b-trip.show');
    Route::get('/b-trip/{BusinessTrip}/edit', [BusinessTripController::class, 'edit'])->name('b-trip.edit');
    Route::post('/b-trip/{BusinessTrip}', [BusinessTripController::class, 'update'])->name('b-trip.update');
    Route::delete('/b-trip/{BusinessTrip}/destroy', [BusinessTripController::class, 'destroy'])->name('b-trip.destroy');

    Route::get('/refillings', [RefillingController::class, 'index'])->name('refilling.index');
    Route::get('/refilling/new', [RefillingController::class, 'create'])->name('refilling.new');
    Route::post('/refilling/store', [RefillingController::class, 'store'])->name('refilling.store');
    Route::get('/refilling/{refilling}/show', [RefillingController::class, 'show'])->name('refilling.show');
    Route::get('/refilling/{refilling}/edit', [RefillingController::class, 'edit'])->name('refilling.edit');
    Route::post('/refilling/{refilling}', [RefillingController::class, 'update'])->name('refilling.update');
    Route::delete('/refilling/{refilling}/destroy', [RefillingController::class, 'destroy'])->name('refilling.destroy');
});
