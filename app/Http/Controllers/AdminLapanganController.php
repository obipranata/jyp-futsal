<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLapanganController extends Controller
{
    public function index()
    {
        return view('admin-lapangan.index');
    }

    public function penyewaan()
    {
        return view('admin-lapangan.penyewaan');
    }

    public function lapangan()
    {
        return view('admin-lapangan.lapangan');
    }

    public function member()
    {
        return view('admin-lapangan.member');
    }

    public function tambahLapangan()
    {
        return view('admin-lapangan.tambah-lapangan');
    }

    public function editLapangan($id)
    {
        return view('admin-lapangan.edit-lapangan', ['id' => $id]);
    }
}
