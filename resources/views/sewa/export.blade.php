<table class="rounded-3xl sm:w-fit md:w-full md:text-lg">
    <thead class="border-b border-slate-300">
        <tr>
            <th class=" p-2">Nama kendaraan</th>
            <th class=" p-2">Driver</th>
            <th class=" p-2">Pihak yang menyetujui</th>
            <th class=" p-2">Tanggal Penyewaan</th>
            <th class=" p-2">Status</th>
            <th class=" p-2">Hapus</th>
        </tr>
    </thead>
    <tbody id="bookList">
            @foreach ($sewa as $kendaraan => $data)
                <tr class="border-collapse border-b-1 text-center">
                    <td class="p-3 max-w-xs overflow-hidden overflow-ellipsis whitespace-nowrap">{{ $data->kendaraan->nama_kendaraan }}</td>
                    <td class="p-3">{{ $data->driver}}</td>
                    <td class="p-3">{{ $data->atasan->username}}</td>
                    <td class="p-3">{{ $data->tanggal_pemesanan }}</td>

                    @if (auth()->check() && auth()->user()->hasRole('atasan'))
                        <td class="p-3">
                            <div x-data="{ open: false }" class="flex justify-center">
                                <!-- Open modal button -->
                                <button x-on:click="open = true" class="text-white py-2 px-4 rounded-lg {{ $data->status === 0 ? 'bg-red-400' : 'bg-blue-500'  }}">{{ $data->status === 0 ? 'Belum disetujui' : 'Disetujui' }}</button>
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
                                        <form action="{{ route('approved', $data->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="space-y12">
                                                <div class="border-b border-gray-900/10 pb-1">
                                                    <div class="p-4 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                                                        <div class="col-span-full">
                                                            <div class="mt-2 flex gap-3 justify-center">
                                                                @if ($data->status == '0')
                                                                    <div class="flex items-center gap-x-3">
                                                                        <input id="aktif" name="status" value='1' type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-black">
                                                                        <label for="aktif" class="block text-sm font-medium leading-6 text-gray-900">Disetujui</label>
                                                                    </div>
                                                                    <div class="flex items-center gap-x-3">
                                                                        <input id="nonaktif" name="status" value='0' type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" checked>
                                                                        <label for="nonaktif" class="block text-sm font-medium leading-6 text-gray-900">Belum disetujui</label>
                                                                    </div>
                                                                @else
                                                                    <div class="flex items-center gap-x-3">
                                                                        <input id="aktif" name="status" value='1' type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-black" checked>
                                                                        <label for="aktif" class="block text-sm font-medium leading-6 text-gray-900">Disetujui</label>
                                                                    </div>
                                                                    <div class="flex items-center gap-x-3">
                                                                        <input id="nonaktif" name="status" value='0' type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                                        <label for="nonaktif" class="block text-sm font-medium leading-6 text-gray-900">Belum disetujui</label>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Footer -->
                                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                                <button type="submit" class="rounded-md bg-blue-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    @else
                        <td class="p-3">
                            <button class="py-2 px-4 rounded-lg text-white {{ $data->status === 0 ? 'bg-red-400' : 'bg-blue-500'  }}" disabled>{{ $data->status === 0 ? 'Belum disetujui' : 'Disetujui' }}</button>
                        </td>
                    @endif
                        <td><span class="material-symbols-outlined cursor-pointer" onclick="window.location.href='{{ route('deletePemesanan', $data->id) }}'">delete</span></td>
                </tr>
            @endforeach
    </tbody>
</table>
