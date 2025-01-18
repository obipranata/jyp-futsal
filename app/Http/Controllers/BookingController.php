<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index($id)
    {
        return view('booking', ['id' =>  $id]);
    }
}
