<?php

namespace App\Livewire;

use App\Models\Penyewaan;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class History extends Component
{
    public $penyewaan;
    public $detailPenyewaan;
    public $menu = 'semua';
    
    public function paymentCancel($va): void
    {   
        $user = Auth::user();
        Penyewaan::where('user_id', $user->id ?? null)->where('no_pembayaran', $va)->update(['status' => 'CANCEL']);
        redirect()->route('history');
    }

    public function navMenu($menu):void
    {
        $this->menu = $menu;
    }

    #[On('kirimRating')] 
    public function kirimRating($rating, $noPembayaran): void
    {   
        Rating::Create([
            'no_pembayaran' => $noPembayaran,
            'rating' => $rating
        ]);
        redirect()->route('history');
    }

    public function render()
    {
        $user = Auth::user();
        if($this->menu === 'semua') {   
            $this->penyewaan = Penyewaan::query()->where('user_id', $user->id ?? null)->groupBy('no_pembayaran')->get();
            $this->detailPenyewaan = Penyewaan::query()->where('user_id', $user->id ?? null)->get();
        } else {
            $this->penyewaan = Penyewaan::query()->where('user_id', $user->id ?? null)->where('status', $this->menu)->groupBy('no_pembayaran')->get();
            $this->detailPenyewaan = Penyewaan::query()->where('user_id', $user->id ?? null)->where('status', $this->menu)->get();
        }
        return view('livewire.history');
    }
}
