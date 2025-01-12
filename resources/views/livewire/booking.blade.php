<div>
    <div x-data="datePicker()" class="space-y-[30px]">
    
        <style>
            /* Hide scrollbar for Chrome, Safari and Opera */
            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }
    
            /* Hide scrollbar for IE, Edge and Firefox */
            .no-scrollbar {
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }
        </style>

        <div class="w-full bg-white-smoke text-center py-3 text-[38px] font-bold text-north-star-blue">
            Mutiara Hitam
        </div>

        <div class="space-y-8 border-b border-gainsboro pb-[30px]">
            <div class="flex gap-3 items-center font-semibold text-[28px] justify-center">
                <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.3333 4.49762H4.66667C3.19391 4.49762 2 5.61583 2 6.99522V24.4784C2 25.8578 3.19391 26.976 4.66667 26.976H23.3333C24.8061 26.976 26 25.8578 26 24.4784V6.99522C26 5.61583 24.8061 4.49762 23.3333 4.49762Z" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19.3333 2V6.99519" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.66667 2V6.99519" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 11.9904H26" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Pilih Tanggal
            </div>
        
            <!-- Month Selector -->
            <div class="flex items-center gap-8 justify-center">
              <button @click="prevMonth" class="text-gray-600">
                <svg width="20" height="29" viewBox="0 0 20 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 26.0153L2 14.4879L18 2.96057" stroke="#1F3E97" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
              <span class="font-medium text-2xl text-fiftieth-shade" x-text="`${monthNames[currentMonth]} ${currentYear}`"></span>
              <button @click="nextMonth" class="text-gray-600">
                <svg width="20" height="28" viewBox="0 0 20 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 25.0547L18 13.5274L2 2" stroke="#1F3E97" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          
            <!-- Date Cards -->
            <div class="flex gap-2 overflow-x-auto no-scrollbar">
              <template x-for="day in daysInMonth" :key="day">
                <div 
                    class="border border-titanium-white text-center rounded-lg cursor-pointer"
                    :class="day === selectedDate ? 'bg-north-star-blue text-white ' : 'bg-gray-100 text-gray-700'"
                    @click="selectDate(day)"
                >
                    <div class="w-[146px] h-[170px] flex flex-col justify-center items-center">
                        <div class="text-[28px] font-medium" x-text="getDayName(day)"></div>
                        <div class="text-[50px] font-medium" x-text="day"></div>
                    </div>
                </div>
              </template>
            </div>
        </div>
        
        <div class="space-y-8 border-b border-gainsboro pb-[30px]">
            <div class="flex gap-3 items-center text-[28px] justify-center">
                <svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.3333 4.49762H4.66667C3.19391 4.49762 2 5.61583 2 6.99522V24.4784C2 25.8578 3.19391 26.976 4.66667 26.976H23.3333C24.8061 26.976 26 25.8578 26 24.4784V6.99522C26 5.61583 24.8061 4.49762 23.3333 4.49762Z" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19.3333 2V6.99519" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8.66667 2V6.99519" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 11.9904H26" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Pilih Jam
            </div>
            <div class="flex gap-2.5 justify-center">
                @foreach ($times as $time)
                    @php
                        $class = 'hover:bg-north-star-blue hover:text-white text-center cursor-pointer';
                        $disabled = false;
                        if (in_array($time, $booked)) {
                            $class = 'text-titanium-white text-center cursor-not-allowed';
                            $disabled = true;
                        }

                        if (in_array($time, $bookingTimes)) {
                            $class = 'bg-north-star-blue text-white cursor-pointer';
                        }
                    @endphp
                    <button class="w-[108px] h-[55px] border border-titanium-white rounded-lg flex items-center justify-center {{$class}}" wire:click="selectedTime('{{$time}}')" {{$disabled ? 'disabled' : ''}}>
                        {{$time}}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="border-b border-gainsboro pb-[30px]">
            <div class="flex items-center gap-5 flex-wrap justify-center">
                <div class="p-2.5 bg-white-smoke text-blue-blue rounded-lg space-y-3 cursor-not-allowed opacity-[.5]">
                    <img src="{{asset('assets/image1.jpeg')}}" class="object-cover w-[342px] h-[255px] rounded-lg" alt="">
                    <h2 class="text-2xl font-semibold text-center">Lapangan 1</h2>
                </div>
                <div class="p-2.5 bg-white-smoke hover:bg-north-star-blue text-blue-blue hover:text-white rounded-lg space-y-3 cursor-pointer">
                    <img src="{{asset('assets/image1.jpeg')}}" class="object-cover w-[342px] h-[255px] rounded-lg" alt="">
                    <h2 class="text-2xl font-semibold text-center">Lapangan 2</h2>
                </div>
                <div class="p-2.5 bg-white-smoke hover:bg-north-star-blue text-blue-blue hover:text-white rounded-lg space-y-3 cursor-pointer">
                    <img src="{{asset('assets/image1.jpeg')}}" class="object-cover w-[342px] h-[255px] rounded-lg" alt="">
                    <h2 class="text-2xl font-semibold text-center">Lapangan 3</h2>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <h2 class="text-north-star-blue text-4xl font-semibold">Details</h2>

            <div class="space-y-3">
                <div class="font-bold text-[28px]">Lokasi</div>
                <div class="flex gap-2.5">
                    <svg width="22" height="27" viewBox="0 0 22 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 11.2273C21 19.1818 11 26 11 26C11 26 1 19.1818 1 11.2273C1 8.51483 2.05357 5.91348 3.92893 3.9955C5.8043 2.07751 8.34784 1 11 1C13.6522 1 16.1957 2.07751 18.0711 3.9955C19.9464 5.91348 21 8.51483 21 11.2273Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.9999 14.6363C12.8408 14.6363 14.3332 13.11 14.3332 11.2272C14.3332 9.34442 12.8408 7.81812 10.9999 7.81812C9.15892 7.81812 7.66653 9.34442 7.66653 11.2272C7.66653 13.11 9.15892 14.6363 10.9999 14.6363Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>  
                    <div class="font-light text-xl">Jln. Ardipura III, Polimak I</div>                      
                </div>
            </div>

            <div class="space-y-3">
                <div class="font-bold text-[28px]">Kontak</div>
                <div class="flex gap-2.5">
                    <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.9992 18.9686V22.5816C26.0006 22.917 25.9289 23.249 25.7887 23.5563C25.6484 23.8636 25.4428 24.1395 25.1848 24.3662C24.9268 24.593 24.6223 24.7656 24.2907 24.873C23.959 24.9805 23.6076 25.0204 23.259 24.9902C19.391 24.5875 15.6755 23.3212 12.4111 21.293C9.37402 19.4439 6.79908 16.9769 4.86917 14.067C2.74483 10.9252 1.4228 7.34809 1.0102 3.62554C0.978791 3.29251 1.0201 2.95685 1.1315 2.63995C1.2429 2.32305 1.42196 2.03185 1.65726 1.78488C1.89256 1.53791 2.17896 1.34059 2.49822 1.20548C2.81748 1.07037 3.1626 1.00043 3.51162 1.00012H7.2826C7.89262 0.994364 8.48402 1.20133 8.94656 1.58245C9.40909 1.96356 9.71121 2.49281 9.79658 3.07155C9.95575 4.22778 10.2509 5.36305 10.6765 6.4557C10.8456 6.88675 10.8822 7.35522 10.7819 7.8056C10.6817 8.25597 10.4488 8.66938 10.1108 8.99682L8.51445 10.5263C10.3039 13.5414 12.9095 16.0378 16.0564 17.7522L17.6528 16.2228C17.9946 15.899 18.426 15.6758 18.8961 15.5798C19.3662 15.4837 19.8551 15.5188 20.305 15.6808C21.4455 16.0885 22.6304 16.3713 23.8372 16.5238C24.4478 16.6064 25.0054 16.901 25.4041 17.3518C25.8027 17.8026 26.0145 18.378 25.9992 18.9686Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="font-light text-xl">+6281244663322</div>                      
                </div>
            </div>

            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-medium">Harga Total</h2>
                    <h3 class="text-north-star-blue text-[32px] font-bold">Rp 250.000</h3>
                </div>
                <a href="{{route('informasi-pembayaran')}}" class="bg-north-star-blue text-white py-5 w-full rounded-lg text-[28px] font-bold block text-center">Booking Sekarang</a>
            </div>
        </div>
    </div>
</div>
  
  <script>
    function datePicker() {
      return {
        today: new Date(),
        currentYear: new Date().getFullYear(),
        currentMonth: new Date().getMonth(),
        selectedDate: null,
        monthNames: [
          'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ],
        daysInMonth: [],
  
        init() {
          this.updateDaysInMonth();
        },
  
        updateDaysInMonth() {
          const days = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
          this.daysInMonth = Array.from({ length: days }, (_, i) => i + 1);
        },
  
        getDayName(day) {
          const date = new Date(this.currentYear, this.currentMonth, day);
          return ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'][date.getDay()];
        },
  
        prevMonth() {
          this.currentMonth--;
          if (this.currentMonth < 0) {
            this.currentMonth = 11;
            this.currentYear--;
          }
          this.updateDaysInMonth();
        },
  
        nextMonth() {
          this.currentMonth++;
          if (this.currentMonth > 11) {
            this.currentMonth = 0;
            this.currentYear++;
          }
          this.updateDaysInMonth();
        },
  
        selectDate(day) {
          this.selectedDate = day;
        }
      };
    }
  </script>
  