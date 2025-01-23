<?php

namespace App\Livewire\Booking;

use App\Enums\BankVirtualAccounts;
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

    public function bankVA($va): string
    {
        return match ($va) {
            BankVirtualAccounts::MANDIRI->value => asset('assets/bank/mandiri.png'),
            BankVirtualAccounts::BCA->value => asset('assets/bank/bca.png'),
            BankVirtualAccounts::BRI->value => asset('assets/bank/bri.png'),
            BankVirtualAccounts::BNI->value => asset('assets/bank/bni.png'),
        };
    }

    public function render()
    {
        return view('livewire.booking.konfirmasi-pembayaran');
    }
}
