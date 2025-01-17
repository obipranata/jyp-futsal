<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class RegisterCustomer extends Component
{
    public $nama;
    public $email;
    public $noHp;
    public $alamat;
    public $kecamatan;  
    public $kota;
    public $password;
    public $passwordConfirmation;

    protected function rules()
    {
        return [
            'nama' => ['required'],
            'noHp' => ['required'],
            'alamat' => ['required'],
            'kecamatan' => ['required'],
            'kota' => ['required'],
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
        ]);

        $user->assignRole('penyewa');

        $this->reset();

        return redirect()->route('login')->with('success', 'Akun berhasil  didaftarkan');
    }

    public function render()
    {
        return view('livewire.register-customer');
    }
}
