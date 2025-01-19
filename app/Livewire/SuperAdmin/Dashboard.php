<?php

namespace App\Livewire\SuperAdmin;

use App\Models\Event;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{

    public $penyewa;
    public $event;
    public $lapanganFutsal;

    public function mount()
    {
        $this->penyewa = User::where('level', 'penyewa')->count();
        $this->lapanganFutsal = User::where('level', 'admin lapangan')->count();
        $this->event = Event::count();
    }

    public function render()
    {
        return view('livewire.super-admin.dashboard');
    }
}
