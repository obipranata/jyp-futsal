<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $start = $request->start ?? null;
        $end = $request->end ?? null;
        $user = Auth::user();

        $data = User::query()->where('level', 'admin lapangan')->get();
        if ($user->level === 'admin lapangan' ) {
            $data = Penyewaan::with(['lapangan', 'user'])
            ->when(($start && $end), function ($query) use ($start, $end) {
                $query->whereBetween('tanggal_main', [$start, $end]);
            })
            ->whereHas('lapangan', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

            $pdf = PDF::loadView('laporan-admin-lapangan', ['data' => $data, 'start' => $start, 'end' => $end]);
            return $pdf->setPaper('a3', 'landscape')->stream('laporan-admin-lapangan');
        }

              
        $pdf = PDF::loadView('pdf-laporan', ['data' => $data, 'start' => $start, 'end' => $end]);
        return $pdf->setPaper('a3', 'landscape')->stream('pdf-laporan');
    }
}
