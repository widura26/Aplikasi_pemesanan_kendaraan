
<nav class="bg-white p-4 sticky top-0 w-full border-b-2">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 md:flex justify-between">
        <div class="logo"><a href='/' class="text-xl text-blue-400 font-bold">Badan Pengelolaan Kendaraan</a></div>
        <div class="text-blue-400">
            <ul class="md:flex md:gap-5 items-center">

                @if (auth()->check())
                    <p>{{ auth()->user()->username }}</p>
                    <a href="{{ route('adminDashboard') }}">Beranda</a>
                    <a href="{{ route('daftarPesanan') }}">Daftar Penyewaan</a>
                    @if(auth()->user()->hasRole('admin'))
                        {{-- <a href="{{ route('listUsers') }}">User</a> --}}
                        <a href="{{ route('daftarKendaraan') }}">Kendaraan</a>
                    @endif
                    <a href="{{ route('logout') }}">Logout</a>
                @endif
            </ul>

        </div>
    </div>
</nav>
