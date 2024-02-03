<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
            $user = User::create([
                'username' => 'admin',
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'remember_token' => Str::random(10),
            ]);

            $userId = $user->id;
            Admin::create([
                'user_id' => $userId
            ]);

            $atasan1 = User::create([
                'username' => 'atasan 1',
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'remember_token' => Str::random(10),
            ]);

            $atasan2 = User::create([
                'username' => 'atasan 2',
                'password' => password_hash('1234', PASSWORD_DEFAULT),
                'remember_token' => Str::random(10),
            ]);

            $atasan1->assignRole('atasan');
            $atasan2->assignRole('atasan');
            $user->assignRole('admin');
    }
}
