<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QRCodeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [QRCodeController::class,'index'])->name('qrcode');

Route::prefix('qrcodes')->group(function () {
    Route::post('/', [QRCodeController::class,'create'])->name('qrcodes.create');
});

Route::prefix('scanned')->group(function () {
    Route::get('/', [AttendanceController::class,'detect'])->name('scanned');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return Inertia::render('Home');
    })->name('home');

    Route::get('admin', function () {
        return Inertia::render('Admin');
    })->name('admin');

});

Route::get('login', [LoginController::class,'index'])->name('login');
Route::post('login', [LoginController::class,'store'])->name('login');
Route::post('logout', [LoginController::class,'destroy'])->name('logout');



// Route::get('/scanned', function () {
//     return Inertia::render('Scanned');
// })->name('scanned');

// Route::post('', [AttendanceController::class,''])->name('attendance');

// Route::get('dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

