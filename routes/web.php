<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
// use App\Http\Controllers\NamaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Halaman utama (Landing Page)
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Authentication Routes
// Route::middleware([UserMiddleware::class])->group(function () {
    // Login Routes
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Registration Routes
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// });

// Authenticated Routes
Route::middleware([UserMiddleware::class])->group(function () {
    // Rute untuk menampilkan halaman absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');

    // Rute untuk menyimpan absensi baru
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

    // Rute untuk menampilkan halaman edit absensi
    Route::get('/absensi/{id}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');

    // Rute untuk memperbarui absensi
    Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update');

    // Rute untuk menghapus absensi
   

    Route::get('/rekap', [AbsensiController::class, 'rekap'])->name('absensi.rekap');

    Route::get('/izin', [IzinController::class, 'create'])->name('izin.create'); // Menampilkan form izin
    Route::post('/izin', [IzinController::class, 'store'])->name('izin.store'); // Menyimpan izin

    // Logout Route
});

//krishna tambahin

// Route::prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // Dashboard Admin
//     Route::resource('siswa', SiswaController::class); // CRUD Data Siswa
//     Route::get('rekap-absensi', [AbsensiController::class, 'rekapAdmin'])->name('admin.rekap-absensi'); // Rekap Absensi Admin
//     Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update'); // Update Status Absensi
//     Route::post('/izin', [IzinController::class, 'store'])->name('izin.store'); // Simpan Izin
// });


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // Dashboard Admin
        Route::resource('siswa', SiswaController::class); // CRUD Data Siswa
        Route::get('rekap-absensi', [AbsensiController::class, 'rekapAdmin'])->name('admin.rekap-absensi'); // Rekap Absensi Admin
        Route::put('/absensi/{id}', [AbsensiController::class, 'update'])->name('absensi.update'); // Update Status Absensi
        // Route::post('/izin', [IzinController::class, 'store'])->name('izin.store'); // Simpan Izin
        Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
    });
});