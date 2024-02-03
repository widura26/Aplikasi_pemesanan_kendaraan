<?php

namespace App\Exports;

use App\Models\Pemesanan;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportLaporan implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $pemesanan = Pemesanan::all();
        return view('sewa.export', [
            'sewa' => $pemesanan
        ]);
    }
}
