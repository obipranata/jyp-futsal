<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BookingDetailController;
use App\Http\Controllers\booking\PembayaranController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminLapanganController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PDFController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/payments/callback', [PaymentController::class, 'handleWebhook']);
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/booking/{id}/detail', [BookingController::class, 'index'])->name('booking');
Route::get('/register-admin', [RegisterController::class, 'registerAdmin'])->name('register-admin');
Route::get('/register-customer', [RegisterController::class, 'registerCustomer'])->name('register-customer');
Route::get('/event', [EventController::class, 'index'])->name('event');
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/booking-detail', [BookingDetailController::class, 'index'])->name('booking-detail');
Route::get('/booking/informasi-pembayaran', [PembayaranController::class, 'informasiPembayaran'])->name('informasi-pembayaran');
Route::get('/booking/{virtual_account}/konfirmasi-pembayaran', [PembayaranController::class, 'konfirmasiPembayaran'])->name('konfirmasi-pembayaran');

Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('laporan-pdf');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])
->get('/user-login', function(){
    $user = auth()->user();
    $role = $user->roles->first()->name;
    if ($role  === 'super-admin') {
        return redirect(route('super-admin.index'));
    } elseif ($role === 'admin-lapangan') {
        return redirect(route('admin-lapangan.index'));
    } elseif ($role === 'penyewa') {
        return redirect(route('beranda'));
    }
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:super-admin',
])
->name('super-admin.')
->prefix('super-admin')
->group(function () {
    Route::get('/' , [SuperAdminController::class, 'index'])->name('index');
    Route::get('/data-tempat-penyewaan' , [SuperAdminController::class, 'dataTempatPenyewaan'])->name('data-tempat-penyewaan');
    Route::get('/event' , [SuperAdminController::class, 'event'])->name('event');
    Route::get('/tambah-event' , [SuperAdminController::class, 'tambahEvent'])->name('tambah-event');
    Route::get('/edit-event/{id}' , [SuperAdminController::class, 'editEvent'])->name('edit-event');
    Route::get('/laporan' , [SuperAdminController::class, 'laporan'])->name('laporan');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin-lapangan',
])
->name('admin-lapangan.')
->prefix('admin')
->group(function () {
    Route::get('/' , [AdminLapanganController::class, 'index'])->name('index');
    Route::get('/penyewaan' , [AdminLapanganController::class, 'penyewaan'])->name('penyewaan');
    Route::get('/lapangan' , [AdminLapanganController::class, 'lapangan'])->name('lapangan');
    Route::get('/member' , [AdminLapanganController::class, 'member'])->name('member');

    Route::get('/tambah-lapangan' , [AdminLapanganController::class, 'tambahLapangan'])->name('tambah-lapangan');
    Route::get('/edit-lapangan/{id}' , [AdminLapanganController::class, 'editLapangan'])->name('edit-lapangan');
});
