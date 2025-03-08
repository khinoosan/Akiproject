<?php


use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [DashboardController::class, 'create'])->name('register');
Route::post('/register', [DashboardController::class, 'store'])->name('register.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');

Route::resource('dashboard', DashboardController::class)->except(['show']);
