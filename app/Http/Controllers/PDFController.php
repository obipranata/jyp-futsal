<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $start = $request->start ?? null;
        $end = $request->end ?? null;
        $users = User::query()
            ->where('level', 'admin lapangan')->get();
              
        $pdf = PDF::loadView('pdf-laporan', ['data' => $users, 'start' => $start, 'end' => $end]);
        return $pdf->setPaper('a3', 'landscape')->stream('pdf-laporan');
    }
}
