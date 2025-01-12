<?php

namespace App\Livewire\Booking;

use Livewire\Component;

class KonfirmasiPembayaran extends Component
{
    public function redirectBeranda()
    {
        return redirect()->route('beranda');
    }

    public function render()
    {
        return view('livewire.booking.konfirmasi-pembayaran');
    }
}
