<?php

namespace App\Livewire\Booking;

use Livewire\Component;

class InformasiPembayaran extends Component
{
    public function redirectPembayaran()
    {
        return redirect()->route('konfirmasi-pembayaran');
    }

    public function render()
    {
        return view('livewire.booking.informasi-pembayaran');
    }
}
