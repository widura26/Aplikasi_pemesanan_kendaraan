@extends('layout.layout')

@section('body')
    @include('component.navbar')
    <section class="p-10 md:p-20 w-full">
        <div class="w-full mb-8 flex justify-between">
            <h1 class="md:text-3xl font-bold">Daftar</h1>
        </div>
        <div class="flex mb-5 justify-between">
            @if (auth()->check() && auth()->user()->hasRole('admin'))
                <div class="flex gap-2">
                    <button class="bg-green-400 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ route('exportLaporan') }}'">Export Excel</button>
                </div>
            @endif
        </div>


        <div class="flex flex-col items-center justify-center gap-5">
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
    </section>
@endsection
