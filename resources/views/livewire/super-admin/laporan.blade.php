<div class="w-full h-screen overflow-x-hidden flex flex-col">
    <div class="w-full flex-grow p-6">
        <div class="w-full mt-6">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i>Laporan
            </p>
            <div class="flex gap-4">
                <input type="text" wire:model.live="cari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5" placeholder="cari disini..." />
                <a href="{{route('laporan-pdf')}}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center" target="_blank">Cetak Laporan</a>
            </div>
            <div class="bg-white overflow-auto mt-6">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Foto</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No Hp</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Kota</td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Kecamatan</td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($dataTempatPenyewaan as $item)
                            <tr>
                                <td class="flex justify-center items-center text-center py-3 px-4">
                                    @if (isset($item->foto))
                                        <img src="{{Storage::url($item->foto)}}" class="w-[80px]">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-left py-3 px-4">{{$item->nama}}</td>
                                <td class="text-left py-3 px-4">{{$item->email}}</td>
                                <td class="text-left py-3 px-4">{{$item->no_hp}}</td>
                                <td class="text-left py-3 px-4">{{$item->kota}}</td>
                                <td class="text-left py-3 px-4">{{$item->kecamatan}}</td>
                                <td class="text-left py-3 px-4">
                                    @php
                                        $pendapatan = $item->lapangans->sum(function ($lapangan) {
                                            return $lapangan->penyewaan->where('status', 'PAID')->sum('harga_bayar');
                                         });
                                    @endphp
                                    Rp. {{number_format($pendapatan)}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>