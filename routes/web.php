<?php
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [DashboardController::class, 'create'])->name('register');
Route::post('/register', [DashboardController::class, 'store'])->name('register.store');

Route::get('/data', [DashboardController::class, 'index'])->name('data.index');

Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('dashboard.edit');


Route::put('/edit/{id}', [DashboardController::class, 'update'])->name('dashboard.update');


Route::resource('dashboard', DashboardController::class)->except(['show']);