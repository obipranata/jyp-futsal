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
          {{$user->nama}}
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
                  class="border border-titanium-white text-center rounded-lg bg-gray-100 text-gray-700 cursor-pointer hover:bg-north-star-blue hover:text-white"
                  :class="{'bg-north-star-blue text-white' : `${day} ${monthNames[currentMonth]} ${currentYear}` === selectedFullDate, '!text-[#E5E5E5] !cursor-not-allowed  hover:!bg-gray-100 hover:!text-[#E5E5E5]'  : isBeforeToday(`${currentYear}`, `${currentMonth}`, `${day}`) }"
                  @click="!isBeforeToday(currentYear, currentMonth, day) && selectDate(day)"
              >
                  <div class="w-[134px] h-[158px] flex flex-col justify-center items-center">
                      <div class="text-[28px] font-medium" x-text="getDayName(day)"></div>
                      <div class="text-[50px] font-medium" x-text="day"></div>
                  </div>
              </div>
            </template>
          </div>
      </div>
      <div class="border-b border-gainsboro pb-[30px]">
          <div class="flex items-center gap-5 flex-wrap justify-center">
              {{-- <div class="p-2.5 bg-white-smoke text-blue-blue rounded-lg space-y-3 cursor-not-allowed opacity-[.5]">
                  <img src="{{asset('assets/image1.jpeg')}}" class="object-cover w-[342px] h-[255px] rounded-lg" alt="">
                  <h2 class="text-2xl font-semibold text-center">Lapangan 1</h2>
              </div> --}}
              @foreach ($lapangan as $item)
                  <div class="p-2.5  border border-[#D9D9D9] hover:bg-north-star-blue hover:text-white rounded-lg space-y-3 cursor-pointer {{$item->id == $lapanganId ? 'text-white bg-north-star-blue' : 'text-blue-blue'}}" wire:click="selectedLapangan({{$item->id}}, {{$item->harga}}, '{{$item->nama_lapangan}}')">
                      <img src="{{Storage::url($item->foto)}}" class="object-cover w-[342px] h-[255px] rounded-lg" alt="">
                      <h2 class="text-2xl font-semibold text-center">{{$item->nama_lapangan}}</h2>
                  </div>
              @endforeach
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
          <div class="flex gap-2.5 flex-wrap justify-center">
              @foreach ($times as $time)
                  @php
                      $class = 'hover:bg-north-star-blue hover:text-white text-center cursor-pointer';
                      $disabled = false;
                      if (in_array($time, $booked) || !$this->timeNow->lt($time)) {
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



      <div class="space-y-8">
        <div class="flex justify-between items-center">
          <div class="space-y-8">
            <h2 class="text-north-star-blue text-3xl font-semibold">Details</h2>
  
            <div class="space-y-3">
                <div class="font-bold text-2xl">Lokasi</div>
                <div class="flex gap-2.5">
                    <svg width="22" height="27" viewBox="0 0 22 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 11.2273C21 19.1818 11 26 11 26C11 26 1 19.1818 1 11.2273C1 8.51483 2.05357 5.91348 3.92893 3.9955C5.8043 2.07751 8.34784 1 11 1C13.6522 1 16.1957 2.07751 18.0711 3.9955C19.9464 5.91348 21 8.51483 21 11.2273Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.9999 14.6363C12.8408 14.6363 14.3332 13.11 14.3332 11.2272C14.3332 9.34442 12.8408 7.81812 10.9999 7.81812C9.15892 7.81812 7.66653 9.34442 7.66653 11.2272C7.66653 13.11 9.15892 14.6363 10.9999 14.6363Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>  
                    <div class="font-light text-lg">{{$user->alamat}}, {{$user->kecamatan}}, {{$user->kota}}</div>                      
                </div>
            </div>
  
            <div class="space-y-3">
                <div class="font-bold text-2xl">Kontak</div>
                <div class="flex gap-2.5">
                    <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.9992 18.9686V22.5816C26.0006 22.917 25.9289 23.249 25.7887 23.5563C25.6484 23.8636 25.4428 24.1395 25.1848 24.3662C24.9268 24.593 24.6223 24.7656 24.2907 24.873C23.959 24.9805 23.6076 25.0204 23.259 24.9902C19.391 24.5875 15.6755 23.3212 12.4111 21.293C9.37402 19.4439 6.79908 16.9769 4.86917 14.067C2.74483 10.9252 1.4228 7.34809 1.0102 3.62554C0.978791 3.29251 1.0201 2.95685 1.1315 2.63995C1.2429 2.32305 1.42196 2.03185 1.65726 1.78488C1.89256 1.53791 2.17896 1.34059 2.49822 1.20548C2.81748 1.07037 3.1626 1.00043 3.51162 1.00012H7.2826C7.89262 0.994364 8.48402 1.20133 8.94656 1.58245C9.40909 1.96356 9.71121 2.49281 9.79658 3.07155C9.95575 4.22778 10.2509 5.36305 10.6765 6.4557C10.8456 6.88675 10.8822 7.35522 10.7819 7.8056C10.6817 8.25597 10.4488 8.66938 10.1108 8.99682L8.51445 10.5263C10.3039 13.5414 12.9095 16.0378 16.0564 17.7522L17.6528 16.2228C17.9946 15.899 18.426 15.6758 18.8961 15.5798C19.3662 15.4837 19.8551 15.5188 20.305 15.6808C21.4455 16.0885 22.6304 16.3713 23.8372 16.5238C24.4478 16.6064 25.0054 16.901 25.4041 17.3518C25.8027 17.8026 26.0145 18.378 25.9992 18.9686Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="font-light text-lg">{{$user->no_hp}}</div>                      
                </div>
            </div>

            <div class="space-y-3">
              <div class="font-bold text-2xl">Fasilitas</div>
              <div class="flex gap-8">
                <div class="flex gap-2.5">
                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.5 8.5L18.255 11.955M13.5 8.5L8.745 11.955M13.5 8.5V4.75M18.255 11.955L16.4387 17.545H10.5625M18.255 11.955L21.625 10.375M8.745 11.955L10.5625 17.545M8.745 11.955L5.375 10.375M13.5 4.75L9.28 1.73M13.5 4.75L17.72 1.73M21.625 10.375L25.9375 14.75M21.625 10.375L22.875 5.23125M10.5625 17.545L8.5 20.375M16.44 17.545L18.5 20.375M18.5 20.375L24.3275 19.75M18.5 20.375L15.375 25.86M8.5 20.375L2.6725 19.75M8.5 20.375L11.625 25.86M5.375 10.375L1.0625 14.75M5.375 10.375L4.125 5.23125M26 13.5C26 20.4037 20.4037 26 13.5 26C6.59625 26 1 20.4037 1 13.5C1 6.59625 6.59625 1 13.5 1C20.4037 1 26 6.59625 26 13.5Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div class="font-light text-lg">Bola</div>                      
                </div>
                <div class="flex gap-2.5" x-data>
                  <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.5 12.499C17.5 12.7753 17.3683 13.0403 17.1339 13.2357C16.8995 13.4312 16.5815 13.5409 16.25 13.5409C15.9185 13.5409 15.6005 13.4312 15.3661 13.2357C15.1317 13.0403 15 12.7753 15 12.499C15 12.2226 15.1317 11.9576 15.3661 11.7622C15.6005 11.5668 15.9185 11.457 16.25 11.457C16.5815 11.457 16.8995 11.5668 17.1339 11.7622C17.3683 11.9576 17.5 12.2226 17.5 12.499ZM11.495 0.0202103C11.3137 -0.00999325 11.1267 -0.00630364 10.9473 0.0310129C10.7679 0.0683295 10.6007 0.138344 10.4577 0.236013C10.3148 0.333681 10.1995 0.456571 10.1204 0.595831C10.0412 0.73509 10.0001 0.887251 10 1.04135V23.9586C10.0001 24.1127 10.0412 24.2649 10.1204 24.4042C10.1995 24.5434 10.3148 24.6663 10.4577 24.764C10.6007 24.8617 10.7679 24.9317 10.9473 24.969C11.1267 25.0063 11.3137 25.01 11.495 24.9798L23.995 22.8958C24.2783 22.8486 24.5332 22.7211 24.7164 22.535C24.8996 22.3488 24.9998 22.1155 25 21.8747V3.12531C24.9998 2.88452 24.8996 2.65121 24.7164 2.46504C24.5332 2.27888 24.2783 2.15136 23.995 2.10417L11.495 0.0202103ZM12.5 22.6874V2.31257L22.5 3.97973V21.0203L12.5 22.6874ZM7.5 22.9167V20.8327H2.5V4.16729H7.5V2.08333H1.25C0.918479 2.08333 0.600537 2.19311 0.366117 2.38852C0.131696 2.58393 0 2.84896 0 3.12531V21.8747C0 22.151 0.131696 22.4161 0.366117 22.6115C0.600537 22.8069 0.918479 22.9167 1.25 22.9167H7.5Z" fill="black"/>
                  </svg>
                  <div class="font-light text-lg" x-on:click="navigator.clipboard.writeText('test')">Toilet</div>                      
                </div>
              </div>
          </div>
          </div>
          @if ($user->map)
            <div>
              {!!  $user->map !!}
            </div>
          @endif
        </div>

          @if (!$isDisabled)
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-medium">Harga Total</h2>
                    @if ($isDisabled)
                      <h3 class="text-north-star-blue text-2xl font-bold">Rp 0</h3>
                    @else
                      <h3 class="text-north-star-blue text-2xl font-bold">Rp {{number_format($totalHarga ?? 0)}}</h3>
                    @endif
                </div>
                @auth
                  <button wire:click="submitBooking" class="text-white py-5 w-full rounded-lg text-2xl font-bold block text-center {{$isDisabled ? 'cursor-not-allowed bg-gray-300' : 'bg-north-star-blue cursor-pointer'}}" @disabled($isDisabled)>Booking Sekarang</button>
                @else
                  <a href="{{route('login')}}" class="bg-north-star-blue text-white py-5 w-full rounded-lg text-2xl font-bold block text-center {{$isDisabled ? 'cursor-not-allowed' : 'cursor-pointer'}}">Booking Sekarang</a>
                @endauth
            </div>
          @endif
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
      selectedFullDate: null,
      month: null,
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
        this.month = this.monthNames[this.currentMonth];
        this.selectedFullDate = `${day} ${this.month} ${this.currentYear}`;
        Livewire.dispatch('selected-date', { tanggal: `${this.currentYear}-${this.currentMonth+1}-${day}`, tanggalLengkap: this.selectedFullDate })
      },

      isBeforeToday(year, month, day) {
        const compareDate = new Date(year, month, day);
        compareDate.setHours(0, 0, 0, 0);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        return compareDate < today;
      }

    };
  }
</script>
