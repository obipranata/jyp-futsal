<div>
    <div class="space-y-7">
        <h1 class="text-[38px] font-bold text-center">Riwayat</h1>
        <div class="w-full bg-[#F1F1F1] flex gap-[44px] rounded-lg px-5 py-4">
            @php
                $active = 'text-white bg-north-star-blue'
            @endphp
            <button class="{{$menu === 'semua' ? $active : 'text-[#858585]'}} font-medium text-xl hover:bg-north-star-blue hover:text-white py-4 px-10 rounded-lg" wire:click="navMenu('semua')">Semua</button>
            <button class="{{$menu === 'PENDING' ? $active : 'text-[#858585]'}} font-medium text-xl hover:bg-north-star-blue hover:text-white py-4 px-10 rounded-lg" wire:click="navMenu('PENDING')">Menunggu Pembayaran</button>
            <button class="{{$menu === 'PAID' ? $active : 'text-[#858585]'}} font-medium text-xl hover:bg-north-star-blue hover:text-white py-4 px-10 rounded-lg" wire:click="navMenu('PAID')">Selesai</button>   
        </div>

        @foreach ($penyewaan as $item)
            <div class="border border-[#D9D9D9] rounded-lg">
                <div class="flex justify-between items-center p-5 border-b border-[#D9D9D9]">
                    <div class="flex gap-3 items-center">
                        <div class="flex gap-2.5 items-center text-fiftieth-shade font-medium text-base">
                            <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 1H3C2.46957 1 1.96086 1.21071 1.58579 1.58579C1.21071 1.96086 1 2.46957 1 3V19C1 19.5304 1.21071 20.0391 1.58579 20.4142C1.96086 20.7893 2.46957 21 3 21H15C15.5304 21 16.0391 20.7893 16.4142 20.4142C16.7893 20.0391 17 19.5304 17 19V7L11 1Z" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M11 1V7H17" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13 12H5" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13 16H5" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7 8H6H5" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>{{$item->no_pembayaran}}</div>
                        </div>
                        <svg width="6" height="6" viewBox="0 0 6 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.23864 5.86364C2.7803 5.86364 2.36174 5.75189 1.98295 5.52841C1.60417 5.30114 1.30114 4.99811 1.07386 4.61932C0.850379 4.24053 0.738636 3.82197 0.738636 3.36364C0.738636 2.90152 0.850379 2.48295 1.07386 2.10795C1.30114 1.72917 1.60417 1.42803 1.98295 1.20455C2.36174 0.977272 2.7803 0.863636 3.23864 0.863636C3.70076 0.863636 4.11932 0.977272 4.49432 1.20455C4.87311 1.42803 5.17424 1.72917 5.39773 2.10795C5.625 2.48295 5.73864 2.90152 5.73864 3.36364C5.73864 3.82197 5.625 4.24053 5.39773 4.61932C5.17424 4.99811 4.87311 5.30114 4.49432 5.52841C4.11932 5.75189 3.70076 5.86364 3.23864 5.86364Z" fill="#515151"/>
                        </svg>
                        <div class="flex gap-2.5 items-center text-fiftieth-shade font-medium text-base">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.8333 3.33325H4.16667C3.24619 3.33325 2.5 4.07944 2.5 4.99992V16.6666C2.5 17.5871 3.24619 18.3333 4.16667 18.3333H15.8333C16.7538 18.3333 17.5 17.5871 17.5 16.6666V4.99992C17.5 4.07944 16.7538 3.33325 15.8333 3.33325Z" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13.3333 1.66675V5.00008" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.66675 1.66675V5.00008" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2.5 8.33325H17.5" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>{{ \Illuminate\Support\Carbon::parse($item->created_at)->format('d M Y')}}</div>
                        </div>
                    </div>
                    @if ($item->status === 'PAID')
                        <div class="text-sm bg-[#D8E8F8] text-[#4F91DD] py-[6px] px-6 rounded-[5px]">
                            Selesai
                        </div>
                    @else
                        <div class="text-sm bg-[#F3D6D5] text-[#C6312D] py-[6px] px-6 rounded-[5px]">
                            @if ($item->status === 'PENDING')
                                Menunggu Pembayaran
                            @elseif($item->status === 'EXPIRED')
                                Kadaluarsa
                            @elseif($item->status === 'CANCEL')
                                Batal
                            @endif
                        </div>
                    @endif
                </div>
                <div class="px-5 py-7 flex justify-between border-b border-[#D9D9D9]">
                    <div class="flex items-center gap-6">
                        <img src="{{Storage::url($item->lapangan->foto)}}" class="object-cover w-[219px] h-[130px] rounded-lg" alt="">
                        <div>
                            <h2 class="text-2xl font-semibold">{{$item->lapangan?->user?->nama ?? ''}}</h2>
                            <div class="mt-2.5 text-fiftieth-shade text-base">{{$item->lapangan?->nama_lapangan ?? ''}}</div>
                            <div class="text-fiftieth-shade text-base">{{ \Illuminate\Support\Carbon::parse($item->tanggal_main)->format('d M Y')}}</div>
                            <div class="text-fiftieth-shade text-base">
                                @foreach ($detailPenyewaan as $key => $detail)
                                    @if ($detail->no_pembayaran === $item->no_pembayaran)
                                        {{$detail->waktu_main}} 
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-fiftieth-shade font-semibold text-lg">Rp {{number_format($item->harga_full)}}</div>
                </div>
                <div class="px-5 py-7 flex justify-between {{$item->status !== 'EXPIRED' && $item->status !== 'CANCEL' && !$item->rating ? ' border-b border-[#D9D9D9]' : ''}}">
                    <div class="text-fiftieth-shade text-base font-medium">Total Pembayaran</div>
                    <div class="text-fiftieth-shade font-semibold text-lg">Rp {{number_format($item->harga_bayar)}}</div>
                </div>
                @if ($item->status === 'PENDING')
                    <div class="px-5 py-7 flex items-center justify-between">
                        <div class="space-y-2">
                            <div class="flex gap-2.5 items-center text-fiftieth-shade font-medium text-base">
                                <svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 1H3C1.89543 1 1 1.89543 1 3V15C1 16.1046 1.89543 17 3 17H21C22.1046 17 23 16.1046 23 15V3C23 1.89543 22.1046 1 21 1Z" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 7H23" stroke="#515151" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                               {{$item->metode_pembayaran}}
                            </div>
                            <div class="text-sm text-fiftieth-shade">Bayar sebelum 
                                <span class="text-[#FF0000]">{{ \Illuminate\Support\Carbon::parse($item->created_at)->addMinutes(30)->format('F j, Y g:i A')}}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-5">
                            <div>
                                <button wire:click="paymentCancel({{$item->no_pembayaran}})" class="text-base border border-north-star-blue text-north-star-blue p-2.5 rounded-lg hover:bg-north-star-blue hover:text-white font-medium">Batalkan Penyewaan</button>
                            </div>
                            <div>
                                <a href="{{route('konfirmasi-pembayaran', $item->no_pembayaran)}}" class="border border-north-star-blue text-base p-2.5 rounded-lg bg-north-star-blue text-white font-medium">Lanjut Membayar</a>
                            </div>
                        </div>
                    </div>
                @elseif($item->status === 'PAID')
                    @if (!$item->rating)
                        <div class="px-5 py-7 flex items-center justify-end" x-data="{openRating: false, noPembayaran: @js($item->no_pembayaran), rating: 0, hover: 0}">
                            <div>
                                <button @click="openRating = !openRating; " class="border border-north-star-blue text-base p-2.5 rounded-lg bg-north-star-blue text-white font-medium">Beri Penilaian</button>
                            </div>
                            <div
                                x-show="openRating"
                                style="display: none"
                                x-on:keydown.escape.prevent.stop="openRating = false"
                                role="dialog"
                                aria-modal="true"
                                x-id="['modal-title']"
                                :aria-labelledby="$id('modal-title')"
                                class="fixed inset-0 z-10 overflow-y-auto"
                            >
                                <!-- Overlay -->
                                <div x-show="openRating" x-transition.opacity class="fixed inset-0 bg-black/45"></div>
        
                                <!-- Panel -->
                                <div
                                    x-show="openRating" x-transition
                                    class="relative flex min-h-screen items-center justify-center p-4"
                                >
                                    <div
                                        x-on:click.stop
                                        x-trap.noscroll.inert="openRating"
                                        class="relative min-w-96 max-w-xl rounded-[5px] bg-white-smoke p-6 shadow-lg space-y-6"
                                    >
                                        <div class="absolute -top-2 -right-2 cursor-pointer" x-on:click="openRating = false">
                                            <div class="border border-north-star-blue w-7 h-7 rounded-full flex justify-center items-center bg-white">
                                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.33333 1.33334L11.6667 11.6667" stroke="#EB0D0D" stroke-width="2" stroke-linecap="round"/>
                                                    <path d="M1.33328 11.6667L11.6666 1.33335" stroke="#EB0D0D" stroke-width="2" stroke-linecap="round"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex gap-4 justify-center">
                                            <template x-for="star in 5" :key="star">
                                                <svg 
                                                @mouseover="hover = star" 
                                                @mouseleave="hover = 0" 
                                                @click="rating = star" 
                                                :class="{
                                                    'text-[#FFB800]': hover >= star || rating >= star,
                                                    'text-gray-300': hover < star && rating < star
                                                }"
                                                xmlns="http://www.w3.org/2000/svg" 
                                                fill="currentColor" 
                                                viewBox="0 0 24 24" 
                                                class="w-6 h-6 cursor-pointer"
                                                >
                                                <path d="M12 .587l3.668 7.568L24 9.75l-6 5.857 1.417 8.393L12 18.896l-7.417 5.104L6 15.607 0 9.75l8.332-1.595z"/>
                                                </svg>
                                            </template>
                                        </div>
                                        <button x-show="rating !== 0" @click="$dispatch('kirimRating', {rating, noPembayaran})" class="border border-north-star-blue text-base p-1 rounded-lg bg-north-star-blue text-white font-medium w-full">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                @endif
            </div>
        @endforeach
    </div>
</div>
