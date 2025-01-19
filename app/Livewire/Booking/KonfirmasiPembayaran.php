<?php

namespace App\Livewire\Booking;

use App\Models\Penyewaan;
use Livewire\Component;

class KonfirmasiPembayaran extends Component
{
    public $penyewaan;
    public $totalBayar;

    public function mount($virtualAccount)
    {
        $this->penyewaan = Penyewaan::with(['lapangan', 'user'])->where('no_pembayaran', $virtualAccount)->first();
        $this->totalBayar = Penyewaan::with(['lapangan', 'user'])->where('no_pembayaran', $virtualAccount)->sum('harga_bayar');
    }

    public function redirectBeranda()
    {
        return redirect()->route('beranda');
    }

    public function render()
    {
        return view('livewire.booking.konfirmasi-pembayaran');
    }
}
