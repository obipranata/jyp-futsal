<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index(){
        return view('super-admin.index');
    }

    public function dataTempatPenyewaan(){
        return view('super-admin.data-tempat-penyewaan');
    }
}
