<div class="w-full h-screen overflow-x-hidden flex flex-col">
    <div class="w-full flex-grow p-6">
        <div class="w-full mt-6">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i>Daftar Tempat Penyewaan Lapangan Futsal
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Foto</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No Hp</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Kota</td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Kecamatan</td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Surat Izin Bangunan</td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm"></td>
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
                                <td class="py-3 px-4 text-center">
                                    @if (isset($item->surat_izin_bangunan))
                                        <a href="{{asset($item->surat_izin_bangunan)}}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center" target="_blank">Preview</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center py-3 px-4">
                                    @if (isset($item->email_verified_at))
                                        <span class="text-green-800  font-bold">Aktif</span>
                                    @else
                                        <button class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white" wire:click="verifikasi({{$item->id}})">
                                            <span class="relative px-5 py-2 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0 font-bold">
                                                Verifikasi
                                            </span>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>