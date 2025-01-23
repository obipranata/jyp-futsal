<div class="space-y-8">
    <div class="h-[44px] w-full bg-[#FFB800] text-lg font-semibold flex items-center justify-center gap-2.5 rounded-lg">
        <span class="text-black">Lakukan Pembayaran Sebelum</span>
        <span class="text-[#FF2929]">{{ \Illuminate\Support\Carbon::parse($penyewaan->created_at)->addMinutes(30)->format('F j, Y g:i A')}}</span>
    </div>
    <div class="pb-5 border-b-2 border-[#D9D9D9]">
        <h1 class="capitalize text-[32px] text-[#464646] font-medium">Konfirmasi Pembayaran</h1>
    </div>
    <div class="mx-auto lg:max-w-[700px] space-y-4">
        <div class="space-y-5 border border-[#D9D9D9] rounded-md">
            <div class="border border-[#D9D9D9] py-4 rounded-t-md text-center">
                <h1 class="capitalize text-2xl text-[#464646] font-medium px-4">{{$penyewaan->lapangan->user->nama}}</h1>
            </div>
            <div class="flex justify-between border-b border-[#D9D9D9] p-4 items-center">
                <div class="space-y-2">
                    <h1 class="text-sm text-black-mana capitalize">Metode Pembayaran</h1>
                    <h1 class=" text-[#464646] uppercase">{{$penyewaan->metode_pembayaran   }}</h1>
                </div>
                <div class="">
                    <img
                        src="{{ $this->bankVa($penyewaan->metode_pembayaran) }}"
                        alt=""
                        class="w-16 object-center object-fill"
                    >
                </div>
            </div>
            <div class="flex justify-between border-b border-[#D9D9D9] p-4 items-center" x-data="{ textToCopy: @js($penyewaan->no_pembayaran) }">
                <div class="space-y-2">
                    <h1 class="text-sm text-black-mana capitalize">Nomor Virtual Account</h1>
                    <h1 class="text-[#464646] uppercase">{{$penyewaan->no_pembayaran}}</h1>
                </div>
                <div 
                    x-on:click="navigator.clipboard.writeText(textToCopy)"
                    class="border border-north-star-blue px-4 py-2.5 rounded-md text-north-star-blue hover:bg-olympian-blue hover:text-white cursor-pointer transition duration-100 ease-in"
                >
                    Salin Nomor VA
                </div>
            </div>
            <div class="flex justify-between border-b border-[#D9D9D9] rounded-b-md p-4 items-center">
                <div class="space-y-2">
                    <h1 class="text-sm text-[#464646] capitalize">Total Pembayaran</h1>
                </div>
                <div class="text-xl text-orange-800 font-bold">
                    Rp {{number_format($totalBayar)}}
                </div>
            </div>
        </div>
        {{-- Lakukan Pembayaran --}}
        <div class="">
            <a
                href="{{route('beranda')}}"
                class="w-full bg-north-star-blue text-white text-xl font-semibold rounded-lg py-2 hover:bg-olympian-blue block text-center"
            >
                Kembali Ke Halaman Utama
            </a>
        </div>
    </div>
</div>
