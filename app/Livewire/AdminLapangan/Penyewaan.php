<?php

namespace App\Livewire\AdminLapangan;

use App\Models\Penyewaan as ModelsPenyewaan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Penyewaan extends Component
{
    public $penyewaan;
    public $user;
    public $cari;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        $this->penyewaan = ModelsPenyewaan::with(['lapangan', 'user'])
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
        return view('livewire.admin-lapangan.penyewaan');
    }
}
