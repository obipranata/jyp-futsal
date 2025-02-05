<?php

namespace App\Livewire\AdminLapangan;

use App\Models\Penyewaan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Laporan extends Component
{
    public $penyewaan;
    public $user;
    public $cari;
    public $start = null;
    public $end = null;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function filter(): void
    {
       $this->queryLaporan();
    }

    public function queryLaporan(): void
    {
        $this->penyewaan = Penyewaan::with(['lapangan', 'user'])
        ->when(($this->start && $this->end), function ($query) {
            $query->whereBetween('tanggal_main', [$this->start, $this->end]);
        })
        ->when($this->cari, function ($query) {
            $query->whereHas('user', function ($query) {
                $query->where('nama', 'like', '%' . $this->cari . '%');
            })
            ->orWhere('status', 'like', '%' . $this->cari . '%')
            ->orWhere('tanggal_main', 'like', '%' . $this->cari . '%')
            ->orWhere('waktu_main', 'like', '%' . $this->cari . '%')
            ->orWhere('metode_pembayaran', 'like', '%' . $this->cari . '%')
            ->orWhere('no_pembayaran', 'like', '%' . $this->cari . '%')
            ->orWhere('harga_full', 'like', '%' . $this->cari . '%')
            ->orWhere('harga_bayar', 'like', '%' . $this->cari . '%')
            ;
        })
        ->whereHas('lapangan', function ($query) {
            $query->where('user_id', $this->user->id);
        })
        ->get();
    }
    
    public function render()
    {
        $this->queryLaporan();
        return view('livewire.admin-lapangan.laporan');
    }
}
