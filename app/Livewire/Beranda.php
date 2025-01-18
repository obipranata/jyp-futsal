<?php

namespace App\Livewire;

use App\Models\Lapangan;
use App\Models\Penyewaan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Beranda extends Component
{
    public $dataLapangan = [];
    public $penyewaan = null;

    public function mount()
    {
        $user = Auth::user();
        $this->dataLapangan = Lapangan::query()->with('user')->groupBy('user_id')->get();  
        $this->penyewaan = Penyewaan::query()->where(['user_id' => $user->id, 'status' => 'PAID'])->get();
    }

    public function render()
    {
        return view('livewire.beranda');
    }
}
