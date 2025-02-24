<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class UserReservations extends Component
{
    public $bookings = [];

    protected $listeners = ['bookingMade' => 'loadReservations'];

    public function mount()
    {
        $this->loadReservations();
    }

    public function loadReservations()
    {
        $this->bookings = Booking::where('user_id', Auth::id())->with('property')->get();
    }

    public function render()
    {
        return view('livewire.user-reservations', [
            'bookings' => $this->bookings
        ]);
    }
}
