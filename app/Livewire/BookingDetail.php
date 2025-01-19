<?php

namespace App\Livewire;

use App\Models\Penyewaan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingDetail extends Component
{
    public $penyewaan;

    public function mount(): void
    {
        $user = Auth::user();
        $now = Carbon::now();
        $this->penyewaan = Penyewaan::query()->where('user_id', $user->id)->where('status', 'PAID')->where('tanggal_main', '>=', $now)->get();
    }

    public function render()
    {
        return view('livewire.booking-detail');
    }
}
