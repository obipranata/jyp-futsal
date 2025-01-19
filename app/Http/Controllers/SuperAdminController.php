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

    public function event(){
        return view('super-admin.event');
    }

    public function tambahEvent(){
        return view('super-admin.tambah-event');
    }

    public function editEvent($id){
        return view('super-admin.edit-event', ['id' => $id]);
    }

    public function laporan()
    {
        return view('super-admin.laporan');
    }
}
