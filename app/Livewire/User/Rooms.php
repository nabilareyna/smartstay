<?php

namespace App\Livewire\User;

use App\Models\Room;
use Livewire\Component;

class Rooms extends Component
{
    public function render()
    {
        return view('livewire.user.rooms', data: [
            'rooms' => Room::where('status', 'available')->get(),
        ]);
    }
}
