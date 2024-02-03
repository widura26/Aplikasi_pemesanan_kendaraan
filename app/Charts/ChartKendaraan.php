<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartKendaraan
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $data = \App\Models\Kendaraan::select('nama_kendaraan', \DB::raw('COUNT(*) as jumlah_penggunaan'))
                    ->join('riwayat', 'kendaraan.id', '=', 'riwayat.kendaraan_id')
                    ->groupBy('nama_kendaraan')
                    ->pluck('jumlah_penggunaan')
                    ->toArray();

        return $this->chart->barChart()
        ->setTitle('Riwayat Penggunaan Kendaraan')
        ->addData('Jumlah penggunaan', $data)
        ->setXAxis(\App\Models\Kendaraan::pluck('nama_kendaraan')->toArray());
    }
}
