<?php

namespace App\Livewire;

use App\Models\Penyewaan;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;

class Booking extends Component
{

    public $bookingTimes = [];
    public $times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
    public $booked = ['08:00', '10:00', '11:00'];
    public $user;
    public $penyewa;
    public $lapangan;
    public $lapanganId = null;
    public $harga = null;
    public $totalHarga = null;
    public $tanggalMain;
    public $detailPenyewaan = [];
    public string $namaLapangan = '';
    public string $tanggalLengkap = '';
    public string $kategoriPembayaran = 'full';
    public int $totalBayar = 0;
    public string $virtualAccount = 'MANDIRI';

    public bool $isSubmitBooking = false;

    public function mount($id): void
    {
        $this->user = User::with('lapangans')->find($id);
        $this->lapangan = $this->user->lapangans;
        $this->penyewa = Auth::user();
    }

    public function selectedTime($data): void
    {
        if (in_array($data, $this->bookingTimes)) {
            $this->bookingTimes = array_filter($this->bookingTimes, function($time) use ($data) {
                return $time !== $data;
            });
            $this->bookingTimes = array_values($this->bookingTimes);
        } else {
            array_push($this->bookingTimes, $data);
        }
        $this->totalHarga = $this->harga * count($this->bookingTimes);
    }

    #[On('selected-date')] 
    public function updateSelectedDate($tanggal, $tanggalLengkap)
    {
        $this->tanggalMain = Carbon::parse($tanggal)->format('Y-m-d');
        $this->tanggalLengkap = $tanggalLengkap;
    }

    public function selectedLapangan($id, $harga, $namaLapangan): void
    {
        $this->lapanganId = $id;
        $this->harga = $harga;
        $this->totalHarga = $this->harga * count($this->bookingTimes);
        $this->namaLapangan = $namaLapangan;
    }

    public function submitBooking(): void
    {
        $this->isSubmitBooking = true;
        $this->totalBayar = $this->totalHarga;
    }

    public function updatedKategoriPembayaran($data): void
    {
        if ($data === 'dp') {
            $this->totalBayar = 50000;
        } else {
            $this->totalBayar = $this->totalHarga;
        }
    }

    public function createVirtualAccount()
    {
        try{
            $expirationDate = now()->addMinutes(30)->toIso8601String();
            $response = Http::withBasicAuth(env('XENDIT_SECRET_KEY'), '')
            ->post('https://api.xendit.co/callback_virtual_accounts', [
                'external_id' => (string)time(),
                'bank_code' => $this->virtualAccount,
                'name' => $this->penyewa->nama,
                "expected_amount" => $this->totalBayar,
                "is_closed" => true,
                'expiration_date' => $expirationDate,
            ]);
            $data = $response->json();

            if (isset($data['id']))
            {
                foreach($this->bookingTimes as $time){
                    Penyewaan::create([
                        'user_id' => $this->penyewa->id,
                        'pembayaran_id' => $data['id'],
                        'lapangan_id' => $this->lapanganId,
                        'waktu_main' => $time,
                        'tanggal_main' => $this->tanggalMain,
                        'metode_pembayaran' => $this->virtualAccount. ' Virtual Account',
                        'no_pembayaran' => $data['external_id'],
                        'status' => $data['status'],
                        'tipe_pembayaran' => $this->kategoriPembayaran,
                        'harga_bayar' => $this->totalBayar,
                        'harga_full' => $this->totalHarga
                    ]);
                }
            }

            redirect()->route('konfirmasi-pembayaran', $data['external_id']);
        } catch (\Exception $e) {
            dd([
                'message' => 'Failed to create virtual account.',
                'error'   => $e->getMessage(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.booking');
    }
}
