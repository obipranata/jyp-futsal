<?php

namespace App\Livewire\SuperAdmin;

use App\Models\Rating;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Laporan extends Component
{
    public $dataTempatPenyewaan;
    public $cari = '';
    public $ratings;
    public $start = null;
    public $end = null;

    public function filter(): void
    {
       $this->queryLaporan();
    }

    public function queryLaporan(): void
    {
        $this->dataTempatPenyewaan = User::query()
        ->when($this->cari, function ($query) {
            $query->where(function ($query) {
                $query->where('nama', 'like', '%' . $this->cari . '%')
                    ->orWhere('email', 'like', '%' . $this->cari . '%')
                    ->orWhere('no_hp', 'like', '%' . $this->cari . '%')
                    ->orWhere('alamat', 'like', '%' . $this->cari . '%')
                    ->orWhere('kecamatan', 'like', '%' . $this->cari . '%')
                    ->orWhere('kota', 'like', '%' . $this->cari . '%');
            });
        })
        ->where('level', 'admin lapangan')
        ->get();
    }
    
    public function render()
    {
        $this->queryLaporan();
        $this->ratings = Rating::join('penyewaans', 'ratings.no_pembayaran', '=', 'penyewaans.no_pembayaran')
        ->join('lapangans', 'penyewaans.lapangan_id', '=', 'lapangans.id')
        ->select(
            'ratings.no_pembayaran',
            'lapangans.user_id',
            DB::raw('AVG(ratings.rating) as avg_rating')
        )
        ->groupBy('lapangans.user_id')
        ->get();
        return view('livewire.super-admin.laporan');
    }
}
