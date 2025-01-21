<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RolesAndPermissionsSeeder::class);

        $superAdmin = User::create([
            'nama' => 'Super Admin',
            'email' => 'admin@jypfutsal.com',
            'password' => Hash::make('123'),
            'level' => 'super admin',
        ]);

        $superAdmin->assignRole('super-admin');

        $adminLapangan = User::create([
            'nama' => 'Mutiara Hitam',
            'email' => 'mutiara-hitam@gmail.com',
            'password' => Hash::make('123'),
            'no_hp' => '081234567890',
            'level' => 'admin lapangan',
            'alamat' => 'Jl. Polimak 1',
            'kecamatan' => 'Jayapura Selatan',
            'kota' => 'Jayapura',
            'map' =>'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.6800048951104!2d140.6653504258971!3d-2.6098191385069938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686cf59b3c9f8223%3A0x8b33cb7f82e05eab!2sMega%20Futsal!5e0!3m2!1sen!2sid!4v1737458134786!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'email_verified_at' => now()
        ]);

        $adminLapangan->assignRole('admin-lapangan');

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
