<div>
   <div class="space-y-7">

        {{-- pencarian --}}
        <div class="flex items-center bg-white-smoke w-1/2 mx-auto rounded-full px-4 py-2 shadow-sm">
            <input
                type="text"
                placeholder="Cari Lapangan"
                class="flex-grow bg-white-smoke border-none text-gray-100 placeholder-gray-400 focus:border-none"
            />
            <button>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.6 18L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13C4.68333 13 3.146 12.3707 1.888 11.112C0.63 9.85333 0.000666667 8.316 0 6.5C0 4.68333 0.629333 3.146 1.888 1.888C3.14667 0.63 4.684 0.000666667 6.5 0C8.31667 0 9.85433 0.629333 11.113 1.888C12.3717 3.14667 13.0007 4.684 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L18 16.6L16.6 18ZM6.5 11C7.75 11 8.81267 10.5627 9.688 9.688C10.5633 8.81333 11.0007 7.75067 11 6.5C11 5.25 10.5627 4.18767 9.688 3.313C8.81333 2.43833 7.75067 2.00067 6.5 2C5.25 2 4.18767 2.43767 3.313 3.313C2.43833 4.18833 2.00067 5.25067 2 6.5C2 7.75 2.43767 8.81267 3.313 9.688C4.18833 10.5633 5.25067 11.0007 6.5 11Z" fill="#1F3E97"/>
                </svg>
            </button>
        </div>

        {{-- hero --}}
        <img src="{{asset('assets/hero.png')}}" class="w-full" alt="">

        {{-- card --}}
        <div class="flex items-center gap-5 flex-wrap">
            @include('livewire.partials._card-booking', ['image' => asset('assets/image1.jpeg'), 'title' => 'Mutiara Hitam', 'address' => 'Jln. Ardipura III, Polimak I', 'price' => 'Rp 250.000', 'rating' => '4.5'])
            @include('livewire.partials._card-booking', ['image' => asset('assets/image1.jpeg'), 'title' => 'Mutiara Hitam', 'address' => 'Jln. Ardipura III, Polimak I', 'price' => 'Rp 250.000', 'rating' => '4.5'])
            @include('livewire.partials._card-booking', ['image' => asset('assets/image1.jpeg'), 'title' => 'Mutiara Hitam', 'address' => 'Jln. Ardipura III, Polimak I', 'price' => 'Rp 250.000', 'rating' => '4.5'])
            @include('livewire.partials._card-booking', ['image' => asset('assets/image1.jpeg'), 'title' => 'Mutiara Hitam', 'address' => 'Jln. Ardipura III, Polimak I', 'price' => 'Rp 250.000', 'rating' => '4.5'])
            @include('livewire.partials._card-booking', ['image' => asset('assets/image1.jpeg'), 'title' => 'Mutiara Hitam', 'address' => 'Jln. Ardipura III, Polimak I', 'price' => 'Rp 250.000', 'rating' => '4.5'])
            @include('livewire.partials._card-booking', ['image' => asset('assets/image1.jpeg'), 'title' => 'Mutiara Hitam', 'address' => 'Jln. Ardipura III, Polimak I', 'price' => 'Rp 250.000', 'rating' => '4.5'])
        </div>
   </div>
</div>
