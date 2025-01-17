<div class="w-full h-screen overflow-x-hidden flex flex-col">
    <main class="w-full flex-grow p-6">
        <h1 class="w-full text-3xl text-black pb-6">Tambah Lapangan</h1>

        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
                <div class="leading-loose">
                    <form wire:submit="simpan" class="p-10 bg-white rounded shadow-xl space-y-4">
                        @include('livewire.partials.lapangan._form-lapangan')
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>