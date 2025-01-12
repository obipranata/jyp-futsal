<?php

namespace App\Http\Controllers\booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function informasiPembayaran()
    {
        return view('booking.infomasi-pembayaran');
    }

    public function konfirmasiPembayaran()
    {
        return view('booking.konfirmasi-pembayaran');
    }
}
