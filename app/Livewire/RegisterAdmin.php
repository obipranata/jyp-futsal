<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterAdmin extends Component
{
    use WithFileUploads;
    public $nama;
    public $email;
    public $noHp;
    public $alamat;
    public $kecamatan;  
    public $kota;
    public $password;
    public $passwordConfirmation;
    public $logo;
    public $suratIzinBangunan;

    protected function rules()
    {
        return [
            'nama' => ['required'],
            'noHp' => ['required'],
            'alamat' => ['required'],
            'kecamatan' => ['required'],
            'kota' => ['required'],
            'logo' => ['nullable', 'image', 'max:1024'],
            'suratIzinBangunan' => ['required', 'image', 'max:1024'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ];
    }

    protected function messages()
    {
        return [
            'nama.required' => 'Silahkan masukkan nama anda',
            'noHp.required' => 'Silahkan masukkan nomor hp anda',
            'alamat.required' => 'Silahkan masukkan alamat anda',
            'kecamatan.required' => 'Silahkan masukkan kecamatan anda',
            'kota.required' => 'Silahkan masukkan kota anda',
            'logo.image' => 'File yang anda masukkan bukan gambar',
            'logo.max' => 'Ukuran file maksimal 1MB',
            'suratIzinBangunan.required' => 'Silahkan upload file surat izin bangunan',
            'suratIzinBangunan.image' => 'File yang anda masukkan bukan gambar',
            'suratIzinBangunan.max' => 'Ukuran file maksimal 1MB',
            'email.required' => 'Silahkan masukkan email anda',
            'email.email' => 'Data yang anda masukkan bukan email',
            'email.unique' => 'Email telah digunakan',
            'password.required' => 'Silahkan masukkan password anda',
            'password.min' => 'Password minimal 8 karakter',
            'password.same' => 'Konfirmasi password tidak cocok',
        ];
    }

    public function register()
    {
        $this->validate();
        $user = User::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'no_hp' => $this->noHp,
            'alamat' => $this->alamat,
            'kecamatan' => $this->kecamatan,
            'kota' => $this->kota,
            'level' => 'admin lapangan',
            'foto' => $this->logo ? $this->logo->store('logo', 'public') : null,
            'surat_izin_bangunan' => $this->suratIzinBangunan->store('surat_izin_bangunan', 'public'),
        ]);

        $user->assignRole('admin-lapangan');

        $this->reset();

        return redirect()->route('login')->with('success', 'Akun berhasil  didaftarkan. tunggu verifikasi dari admin');
    }
    public function render()
    {
        return view('livewire.register-admin');
    }
}
