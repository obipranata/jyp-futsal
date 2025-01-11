<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/register-admin', [RegisterController::class, 'registerAdmin'])->name('register-admin');
Route::get('/register-customer', [RegisterController::class, 'registerCustomer'])->name('register-customer');
Route::get('/event', [EventController::class, 'index'])->name('event');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
