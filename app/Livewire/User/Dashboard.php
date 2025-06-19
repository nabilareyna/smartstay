<?php

namespace App\Livewire\User;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $userId = Auth::id();

        $totalReservations = Reservation::where('user_id', $userId)->count();
        $activeReservations = Reservation::where('user_id', $userId)
            ->whereDate('checkout', '>=', now())
            ->count();
        $historyCount = Reservation::where('user_id', $userId)
            ->whereDate('checkout', '<', now())
            ->count();

        // Ambil 2 kamar terpopuler (misal berdasarkan jumlah reservasi)
        $popularRooms = Room::inRandomOrder()->take(2)->get();

        return view('livewire.user.dashboard', [
            'totalReservations' => $totalReservations,
            'activeReservations' => $activeReservations,
            'historyCount' => $historyCount,
            'popularRooms' => $popularRooms,
        ]);
    }
}
