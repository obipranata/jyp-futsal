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
            'email_verified_at' => now()
        ]);

        $adminLapangan->assignRole('admin-lapangan');

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
