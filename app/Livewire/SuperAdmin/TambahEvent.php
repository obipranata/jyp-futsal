<?php

namespace App\Livewire\SuperAdmin;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;

class TambahEvent extends Component
{
    use WithFileUploads;
    public string $namaEvent = '';
    public $poster;
    public $tanggal;
    public $lokasi;
    public $htm;

    public function simpan()
    {
        $this->validate([
            'poster' => 'required|file|max:2048', // Max 2MB
        ]);

        Event::create([
            'nama_event' => $this->namaEvent,
            'tanggal' => $this->tanggal,
            'lokasi' => $this->lokasi,
            'htm' => $this->htm,
            'poster' => $this->poster->store('uploads', 'public')
        ]);

        redirect()->route('super-admin.event');
    }
    public function render()
    {
        return view('livewire.super-admin.tambah-event');
    }
}
