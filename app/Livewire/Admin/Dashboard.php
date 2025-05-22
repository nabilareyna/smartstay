<?php

namespace App\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;

class Dashboard extends Component
{

    public $rooms;

    public function mount()
    {
        $this->rooms = Room::with('hotel')->get();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
