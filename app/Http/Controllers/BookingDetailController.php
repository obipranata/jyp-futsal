<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingDetailController extends Controller
{
    public function index()
    {
        return view('booking-detail');
    }
}
