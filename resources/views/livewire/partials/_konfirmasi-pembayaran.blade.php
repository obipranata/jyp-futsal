<div class="pt-0">
  <div class="pb-5 border-b-2 border-[#D9D9D9]">
      <h1 class="capitalize text-[32px] text-[#464646] font-medium">Informasi Pembayaran</h1>
  </div>

  <div class="py-12 space-y-8">
      <div class="flex gap-5">
          <div class="w-3/5 space-y-4">
              <div class="pl-4 flex justify-between items-center w-full">
                  <h2 class="text-lg text-olympian-blue font-semibold">Total Harga</h2>
                  <h1 class="text-xl text-olympian-blue font-bold">Rp {{number_format($totalHarga)}}</h1>
              </div>

              {{-- Medote Pembayaran --}}
              <div class="space-y-2 flex-1">
                  <label for="virtualAccount" class="text-north-star-blue text-sm pl-4 font-semibold w-full">Pilih Metode Pembayaran</label>
                  <select
                      class="w-full bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 h-[50px]"
                      wire:model="virtualAccount"
                      id="virtualAccount">
                      <option value="">-- Pilih Pembayaran --</option>
                      <option value="MANDIRI">Mandiri</option>
                      <option value="BCA">BCA</option>
                      <option value="BRI">BRI</option>
                      <option value="BNI">BNI</option>
                  </select>
              </div>

              {{-- Lakukan Pembayaran --}}
              <button
                  type="button"
                  wire:click="createVirtualAccount"
                  class="w-full bg-north-star-blue text-white text-xl font-semibold rounded-lg py-4 hover:bg-olympian-blue"
              >
                  Lakukan Pembayaran
              </button>
          </div>

          {{-- Detail Penyewaan --}}
          <div class="w-2/5 p-8 border-2 border-[#F1F1F1] rounded-lg space-y-4">
              <div class="">
                  <h1 class="capitalize text-xl text-[#464646] font-medium">Detail Penyewaan</h1>
              </div>
              <div class="space-y-2.5">
                  {{-- <div class="flex justify-between text-sm capitalize">
                      <h5 class="text-olympian-blue font-bold text-left">Kode Booking</h5>
                      <h5 class="text-olympian-blue font-normal text-right">MH0001</h5>
                  </div> --}}
                  <div class="flex justify-between text-sm capitalize">
                      <h5 class="text-olympian-blue font-bold text-left">Nama</h5>
                      <h5 class="text-olympian-blue font-normal text-right">{{$penyewa->nama}}</h5>
                  </div>
                  <div class="flex justify-between text-sm capitalize">
                      <h5 class="text-olympian-blue font-bold text-left">No. Hp</h5>
                      <h5 class="text-olympian-blue font-normal text-right">{{$penyewa->no_hp}}</h5>
                  </div>
                  <div class="flex justify-between text-sm capitalize">
                      <h5 class="text-olympian-blue font-bold text-left">Lapangan</h5>
                      <h5 class="text-olympian-blue font-normal text-right">{{$namaLapangan}}</h5>
                  </div>
                  <div class="flex justify-between text-sm capitalize">
                      <h5 class="text-olympian-blue font-bold text-left">Jadwal Sewa</h5>
                      <h5 class="text-olympian-blue font-normal text-right">{{$tanggalLengkap}}</h5>
                  </div>
                  <div class="flex justify-between text-sm capitalize">
                      <h5 class="text-olympian-blue font-bold text-left">Jam</h5>
                      <h5 class="text-olympian-blue font-normal text-right">
                        @foreach ($bookingTimes as $key => $item)
                            {{$item}}@if ($key+1 != count($bookingTimes)), @endif
                        @endforeach
                      </h5>
                  </div>
                  <div class="flex justify-between text-sm capitalize">
                      <h5 class="text-olympian-blue font-bold text-left">Durasi</h5>
                      <h5 class="text-olympian-blue font-normal text-right">{{count($bookingTimes)}} Jam</h5>
                  </div>
                  <div class="flex justify-between capitalize items-center">
                      <h5 class="text-olympian-blue text-sm font-bold text-left">Total :</h5>
                      <h5 class="text-olympian-blue text-lg font-bold text-right">Rp {{number_format($totalBayar)}}</h5>
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
                  <li>Kami akan segera memproses pembookingan anda setelah mendapatkan konfirmasi pembayaran segera mungkin.</li>
              </ul>
          </div>
      </div>
  </div>
</div>
