<?php

namespace App\Livewire\SuperAdmin;

use App\Models\User;
use Livewire\Component;

class Laporan extends Component
{
    public $dataTempatPenyewaan;
    public $cari = '';
    
    public function render()
    {
        $this->dataTempatPenyewaan = User::query()
        ->when($this->cari, function ($query) {
            $query->where(function ($query) {
                $query->where('nama', 'like', '%' . $this->cari . '%')
                    ->orWhere('email', 'like', '%' . $this->cari . '%')
                    ->orWhere('no_hp', 'like', '%' . $this->cari . '%')
                    ->orWhere('alamat', 'like', '%' . $this->cari . '%')
                    ->orWhere('kecamatan', 'like', '%' . $this->cari . '%')
                    ->orWhere('kota', 'like', '%' . $this->cari . '%');
            });
        })
        ->where('level', 'admin lapangan')
        ->get();
        return view('livewire.super-admin.laporan');
    }
}
