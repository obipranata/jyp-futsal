<div class="mx-auto lg:max-w-[700px] space-y-5">
    <div class="pb-5 border-b-2 border-[#D9D9D9]">
        <h1 class="text-[38px] font-bold text-center">Event</h1>
    </div>
    @foreach ($events as $item)
        <div class="flex gap-5 bg-olympian-blue rounded-lg !p-4">
            <div class="w-1/2">
                <img src="{{ Storage::url($item->poster) }}" alt="" class="w-full h-44 rounded-lg object-center object-cover">
            </div>
            <div class="flex flex-col space-y-2.5 w-1/2">
                <div class="">
                    <h1 class="capitalize text-white text-xl font-bold">{{$item->nama_event}}</h1>
                </div>
                <div class="space-y-2.5">
                    <div class="flex justify-between text-white w-full">
                        <h2 class="font-medium text-sm text-left">Tanggal</h2>
                        <h2 class="font-light text-sm text-right">{{\Illuminate\Support\Carbon::parse($item->tanggal)->format('d M Y')}}</h2>
                    </div>
                    <div class="flex justify-between text-white w-full capitalize">
                        <h2 class="font-medium text-sm text-left">lokasi</h2>
                        <h2 class="font-light text-sm text-right">{{$item->lokasi}}</h2>
                    </div>
                    <div class="flex justify-between text-white w-full capitalize">
                        <h2 class="font-medium text-sm text-left">HTM</h2>
                        <h2 class="font-light text-sm text-right">Rp. {{number_format($item->htm)}}</h2>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
