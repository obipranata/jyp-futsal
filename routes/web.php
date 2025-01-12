<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BookingDetailController;
use App\Http\Controllers\booking\PembayaranController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/register-admin', [RegisterController::class, 'registerAdmin'])->name('register-admin');
Route::get('/register-customer', [RegisterController::class, 'registerCustomer'])->name('register-customer');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/booking-detail', [BookingDetailController::class, 'index'])->name('booking-detail');
Route::get('/booking/informasi-pembayaran', [PembayaranController::class, 'informasiPembayaran'])->name('informasi-pembayaran');
Route::get('/booking/konfirmasi-pembayaran', [PembayaranController::class, 'konfirmasiPembayaran'])->name('konfirmasi-pembayaran');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
