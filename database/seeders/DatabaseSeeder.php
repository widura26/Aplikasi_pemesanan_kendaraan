<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // \App\Models\User::factory(10)->create();

            // \App\Models\User::factory(10)->create();
            // $widura = User::create([
            //     'name' => 'admin',
            //     'email' => 'superadmin@gmail.com',
            //     'phone' => '082331072086',
            //     'email_verified_at' => Carbon::now(),
            //     'password' => password_hash('1234', PASSWORD_DEFAULT),
            //     'remember_token' => Str::random(10),
            // ]);

            // $admin = Role::create([
            //     'name' => 'admin',
            //     'guard_name' => 'web'
            // ]);

            // $permission = Permission::create(
            //     ['name' => 'access_admin_dashboard', 'guard_name' => 'web'],
            // );

            // $widura->assignRole('admin');
            // $admin->givePermissionTo($permission);


            $this->call([
                PermissionSeeder::class,
                RoleSeeder::class,
                UserSeeder::class,
                KendaraanSeeder::class
            ]);
    }
}
