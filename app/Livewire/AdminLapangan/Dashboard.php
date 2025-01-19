<?php

namespace App\Livewire\AdminLapangan;

use App\Models\Penyewaan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $penyewa;
    public $totalTransaksi;
    public $pendapatan;
    public $penyewaan;

    public function mount()
    {
        $user = Auth::user();
        $this->penyewa = Penyewaan::whereHas('lapangan', function($query) use ($user){
                $query->where('user_id', $user->id);
            })
            ->groupBy('user_id')
            ->get()
            ;
        $this->totalTransaksi = Penyewaan::whereHas('lapangan', function($query) use ($user){
                $query->where('user_id', $user->id);
            })
            ->count();
        $this->pendapatan  = Penyewaan::whereHas('lapangan', function($query) use ($user){
                $query->where('user_id', $user->id);
            })
            ->where('status', 'PAID')
            ->sum('harga_bayar');

        $this->penyewaan = Penyewaan::with(['lapangan', 'user'])
        ->whereHas('lapangan', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->where('created_at',  now())
        ->get();
    }

    public function render()
    {
        return view('livewire.admin-lapangan.dashboard');
    }
}
