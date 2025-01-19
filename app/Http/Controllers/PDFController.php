<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = User::query()
            ->where('level', 'admin lapangan')->get();
    
        $data = [
            'title' => 'Laporan Data Tempat Penyewaan',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
              
        $pdf = PDF::loadView('pdf-laporan', ['data' => $users]);
        return $pdf->setPaper('a3', 'landscape')->stream('pdf-laporan');
       
        // return $pdf->download('itsolutionstuff.pdf');
    }
}
