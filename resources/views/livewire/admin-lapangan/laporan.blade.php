<div class="w-full h-screen overflow-x-hidden flex flex-col">
    <div class="w-full flex-grow p-6">
        <div class="w-full mt-6">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i>Laporan Penyewaan
            </p>
            <div class="flex gap-4">
                <input type="text" wire:model.live="cari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5" placeholder="cari disini..." />
                <div class="relative" x-data="{isOpenFilter: false}">
                    <button @click="isOpenFilter= !isOpenFilter" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Filter
                    </button>
                    <form wire:submit="filter">
                        <div x-cloak x-show="isOpenFilter" @click.outside="isOpenFilter = false" class="bg-white absolute top-12 p-6 rounded-lg shadow-md space-y-4">
                            <h2>Pilih Tanggal Main</h2>
                            <div>
                                <label for="datepicker-range-start" class="text-gray-700">Dari</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                         <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input id="datepicker-range-start" wire:model="start" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                                </div>
                            </div>
                            <div>
                                <label for="datepicker-range-end" class="text-gray-700">Sampai</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                         <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input id="datepicker-range-end" wire:model="end" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                                </div>
                            </div>
                            <button @click="isOpenFilter=false" type="submit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl font-medium rounded-lg text-sm py-2 text-center w-full">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>

                <a href="{{route('laporan-pdf', ['start' => $start, 'end' => $end])}}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center" target="_blank">Cetak Laporan</a>
            </div>
            <div class="bg-white overflow-auto mt-6">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Lapangan</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Tanggal Main</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Waktu Main</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Metode Pembayaran</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No Pembayaran</td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Kategori Bayar</td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Harga Full</td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Harga Bayar</td>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($penyewaan as $item)
                            <tr>
                                <td class="text-left py-3 px-4">{{$item->user?->nama ?? ''}}</td>
                                <td class="text-left py-3 px-4">{{$item->lapangan?->nama_lapangan ?? ''}}</td>
                                <td class="text-left py-3 px-4">{{$item->tanggal_main ?? ''}}</td>
                                <td class="text-left py-3 px-4">{{$item->waktu_main ?? ''}}</td>
                                <td class="text-left py-3 px-4">{{$item->metode_pembayaran ?? ''}}</td>
                                <td class="text-left py-3 px-4">{{$item->no_pembayaran ?? ''}}</td>
                                <td class="text-left py-3 px-4">{{$item->status ?? ''}}</td>
                                <td class="text-left py-3 px-4 uppercase">{{$item->tipe_pembayaran ?? ''}}</td>
                                <td class="text-left py-3 px-4">{{$item->harga_full ?? ''}}</td>
                                <td class="text-left py-3 px-4">{{$item->harga_bayar ?? ''}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>