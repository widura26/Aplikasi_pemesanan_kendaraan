<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';
    protected $guarded = ['id'];

    public function pemesanan()
    {
        return $this->hasOne(Pemesanan::class);
    }

    public function riwayat(){
        return $this->hasMany(Riwayat::class);
    }

}
