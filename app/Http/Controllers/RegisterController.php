<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerAdmin()
    {
        return view('register-admin');
    }

    public function registerCustomer()
    {
        return view('register-customer');
    }
}
