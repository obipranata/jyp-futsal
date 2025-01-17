<?php

namespace App\Livewire\AdminLapangan;

use App\Models\Lapangan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahLapangan extends Component
{
    use WithFileUploads;
    public string $namaLapangan = '';
    public $foto;
    public $harga;

    public function simpan()
    {
        $this->validate([
            'foto' => 'required|file|max:2048', // Max 2MB
        ]);

        Lapangan::create([
            'user_id' => Auth::user()->id,
            'nama_lapangan' => $this->namaLapangan,
            'harga' => $this->harga,
            'foto' => $this->foto->store('uploads', 'public')
        ]);

        redirect()->route('admin-lapangan.lapangan');
    }

    public function render()
    {
        return view('livewire.admin-lapangan.tambah-lapangan');
    }
}
