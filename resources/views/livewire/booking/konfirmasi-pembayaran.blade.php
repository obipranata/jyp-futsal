<div class="space-y-8">
    <x-marquee-text
        marqueeClass="p-2 rounded bg-orange"
        classTextInfo="text-lg text-white font-semibold"
        classDate="text-sm text-orange-800 font-medium"
        textInfo="lakukan pembayaran sebelum"
        dateInfo="Rabu, 14 Januari 2025, 08.00"
    />
    <div class="pb-5 border-b-2 border-[#D9D9D9]">
        <h1 class="capitalize text-[32px] text-[#464646] font-medium">Konfirmasi Pembayaran</h1>
    </div>
    <div class="mx-auto lg:max-w-[700px] space-y-4">
        <div class="space-y-5 border border-[#D9D9D9] rounded-md">
            <div class="border border-[#D9D9D9] py-4 rounded-t-md text-center">
                <h1 class="capitalize text-2xl text-[#464646] font-medium px-4">mutiara hitam</h1>
            </div>
            <div class="flex justify-between border-b border-[#D9D9D9] p-4 items-center">
                <div class="space-y-2">
                    <h1 class="text-sm text-black-mana capitalize">Metode Pembayaran</h1>
                    <h1 class=" text-[#464646] uppercase">bank bri</h1>
                </div>
                <div class="">
                    <img
                        src="{{ asset('assets/bri-logo.png') }}"
                        alt=""
                        class="w-16 object-center object-fill"
                    >
                </div>
            </div>
            <div class="flex justify-between border-b border-[#D9D9D9] p-4 items-center">
                <div class="space-y-2">
                    <h1 class="text-sm text-black-mana capitalize">Nomor Virtual Account</h1>
                    <h1 class="text-[#464646] uppercase">99998277883728</h1>
                </div>
                <div class="border border-north-star-blue px-4 py-2.5 rounded-md text-north-star-blue hover:bg-olympian-blue hover:text-white cursor-pointer transition duration-700 ease-in">
                    Salin Nomor VA
                </div>
            </div>
            <div class="flex justify-between border-b border-[#D9D9D9] rounded-b-md p-4 items-center">
                <div class="space-y-2">
                    <h1 class="text-sm text-[#464646] capitalize">Total Pembayaran</h1>
                </div>
                <div class="text-xl text-orange-800 font-bold">
                    Rp 250.000
                </div>
            </div>
        </div>
        {{-- Lakukan Pembayaran --}}
        <div class="">
            <button
                type="button"
                wire:click="redirectBeranda"
                class="w-full bg-north-star-blue text-white text-xl font-semibold rounded-lg py-4 hover:bg-olympian-blue"
            >
                Kembali Ke Halaman Utama
            </button>
        </div>
    </div>
</div>
