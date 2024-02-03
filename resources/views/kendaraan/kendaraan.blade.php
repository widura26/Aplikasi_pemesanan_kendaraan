@extends('layout.layout')

@section('body')
    @include('component.navbar')
    <section class="p-20">
        <div class="w-full mb-8 flex justify-between">
            <h1 class="text-3xl font-bold">Daftar Kendaraan</h1>
        </div>



        <div class="flex flex-col items-center justify-center gap-5">
            @if (count($kendaraan) === 0)
                <div class="block">
                    <h1 class="text-center">Tidak ada data</h1>
                </div>
            @else
                <table class="rounded-3xl w-full">
                    <thead class="border-b border-gray-400">
                        <tr>
                            <th class=" p-2">Nama Kendaraan</th>
                            <th class=" p-2">Jenis Kendaraan</th>
                            <th class=" p-2">Sewa</th>
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
                                        <div x-data="{ open: false }" class="flex justify-center">
                                            <!-- Open modal button -->
                                            <button {{ optional($model)->exists ? 'disabled' : '' }} x-on:click="open = true" class="bg-blue-400 hover:bg-blue-500 text-white py-2 px-4 rounded-lg">Pesan</button>
                                            <!-- Modal Overlay -->
                                            <div x-show="open" class="fixed inset-0 px-2 z-10 overflow-hidden flex items-center justify-center">
                                            <div x-show="open" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                            <!-- Modal Content -->
                                            <div x-show="open" x-transition:enter="transition-transform ease-out duration-300" x-transition:enter-start="transform scale-75" x-transition:enter-end="transform scale-100" x-transition:leave="transition-transform ease-in duration-300" x-transition:leave-start="transform scale-100" x-transition:leave-end="transform scale-75" class="bg-white rounded-md shadow-xl overflow-hidden max-w-md w-full sm:w-96 md:w-1/2 lg:w-2/3 xl:w-1/3 z-50">
                                                <!-- Modal Header -->
                                                <div class="bg-blue-400 text-white px-4 py-2 flex justify-between">
                                                <h2 class="text-lg font-semibold">Status</h2>
                                                <button type="button" x-on:click="open = false" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:text-white" data-modal-toggle="default-modal">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                </button>
                                                </div>
                                                <!-- Modal Body -->
                                                <div class="p-4">
                                                    <form action="{{ route('pesanKendaraan', $data->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="space-y12">
                                                            <div class="border-b border-gray-900/10 pb-1">
                                                                <div class="p-4 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                                                                    <div class="col-span-full">
                                                                        <label for="street-address" class="flex text-sm font-medium leading-6 text-gray-900">Nama Kendaraan</label>
                                                                        <div class="mt-2">
                                                                            <input type="hidden" name="kendaraan_id" value="{{ $data->id }}">
                                                                            <input type="text" value="{{ $data->nama_kendaraan }}"
                                                                            class="w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6" placeholder="Nama Kendaraan" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-span-full">
                                                                        <label for="street-address" class="flex text-sm font-medium leading-6 text-gray-900">Driver</label>
                                                                        <div class="mt-2">
                                                                            <input type="text" id="driver" name="driver"
                                                                            class="w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6" placeholder="Driver" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-span-full">
                                                                        <label for="street-address" class="flex text-sm font-medium leading-6 text-gray-900">Pihak yang menyetujui</label>
                                                                        <div class="mt-2">
                                                                            <select name="atasan_id" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                                                                                @foreach ($atasan as $item => $data)
                                                                                    <option value="{{ $data->id }}">{{ $data->username }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-span-full">
                                                                        <label for="street-address" class="flex text-sm font-medium leading-6 text-gray-900">Tanggal Pemesanan</label>
                                                                        <div class="mt-2">
                                                                            <input type="date" id="tanggal_pemesanan" name="tanggal_pemesanan"
                                                                            class="w-full rounded-md border-0 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6" placeholder="Driver" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Modal Footer -->
                                                        <div class="mt-6 flex items-center justify-end gap-x-6">
                                                            <button type="submit" class="rounded-md bg-blue-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tambah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
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
            @endif
        </div>
    </section>
@endsection
