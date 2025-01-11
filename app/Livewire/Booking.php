<?php

namespace App\Livewire;

use Livewire\Component;

class Booking extends Component
{

    public $bookingTimes = [];
    public $times = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
    public $booked = ['08:00', '10:00', '11:00'];

    public function selectedTime($data): void
    {
        if (in_array($data, $this->bookingTimes)) {
            $this->bookingTimes = array_filter($this->bookingTimes, function($time) use ($data) {
                return $time !== $data;
            });
            $this->bookingTimes = array_values($this->bookingTimes);
        } else {
            array_push($this->bookingTimes, $data);
        }
    }

    public function render()
    {
        return view('livewire.booking');
    }
}
