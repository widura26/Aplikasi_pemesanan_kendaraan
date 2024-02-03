<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([
            ['name' => 'access_admin_dashboard', 'guard_name' => 'web'],
            ['name' => 'open_books', 'guard_name' => 'web'],
            ['name' => 'read_books', 'guard_name' => 'web'],
            ['name' => 'edit_books', 'guard_name' => 'web'],
            ['name' => 'delete-pemesanan', 'guard_name' => 'web'],
            ['name' => 'list_users', 'guard_name' => 'web'],
            ['name' => 'approving', 'guard_name' => 'web'],
        ]);
        // Permission::create(
        //     ['name' => 'access_admin_dashboard', 'guard_name' => 'web'],
        // );
    }
}
