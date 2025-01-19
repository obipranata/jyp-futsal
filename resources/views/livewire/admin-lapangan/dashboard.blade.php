<div>
    <div class="w-full flex-grow p-6">
        <h1 class="text-3xl text-black pb-6">Dashboard</h1>
      
        <div class="flex gap-4 items-center">
          <div style="width: 320px;" class="p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex gap-2.5 justify-between">
           <i class="fas fa-tablet-alt mr-3"></i>
            <div class="flex flex-col justify-end">
              <h2 class="text-gray-700">Penyewa</h2>
              <h3 class="ml-auto text-gray-700 font-semibold text-base">{{count($this->penyewa)}}</h3>
            </div>
          </div>
        
          <div style="width: 320px;" class="p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex gap-2.5 justify-between">
           <i class="fas fa-tablet-alt mr-3"></i>
            <div class="flex flex-col justify-end">
              <h2 class="text-gray-700">Total Transaksi</h2>
              <h3 class="ml-auto text-gray-700 font-semibold text-base">{{$totalTransaksi}}</h3>
            </div>
          </div>
      
          <div style="width: 320px;" class="p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex gap-2.5 justify-between">
           <i class="fas fa-tablet-alt mr-3"></i>
            <div class="flex flex-col justify-end">
              <h2 class="text-gray-700">Pendapatan</h2>
              <h3 class="ml-auto text-gray-700 font-semibold text-base">Rp. {{number_format($pendapatan)}}</h3>
            </div>
          </div>
        </div>
    </div>

    <div class="w-full h-screen overflow-x-hidden flex flex-col">
        <div class="w-full flex-grow p-6">
            <div class="w-full mt-6">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i>Jadwal Sewa Hari ini
                </p>
                <div class="bg-white overflow-auto">
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
</div>