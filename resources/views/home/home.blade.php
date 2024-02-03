@extends('layout.layout')

@section('body')
    @include('component.navbar')
    <div class="flex px-32 py-24">
        <div class="image flex-1 flex items-center">
            <img src="{{ asset('assets/img/library.jpg') }}" alt="" class="" />
        </div>
        <div class="flex-1 flex items-center">
            <div class="flex flex-col gap-10">
                <h1 class="text-4xl font-bold">Selamat Datang Di Perpustakaan Digital</h1>
                <div class="flex gap-2">
                    <button onclick="window.location.href='{{ route('login') }}'" class="rounded-md bg-blue-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Login</button>
                </div>
            </div>
        </div>
    </div>
@endsection
