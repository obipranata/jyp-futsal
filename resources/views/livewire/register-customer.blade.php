<div class="mx-auto lg:max-w-[700px] space-y-5">
    <div class="pb-5 border-b-2 border-[#D9D9D9]">
        <h1 class="capitalize text-[32px] text-[#464646] font-medium">Daftar akun penyewa</h1>
    </div>
    <form method="POST" action="{{ route('register-customer') }}">
        @csrf
        <div class="pt-4 pb-10 space-y-4 border-b-2 border-[#D9D9D9]">
            <div class="flex flex-wrap gap-5 w-full">
                <div class="space-y-4 flex-1">
                    <label for="name" class="text-north-star-blue text-sm pl-4 font-semibold">Nama <span class="text-[#EA1C0F]">*</span></label>
                    <input type="text" name="name" id="name" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Nama Anda" required />
                </div>
            </div>
            <div class="flex flex-wrap gap-5 w-full">
                <div class="space-y-2 flex-1">
                    <label for="phone" class="text-north-star-blue text-sm pl-4 font-semibold">No. HP <span class="text-[#EA1C0F]">*</span></label>
                    <input type="number" name="phone" id="phone" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan No. Hp" required />
                </div>
                <div class="space-y-2 flex-1">
                    <label for="password" class="text-north-star-blue text-sm pl-4 font-semibold">Kata Sandi <span class="text-[#EA1C0F]">*</span></label>
                    <input type="password" name="password" id="password" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Kata Sandi" required />
                </div>
            </div>
            <div class="flex flex-wrap gap-5 w-full">
                <div class="space-y-2 flex-1">
                    <label for="email" class="text-north-star-blue text-sm pl-4 font-semibold">Email <span class="text-[#EA1C0F]">*</span></label>
                    <input type="email" name="email" id="email" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Email" required />
                </div>
                <div class="space-y-2 flex-1">
                    <label for="password" class="text-north-star-blue text-sm pl-4 font-semibold">Ulangi Kata Sandi <span class="text-[#EA1C0F]">*</span></label>
                    <input type="password" name="password" id="password" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Ulangi Kata Sandi" required />
                </div>
            </div>
        </div>
        <div class="py-4 space-y-4">
            <div class="flex flex-wrap gap-5 w-full">
                <div class="space-y-2 flex-1">
                    <label for="address" class="text-north-star-blue text-sm pl-4 font-semibold">Alamat <span class="text-[#EA1C0F]">*</span></label>
                    <input type="text" name="address" id="address" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Alamat Lapangan" required />
                </div>
            </div>
            <div class="flex flex-wrap gap-5 w-full">
                <div class="space-y-2 flex-1">
                    <label for="distrit" class="text-north-star-blue text-sm pl-4 font-semibold w-full">Kecamatan <span class="text-[#EA1C0F]">*</span></label>
                    <select
                        class="w-full bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 h-[50px]"
                        name="distrit"
                        id="distrit">
                        <option value="">Pilih Kecamatan</option>
                        <option value="">Kecamatan Cimahi</option>
                        <option value="">Kecamatan Satani</option>
                        <option value="">Jayapura</option>
                        <option value="">Kebumen</option>
                    </select>
                </div>
                <div class="space-y-2 flex-1">
                    <label for="distrit" class="text-north-star-blue text-sm pl-4 font-semibold w-full">Kota <span class="text-[#EA1C0F]">*</span></label>
                    <select
                        class="w-full bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 h-[50px]"
                        name="distrit"
                        id="distrit">
                        <option value="">Pilih Kota</option>
                        <option value="">Cimahi</option>
                        <option value="">Satani</option>
                        <option value="">Jayapura</option>
                        <option value="">Kebumen</option>
                    </select>
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
