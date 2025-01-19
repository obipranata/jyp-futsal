<form wire:submit="simpan" class="p-10 bg-white rounded shadow-xl space-y-4">
  <div class="space-y-2">
    <label class="block text-base text-gray-800" for="nama-event">Nama Event</label>
    <input type="text" wire:model="namaEvent" id="nama-event" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Nama event" />
    <div class="text-[#EA1C0F] pl-4 text-xs">@error('namaEvent') {{ $message }} @enderror</div>
  </div>
  <div class="space-y-2">
    <label class="block text-base text-gray-800" for="tanggal" for="tanggal">Tanggal</label>
    <input type="date" wire:model="tanggal" id="tanggal" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="tanggal" />
    <div class="text-[#EA1C0F] pl-4 text-xs">@error('tanggal') {{ $message }} @enderror</div>
  </div>
  <div class="space-y-2">
    <label class="block text-base text-gray-800" for="htm" for="htm">Harga Tiket Masuk</label>
    <input type="number" wire:model="htm" id="htm" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="htm" />
    <div class="text-[#EA1C0F] pl-4 text-xs">@error('htm') {{ $message }} @enderror</div>
  </div>
  <div class="space-y-2">
    <label class="block text-base text-gray-800" for="lokasi" for="lokasi">Lokasi</label>
    <input type="text" wire:model="lokasi" id="lokasi" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="lokasi" />
    <div class="text-[#EA1C0F] pl-4 text-xs">@error('lokasi') {{ $message }} @enderror</div>
  </div>
  <div>
    <label class="block text-base text-gray-800" for="file_input">Upload Poster</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" id="file_input" type="file" wire:model="poster">
  </div>
  <div class="mt-8">
    <button class="flex justify-end ml-auto px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
  </div>
</form>