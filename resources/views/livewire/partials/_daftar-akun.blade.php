<div class="mx-auto lg:max-w-[700px] space-y-5">
  <div class="pb-5 border-b-2 border-[#D9D9D9]">
      <h1 class="capitalize text-[32px] text-[#464646] font-medium">Daftar akun lapangan</h1>
  </div>
 <form wire:submit="register">
     <div class="pt-4 pb-10 space-y-4 border-b-2 border-[#D9D9D9]">
         <div class="flex flex-wrap gap-5 w-full">
             <div class="space-y-4 flex-1">
                 <label for="name" class="text-north-star-blue text-sm pl-4 font-semibold">Nama <span class="text-[#EA1C0F]">*</span></label>
                 <input type="text" wire:model="nama" id="name" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Nama Anda" />
                 <div class="text-[#EA1C0F] pl-4 text-xs">@error('nama') {{ $message }} @enderror</div>
             </div>
             <div class="space-y-4 flex-1">
                 <label for="logo" class="text-north-star-blue text-sm pl-4 font-semibold">Logo <span class="text-[#EA1C0F]">*</span></label>
                 <div class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]">
                     <label for="logo" class="block w-full h-full cursor-pointer" style="align-content: center;">
                         <h1 class="text-[#858585] text-sm pl-4 font-normal">Upload Logo (JPG / PNG)</h1>
                         <input id="logo" wire:model="logo" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg, image/svg, image/webp, image/heic, image/tiff, application/pdf" />
                     </label>
                     <div class="text-[#EA1C0F] pl-4 text-xs">@error('logo') {{ $message }} @enderror</div>
                 </div>
             </div>
         </div>
         <div class="flex flex-wrap gap-5 w-full">
             <div class="space-y-2 flex-1">
                 <label for="phone" class="text-north-star-blue text-sm pl-4 font-semibold">No. HP <span class="text-[#EA1C0F]">*</span></label>
                 <input type="number" wire:model="noHp" id="phone" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan No. Hp" />
                 <div class="text-[#EA1C0F] pl-4 text-xs">@error('noHp') {{ $message }} @enderror</div>
             </div>
             <div class="space-y-2 flex-1">
                 <label for="password" class="text-north-star-blue text-sm pl-4 font-semibold">Kata Sandi <span class="text-[#EA1C0F]">*</span></label>
                 <input type="password" wire:model="password" id="password" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Kata Sandi" />
                 <div class="text-[#EA1C0F] pl-4 text-xs">@error('password') {{ $message }} @enderror</div>
             </div>
         </div>
         <div class="flex flex-wrap gap-5 w-full">
             <div class="space-y-2 flex-1">
                 <label for="email" class="text-north-star-blue text-sm pl-4 font-semibold">Email <span class="text-[#EA1C0F]">*</span></label>
                 <input type="email" wire:model="email" id="email" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Email" />
                 <div class="text-[#EA1C0F] pl-4 text-xs">@error('email') {{ $message }} @enderror</div>
             </div>
             <div class="space-y-2 flex-1">
                <label for="passwordConfirmation" class="text-north-star-blue text-sm pl-4 font-semibold">Ulang Kata Sandi <span class="text-[#EA1C0F]">*</span></label>
                <input type="password" wire:model="passwordConfirmation" id="passwordConfirmation" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Ulang Kata Sandi" />
                <div class="text-[#EA1C0F] pl-4 text-xs">@error('passwordConfirmation') {{ $message }} @enderror</div>
             </div>
         </div>
     </div>
     <div class="py-4 space-y-4">
         <div class="flex flex-wrap gap-5 w-full">
            <div class="space-y-2 flex-1">
                <label for="surat-izin-bangunan" class="text-north-star-blue text-sm pl-4 font-semibold">Surat Izin Bangunan <span class="text-[#EA1C0F]">*</span></label>
                <div class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]">
                    <label for="surat-izin-bangunan" class="block w-full h-full cursor-pointer" style="align-content: center;">
                        <h1 class="text-[#858585] text-sm pl-4 font-normal">Upload Surat Izin Bangunan (JPG / PNG)</h1>
                        <input id="surat-izin-bangunan" wire:model="suratIzinBangunan" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg, image/svg, image/webp, image/heic, image/tiff, application/pdf" />
                    </label>
                    <div class="text-[#EA1C0F] pl-4 text-xs">@error('suratIzinBangunan') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="space-y-2 flex-1">
                <label for="address" class="text-north-star-blue text-sm pl-4 font-semibold">Alamat <span class="text-[#EA1C0F]">*</span></label>
                <input type="text" wire:model="alamat" id="address" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Alamat Lapangan" />
                <div class="text-[#EA1C0F] pl-4 text-xs">@error('alamat') {{ $message }} @enderror</div>
            </div>
         </div>
         <div class="flex flex-wrap gap-5 w-full">
             <div class="space-y-2 flex-1">
                <label for="kecamatan" class="text-north-star-blue text-sm pl-4 font-semibold">Kecamatan <span class="text-[#EA1C0F]">*</span></label>
                <input type="text" wire:model="kecamatan" id="kecamatan" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Kecamatan" />
                <div class="text-[#EA1C0F] pl-4 text-xs">@error('kecamatan') {{ $message }} @enderror</div>
             </div>
             <div class="space-y-2 flex-1">
                <label for="kota" class="text-north-star-blue text-sm pl-4 font-semibold">Kota <span class="text-[#EA1C0F]">*</span></label>
                <input type="text" wire:model="kota" id="kota" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Kota" />
                <div class="text-[#EA1C0F] pl-4 text-xs">@error('kota') {{ $message }} @enderror</div>
             </div>
         </div>
         <div class="pt-8 space-y-4">
             <button
                 type="submit"
                 class="w-full bg-north-star-blue text-white text-xl font-semibold rounded-lg py-4 hover:bg-olympian-blue"
             >
                 Daftar
             </button>
             <div class="flex justify-center">
                 <a href="{{ route('login') }}" class="text-[#858585] text-base font-medium">
                     Sudah Mempunyai Akun? <span class="text-north-star-blue">Login</span>
                 </a>
             </div>
         </div>
     </div>
 </form>
</div>
