<?php

namespace App\Livewire\AdminLapangan;

use App\Models\Lapangan as ModelsLapangan;
use Livewire\Component;

class Lapangan extends Component
{
    public $dataLapangan = [];

    public function mount()
    {
        $this->dataLapangan = ModelsLapangan::query()->get();
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
