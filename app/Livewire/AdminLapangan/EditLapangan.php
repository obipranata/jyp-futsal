<?php

namespace App\Livewire\AdminLapangan;

use App\Models\Lapangan;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditLapangan extends Component
{
    use WithFileUploads;
    public $lapangan;
    public string $namaLapangan = '';
    public $foto;
    public $harga;

    public function mount($id)
    {
        $this->lapangan = Lapangan::find($id);
        $this->namaLapangan = $this->lapangan->nama_lapangan;
        $this->harga = $this->lapangan->harga;
    }

    public function simpan()
    {
        if ($this->foto) {
            $this->lapangan->update([
                'foto' => $this->foto->store('uploads', 'public'),
                'nama_lapangan' => $this->namaLapangan,
                'harga' => $this->harga
            ]);
        } else {
            $this->lapangan->update([
                'nama_lapangan' => $this->namaLapangan,
                'harga' => $this->harga
            ]);
        }

        redirect()->route('admin-lapangan.lapangan');
    }

    public function render()
    {
        return view('livewire.admin-lapangan.edit-lapangan');
    }
}
