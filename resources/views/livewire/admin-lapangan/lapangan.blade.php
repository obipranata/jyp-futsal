<div>
    <div class="w-full h-screen overflow-x-hidden flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="text-3xl text-black pb-6">Data Lapangan</h1>

            <div class="w-full mt-6">
                <div class="flex justify-between">
                    <p class="text-xl pb-3 flex items-center">
                        <i class="fas fa-list mr-3"></i> Table Lapangan
                    </p>
                    <a href="{{route('admin-lapangan.tambah-lapangan')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Tambah Lapangan</a>
                </div>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Nama Lapangan</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Harga</th>
                                <th class="py-3 px-4 uppercase font-semibold text-sm">Foto</th>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">
                                    Aksi
                                </td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($dataLapangan as $item)
                                <tr>
                                    <td class="text-center py-3 px-4">{{$item->nama_lapangan}}</td>
                                    <td class="text-center py-3 px-4">Rp. {{number_format($item->harga)}}</td>
                                    <td class="text-center py-3 px-4">
                                        <img src="{{Storage::url($item->foto)}}" class="max-w-[200px] rounded-lg mx-auto">
                                    </td>
                                    <td class="text-center py-3 px-4">
                                        <div class="flex gap-2 justify-center">
                                            <a href="{{route('admin-lapangan.edit-lapangan', $item->id)}}" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                                Ubah
                                            </a>
                                            <button wire:click="hapus({{$item->id}})" type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
