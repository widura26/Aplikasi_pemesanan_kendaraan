<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kendaraan;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kendaraan::insert([
            ['nama_kendaraan' => 'Mobil 1', 'jenis' => 'angkutan orang'],
            ['nama_kendaraan' => 'Mobil 2', 'jenis' => 'angkutan barang'],
            ['nama_kendaraan' => 'Mobil 3', 'jenis' => 'angkutan orang'],
            ['nama_kendaraan' => 'Mobil 4', 'jenis' => 'angkutan orang'],
            ['nama_kendaraan' => 'Mobil 5', 'jenis' => 'angkutan barang'],
        ]);
    }
}
