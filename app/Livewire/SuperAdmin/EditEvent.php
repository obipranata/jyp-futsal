<?php

namespace App\Livewire\SuperAdmin;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditEvent extends Component
{

    use WithFileUploads;
    public string $namaEvent = '';
    public $poster;
    public $tanggal;
    public $lokasi;
    public $htm;
    public $event;

    public function mount($id)
    {
        $this->event = Event::find($id);
        $this->namaEvent = $this->event->nama_event;
        $this->htm = $this->event->htm;
        $this->lokasi = $this->event->lokasi;
        $this->tanggal = $this->event->tanggal;
    }

    public function simpan()
    {
        if ($this->poster) {
            $this->event->update([
                'poster' => $this->poster->store('uploads', 'public'),
                'nama_event' => $this->namaEvent,
                'lokasi' => $this->lokasi,
                'tanggal' => $this->tanggal,
                'htm' => $this->htm
            ]);
        } else {
            $this->event->update([
                'nama_event' => $this->namaEvent,
                'lokasi' => $this->lokasi,
                'tanggal' => $this->tanggal,
                'htm' => $this->htm
            ]);
        }

        redirect()->route('super-admin.event');
    }

    public function render()
    {
        return view('livewire.super-admin.edit-event');
    }
}
