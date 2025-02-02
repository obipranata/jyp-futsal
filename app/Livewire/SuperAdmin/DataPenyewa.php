<?php

namespace App\Livewire\SuperAdmin;

use App\Models\Penyewaan;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DataPenyewa extends Component
{
    public $penyewaan;
    public $user;
    public $cari;
    public $ratings;

    public function render()
    {
        $this->penyewaan = Penyewaan::with(['lapangan', 'user'])
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
        ->get();

        return view('livewire.super-admin.data-penyewa');
    }
}
