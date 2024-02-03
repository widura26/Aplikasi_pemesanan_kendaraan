<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $adminRole->givePermissionTo(Permission::all());

        $atasan = Role::create([
            'name' => 'atasan',
            'guard_name' => 'web'
        ]);

        $vendor = Role::create([
            'name' => 'vendor_kendaraan',
            'guard_name' => 'web'
        ]);


        $atasan->givePermissionTo([
            'approving'
        ]);

        $vendor->givePermissionTo([
            'approving'
        ]);
    }
}
