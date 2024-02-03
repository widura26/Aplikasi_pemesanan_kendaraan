@extends('layout.layout')

@section('body')
    @include('component.navbar')

    <div style="height: calc(100vh - 65px)">
        <div class="flex h-full">
            <div class="p-8 bg-gray-100">
                <div class="mb-5 gap-5">
                    <ul class="flex flex-col gap-5">
                        <li class="p-2 hover:bg-slate-300 rounded-lg"><a href="#dashboard">Dashboard</a></li>
                        <li class="p-2 hover:bg-slate-300 rounded-lg"><a href="#daftarPenyewaan">Daftar Penyewaan</a></li>
                        <li class="p-2 hover:bg-slate-300 rounded-lg"><a href="">Kendaraan</a></li>
                        <li class="p-2 hover:bg-slate-300 rounded-lg"><a href="">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="p-10 overflow-y-scroll flex-1 flex flex-col gap-16" style="scroll-behavior: smooth;">
                <div class="box" id="dashboard">
                    <div class="card flex gap-5 py-5">
                        <div class="card p-5 bg-slate-200 rounded-lg flex-1">
                            <p class="text-center font-bold">{{ $kendaraan->count() }} Kendaraan</p>
                        </div>
                        <div class="card p-5 bg-slate-200 rounded-lg flex-1">
                            <p class="text-center font-bold">
                                {{ $users->count() }} User
                            </p>
                        </div>
                    </div>
                    <div class="container">
                        {!! $chart->container() !!}
                    </div>
                </div>
                <div class="box" id="daftarPenyewaan">
                    <h1 class="text-3xl font-bold mb-10">Daftar Penyewaan</h1>
                    @if (count($sewa) === 0)
                        <div class="block">
                            <h1 class="text-center">Tidak ada data</h1>
                        </div>
                    @else
                        @if (auth()->check())
                            @if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('atasan'))
                                @include('sewa.export', $sewa)
                            @else
                                <p>Tidak ada</p>
                            @endif
                        @endif
                    @endif
                </div>
                <div class="box" id="kendaraan">
                    <h1 class="text-3xl font-bold mb-10">Daftar Kendaraan</h1>
                    <table class="rounded-3xl w-full">
                        <thead class="border-b border-slate-300">
                            <tr>
                                <th class=" p-2">Nama Kendaraan</th>
                                <th class=" p-2">Jenis Kendaraan</th>
                                <th class=" p-2">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody id="bookList">
                                @foreach ($kendaraan as $kendaraan => $data)
                                    @php
                                        $model = \App\Models\Pemesanan::where('kendaraan_id', $data->id)->first();
                                    @endphp
                                    <tr class="border-collapse border-b-1 text-center">
                                        <td class="p-3 max-w-xs overflow-hidden overflow-ellipsis whitespace-nowrap">{{ $data->nama_kendaraan }}</td>
                                        <td class="p-3">{{ $data->jenis}}</td>
                                        <td class="p-3">
                                            @if ($model)
                                                @if($model->status === 0)
                                                    Belum disetujui
                                                @else
                                                    Disewa
                                                @endif
                                            @else
                                                tersedia
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    <script src="{{ asset('assets/js/script.js') }}"></script>
@endsection
