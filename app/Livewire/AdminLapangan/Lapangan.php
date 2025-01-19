<?php

namespace App\Livewire\AdminLapangan;

use App\Models\Lapangan as ModelsLapangan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Lapangan extends Component
{
    public $dataLapangan = [];

    public function mount()
    {
        $user = Auth::user();
        $this->dataLapangan = ModelsLapangan::query()->where('user_id', $user->id)->get();
    }

    public function hapus($id)
    {
        ModelsLapangan::find($id)->delete();
        redirect()->route('admin-lapangan.lapangan');
    }

    public function render()
    {
        return view('livewire.admin-lapangan.lapangan');
    }
}
