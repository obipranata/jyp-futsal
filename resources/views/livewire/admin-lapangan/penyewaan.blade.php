<div class="w-full h-screen overflow-x-hidden flex flex-col">
    <div class="w-full flex-grow p-6">
        <div class="w-full mt-6">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i>Data Penyewaan
            </p>
            <div class="flex gap-4">
                <input type="text" wire:model.live="cari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5" placeholder="cari disini..." />
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
                                <td class="text-left py-3 px-4">{{$item->user->nama}}</td>
                                <td class="text-left py-3 px-4">{{$item->lapangan->nama_lapangan}}</td>
                                <td class="text-left py-3 px-4">{{$item->tanggal_main}}</td>
                                <td class="text-left py-3 px-4">{{$item->waktu_main}}</td>
                                <td class="text-left py-3 px-4">{{$item->metode_pembayaran}}</td>
                                <td class="text-left py-3 px-4">{{$item->no_pembayaran}}</td>
                                <td class="text-left py-3 px-4">{{$item->status}}</td>
                                <td class="text-left py-3 px-4 uppercase">{{$item->tipe_pembayaran}}</td>
                                <td class="text-left py-3 px-4">{{$item->harga_full}}</td>
                                <td class="text-left py-3 px-4">{{$item->harga_bayar}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>