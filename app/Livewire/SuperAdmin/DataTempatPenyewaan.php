<?php

namespace App\Livewire\SuperAdmin;

use App\Models\User;
use Livewire\Component;

class DataTempatPenyewaan extends Component
{
    public $dataTempatPenyewaan;
    public function mount()
    {
        $this->dataTempatPenyewaan = User::query()->where('level', 'admin lapangan')->get();
    }

    public function verifikasi($id)
    {
        $user = User::query()->find($id);
        $user->update(['email_verified_at' => now()]);
        redirect()->route('super-admin.data-tempat-penyewaan');
    }

    public function render()
    {
        return view('livewire.super-admin.data-tempat-penyewaan');
    }
}
