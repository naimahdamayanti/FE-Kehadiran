<?php


use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\PDFController;

Route::get('/export-pdf', [PDFController::class, 'exportPDF'])->name('export-pdf');

Route::get('/welcome', function (){
    return view('welcome');
});

// Route ini untuk halaman login, tidak memerlukan middleware
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [registerController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [registerController::class, 'register'])->name('register.submit');

// Route yang perlu login
Route::middleware(['verify.token'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Menambahkan middleware pada route resource
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('matkul', MatkulController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::resource('dosen', DosenController::class);
});