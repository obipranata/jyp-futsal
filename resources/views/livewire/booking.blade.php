<div>
    @if ($isSubmitBooking)
        @include('livewire.partials._konfirmasi-pembayaran')
    @else
        @include('livewire.partials._booking')
    @endif
</div>