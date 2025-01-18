<?php

namespace App\Livewire\Booking;

use App\Models\Penyewaan;
use Livewire\Component;

class KonfirmasiPembayaran extends Component
{
    public $penyewaan;

    public function mount($virtualAccount)
    {
        $this->penyewaan = Penyewaan::with(['lapangan', 'user'])->where('no_pembayaran', $virtualAccount)->first();
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
