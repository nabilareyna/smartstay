<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use App\Models\Reservation;
use App\Models\Employees;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{

    public $rooms, $todayReservations, $employees, $recentReservations;

    public function mount()
    {
        $this->rooms = Room::with('hotel')->count();
        $this->employees = Employees::count();
        $this->todayReservations = Reservation::whereDate('checkin', Carbon::today())->count();
        $this->recentReservations = Reservation::with(['user', 'room'])
        ->latest()
        ->take(5)
        ->get();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
