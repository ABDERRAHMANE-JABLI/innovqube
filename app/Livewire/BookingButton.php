<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;


class BookingButton extends Component
{
    public $propertyId;

    public function bookProperty()
    {
        if (!Auth::check()) {
            return;
        }

        if (Booking::where('user_id', Auth::id())->where('property_id', $this->propertyId)->exists()) {
        session()->flash('error', 'Vous avez déjà réservé ce bien.');
        return;
    }

    Booking::create([
        'user_id' => Auth::id(),
        'property_id' => $this->propertyId,
        'start_date' => now(),
        'end_date' => now()->addDays(2),
    ]);

    session()->flash('message', 'Réservation effectuée avec succès !');
    $this->dispatch('bookingMade');

    }

    public function render()
    {
        return view('livewire.booking-button');
    }
}
