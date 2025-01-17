<form wire:submit="simpan" class="p-10 bg-white rounded shadow-xl space-y-4">
  <div class="space-y-2">
    <label class="block text-base text-gray-800" for="nama-lapangan">Nama Lapangan</label>
    <input type="text" wire:model="namaLapangan" id="nama-lapangan" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Nama lapangan" />
    <div class="text-[#EA1C0F] pl-4 text-xs">@error('namaLapangan') {{ $message }} @enderror</div>
  </div>
  <div class="space-y-2">
    <label class="block text-base text-gray-800" for="harga" for="harga">Harga</label>
    <input type="number" wire:model="harga" id="harga" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="harga" />
    <div class="text-[#EA1C0F] pl-4 text-xs">@error('harga') {{ $message }} @enderror</div>
  </div>
  <div>
    <label class="block text-base text-gray-800" for="file_input">Upload Foto</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" id="file_input" type="file" wire:model="foto">
  </div>
  <div class="mt-8">
    <button class="flex justify-end ml-auto px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
  </div>
</form>