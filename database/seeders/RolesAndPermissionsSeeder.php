<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create permissions
        // Permission::create(['name' => 'edit']);
        // Permission::create(['name' => 'delete']);
    
        // Create roles
        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleAdminLapangan = Role::create(['name' => 'admin-lapangan']);
        $rolePenyewa = Role::create(['name' => 'penyewa']);
    
        // Assign permissions to roles
        // $roleAdmin->givePermissionTo('edit');
        // $roleAdmin->givePermissionTo('delete');
    
        // $roleEditor->givePermissionTo('edit');
    }
}
