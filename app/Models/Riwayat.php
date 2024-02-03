<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'riwayat';

    public function kendaraan(){
        return $this->belongsTo(Kendaraan::class);
    }
}
