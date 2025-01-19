<div>
    <div class="max-w-4xl mx-auto mt-10 space-y-10">
        <h2 class="text-[22px] font-bold text-center">DETAIL PENYEWAAN</h2>
    </div>
    <div class="mt-10">
        <h2 class="text-xl italic text-fiftieth-shade">Rincian Sewa Lapangan</h2>
        <div class="relative overflow-x-auto rounded-lg mt-2.5">
            <table class="w-full text-sm text-left rtl:text-right text-fiftieth-shade">
                <thead class="text-xs text-white bg-north-star-blue">
                    <tr class="text-base font-bold">
                        <th scope="col">
                            No Pembayaran
                        </th>
                        <th>
                            Lokasi
                        </th>
                        <th>
                            Kontak
                        </th>
                        <th scope="col">
                            Jadwal Tanggal Sewa
                        </th>
                        <th scope="col">
                            jam
                        </th>
                        <th scope="col">
                            Lapangan
                        </th>
                        <th scope="col">
                            Ket
                        </th>
                        <th scope="col">
                            Harga Bayar
                        </th>
                        <th scope="col">
                            Harga Sewa
                        </th>
                    </tr>
                </thead>
                <tbody class="text-base font-medium">
                    @foreach ($penyewaan as $item)
                        <tr>
                            <td>
                                {{$item->no_pembayaran}}
                            </td>
                            <td>
                                {{$item->lapangan->user->alamat}}
                            </td>
                            <td>
                                {{$item->lapangan->user->no_hp}}
                            </td>
                            <td>
                                {{ \Illuminate\Support\Carbon::parse($item->tanggal_main)->format('d M Y')}}
                            </td>
                            <td>
                                {{ \Illuminate\Support\Carbon::parse($item->waktu_main)->format('g:i A')}}
                            </td>
                            <td>
                                {{$item->lapangan->nama_lapangan}}
                            </td>
                            <td>
                                @if ($item->tipe_pembayaran == 'full')
                                    Lunas
                                @else
                                    DP
                                @endif
                            </td>
                            <td>
                                Rp. {{number_format($item->harga_bayar)}}
                            </td>
                            <td>
                                Rp. {{number_format($item->harga_full)}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
