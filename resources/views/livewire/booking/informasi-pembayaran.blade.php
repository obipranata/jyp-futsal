<div class="pt-0">
    <div class="pb-5 border-b-2 border-[#D9D9D9]">
        <h1 class="capitalize text-[32px] text-[#464646] font-medium">Informasi Pembayaran</h1>
    </div>

    <div class="py-12 space-y-8">
        <div class="flex gap-5">
            <div class="w-3/5 space-y-4">
                <div class="pl-4 flex justify-between items-center w-full">
                    <h2 class="text-lg text-olympian-blue font-semibold">Total Harga</h2>
                    <h1 class="text-xl text-olympian-blue font-bold">Rp 250.000</h1>
                </div>
                <div class="space-y-4 flex-1">
                    <label for="jumlahBayar" class="text-north-star-blue text-sm pl-4 font-semibold">Jumlah Bayar</label>
                    <input type="text" name="jumlahBayar" id="jumlahBayar" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Rp 50.000" required />
                </div>

                <div class="flex">
                    <div class="flex items-center h-5">
                        <input id="checkbox" type="checkbox" value="" class="w-4 h-4 text-olympian-blue rounded-sm focus:ring-none focus:ring-0">
                    </div>
                    <div class="ms-2 text-sm">
                        <label for="checkbox" class="font-medium text-black-mana">Bayar Sebagai DP</label>
                        <p id="checkbox" class="text-xs font-normal text-black-mana">* minimal DP Rp. 50.000</p>
                    </div>
                </div>

                {{-- Medote Pembayaran --}}
                <div class="space-y-2 flex-1">
                    <label for="metodePembayaran" class="text-north-star-blue text-sm pl-4 font-semibold w-full">Pilih Metode Pembayaran</label>
                    <select
                        class="w-full bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 h-[50px]"
                        name="metodePembayaran"
                        id="distrit">
                        <option value="">-- Pilih Pembayaran --</option>
                        <option value="">Gopay</option>
                        <option value="">BCA</option>
                        <option value="">BRI</option>
                        <option value="">BNI</option>
                    </select>
                </div>

                {{-- Lakukan Pembayaran --}}
                <button
                    type="button"
                    wire:click="redirectPembayaran"
                    class="w-full bg-north-star-blue text-white text-xl font-semibold rounded-lg py-4 hover:bg-olympian-blue"
                >
                    Lakukan Pembayaran
                </button>
            </div>

            {{-- Detail Penyewaan --}}
            <div class="w-2/5 p-8 border-2 border-[#F1F1F1] rounded-lg space-y-4">
                <div class="">
                    <h1 class="capitalize text-xl text-[#464646] font-medium">Detai Penyewaan</h1>
                </div>
                <div class="space-y-2.5">
                    <div class="flex justify-between text-sm capitalize">
                        <h5 class="text-olympian-blue font-bold text-left">Kode Booking</h5>
                        <h5 class="text-olympian-blue font-normal text-right">MH0001</h5>
                    </div>
                    <div class="flex justify-between text-sm capitalize">
                        <h5 class="text-olympian-blue font-bold text-left">Nama</h5>
                        <h5 class="text-olympian-blue font-normal text-right">betoo</h5>
                    </div>
                    <div class="flex justify-between text-sm capitalize">
                        <h5 class="text-olympian-blue font-bold text-left">No. Hp</h5>
                        <h5 class="text-olympian-blue font-normal text-right">08123456789</h5>
                    </div>
                    <div class="flex justify-between text-sm capitalize">
                        <h5 class="text-olympian-blue font-bold text-left">Lapangan</h5>
                        <h5 class="text-olympian-blue font-normal text-right">Lapangan 2</h5>
                    </div>
                    <div class="flex justify-between text-sm capitalize">
                        <h5 class="text-olympian-blue font-bold text-left">Jadwal Sewa</h5>
                        <h5 class="text-olympian-blue font-normal text-right">Rabu, 14 Januari 2025</h5>
                    </div>
                    <div class="flex justify-between text-sm capitalize">
                        <h5 class="text-olympian-blue font-bold text-left">Jam</h5>
                        <h5 class="text-olympian-blue font-normal text-right">10.00</h5>
                    </div>
                    <div class="flex justify-between text-sm capitalize">
                        <h5 class="text-olympian-blue font-bold text-left">Durasi</h5>
                        <h5 class="text-olympian-blue font-normal text-right">1 Jam</h5>
                    </div>
                    <div class="flex justify-between capitalize items-center">
                        <h5 class="text-olympian-blue text-sm font-bold text-left">Total :</h5>
                        <h5 class="text-olympian-blue text-lg font-bold text-right">Rp 250.000</h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- Informasi --}}
        <div class="w-3/5">
            <div class="">
                <h1 class="uppercase text-2xl font-semibold">perhatian</h1>
                <ul class="list-disc px-8 text-md font-light text-black-mana">
                    <li>Batas waktu pembayaran yaitu 1 jam sebelum waktu bermain yang sudah anda booking, apabila melewati batas waktu maka booking dianggap batal.</li>
                    <li>Kami akan segera memproses pembookingan anda setelah mendapatkan konfirmasi pembayaran segera mungking.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
