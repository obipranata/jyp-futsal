<?php

namespace App\Livewire\SuperAdmin;

use App\Models\Event as ModelsEvent;
use Livewire\Component;

class Event extends Component
{
    public $dataEvent = [];

    public function mount()
    {
        $this->dataEvent = ModelsEvent::query()->get();
    }

    public function hapus($id)
    {
        ModelsEvent::find($id)->delete();
        redirect()->route('super-admin.event');
    }

    public function render()
    {
        return view('livewire.super-admin.event');
    }
}
