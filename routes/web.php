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
use Illuminate\Support\Facades\Route;

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

Route::middleware(['verify.token'])->group(function () {
    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('mahasiswa/edit{npm}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('mahasiswa/update{npm}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('mahasiswa/delete{npm}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});

Route::middleware(['verify.token'])->group(function () {
    Route::get('matkul', [MatkulController::class, 'index'])->name('matkul.index');
    Route::get('matkul/create', [MatkulController::class, 'create'])->name('matkul.create');
    Route::post('matkul', [MatkulController::class, 'store'])->name('matkul.store');
    Route::get('matkul/edit{id}', [MatkulController::class, 'edit'])->name('matkul.edit');
    Route::put('matkul/update{id}', [MatkulController::class, 'update'])->name('matkul.update');
    Route::delete('matkul/delete{id}', [MatkulController::class, 'destroy'])->name('matkul.destroy');
});
    // Menambahkan middleware pada route resource
    
Route::middleware(['verify.token'])->group(function () {
    Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('absensi', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('absensi/edit{id}', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('absensi/update{id}', [AbsensiController::class, 'update'])->name('absensi.update');
    Route::delete('absensi/delete{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
});
    
Route::middleware(['verify.token'])->group(function () {
    Route::get('dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('mahasiswa/edit{id}', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('dosen/update{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('dosen/delete{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
});


});