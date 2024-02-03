<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pemesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pemesanan';

    public function kendaraan() {
        return $this->belongsTo(Kendaraan::class);
    }

    public function atasan(){
        return $this->belongsTo(User::class);
    }
}
