<?php

namespace App\Livewire;

use App\Models\Lapangan;
use App\Models\Penyewaan;
use App\Models\Rating;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Beranda extends Component
{
    public $dataLapangan = [];
    public $penyewaan = null;
    public $ratings;
    public $search = '';

    public function mount()
    {
        $user = Auth::user();
        $now = Carbon::now();
        $this->penyewaan = Penyewaan::query()->where(['user_id' => $user->id ?? null, 'status' => 'PAID'])->where('tanggal_main', '>=', $now)->orderBy('tanggal_main')->orderByRaw("STR_TO_DATE(waktu_main, '%H:%i') ASC")->first();

        $this->ratings = Rating::join('penyewaans', 'ratings.no_pembayaran', '=', 'penyewaans.no_pembayaran')
        ->join('lapangans', 'penyewaans.lapangan_id', '=', 'lapangans.id')
        ->select(
            'ratings.no_pembayaran',
            'lapangans.user_id',
            DB::raw('AVG(ratings.rating) as avg_rating')
        )
        ->groupBy('lapangans.user_id')
        ->get();
    }

    public function render()
    {
        $this->dataLapangan = Lapangan::query()
            ->with('user')
            ->when($this->search, function ($query) {
                $query->whereHas('user', function ($query) {
                    $query->where('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('alamat', 'like', '%' . $this->search . '%')
                        ->orWhere('kecamatan', 'like', '%' . $this->search . '%')
                        ->orWhere('kota', 'like', '%' . $this->search . '%');
                })
                ;
            })
            ->whereHas('user', function ($query) {
                $query->whereNotNull('email_verified_at');
            })
            ->groupBy('user_id')->get();
        return view('livewire.beranda');
    }
}
