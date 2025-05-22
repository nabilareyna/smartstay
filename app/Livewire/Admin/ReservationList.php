<?php

namespace App\Livewire\Admin;

use App\Models\Reservation;
use Livewire\Component;

class ReservationList extends Component
{
    public function render()
    {
        $reservations = Reservation::with(['user', 'room'])->latest()->get();

        return view('livewire.admin.reservation-list', [
            'reservations' => $reservations
        ]);
    }
}
