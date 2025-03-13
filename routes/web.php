<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    
    Route::get('/admin/login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login']);
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

//only 　for admin
Route::middleware(['auth:admin'])->group(function () {

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/register', [UserController::class, 'create'])->name('user.register');
    Route::post('/user/register', [UserController::class, 'store'])->name('user.register.store');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

});


//both admin and user 

Route::middleware('auth:admin|user')->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/export-csv', [DashboardController::class, 'exportCSV'])->name('dashboard.exportCSV'); // ユーザー用CSVエクスポート
    Route::get('/register', [DashboardController::class, 'create'])->name('register');

    Route::resource('dashboard', DashboardController::class);



    Route::get('/inquiry', [InquiryController::class, 'index'])->name('inquiry.index');
    Route::post('/inquiry', [InquiryController::class, 'submit'])->name('inquiry.submit');



});