<?php

namespace App\Livewire\User;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reservations extends Component
{
    public function render()
    {
        $reservations = Reservation::with('room') // pastikan ada relasi 'room' di model Reservation
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('livewire.user.reservations', [
            'reservations' => $reservations
        ]);
    }
}
