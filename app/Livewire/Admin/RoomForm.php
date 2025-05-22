<?php

namespace App\Livewire\Admin;

use App\Models\Hotel;
use App\Models\Room;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class RoomForm extends Component
{
    use WithFileUploads;
    public $hotel_id;
    public $gambar;
    public $max_person = 1;
    public $jumlah_kamar = 1;
    public $tipe = '';
    public $harga = 0;

    // public function mount($roomId = null)
    // {
    //     if ($roomId) {
    //         $room = Rooms::findOrFail($roomId);
    //         $this->roomId = $room->id;
    //         $this->hotel_id = $room->hotel_id;
    //         $this->tipe = $room->tipe;
    //         $this->harga = $room->harga;
    //         $this->status = $room->status;
    //     }
    // }

    public function getHotelNameProperty()
    {
        return Hotel::find($this->hotel_id)?->nama_hotel ?? '-';
    }

    public function save()
    {
        $this->validate([
            'hotel_id' => 'required',
            'gambar' => 'required',
            'max_person' => 'required|integer|min:1',
            'jumlah_kamar' => 'required|integer|min:1',
            'tipe' => 'required',
            'harga' => 'required|numeric|min:0',
        ]);

        $photo_name = md5($this->gambar . microtime()) . '.' . $this->gambar->extension();
        $this->gambar->storeAs('image', $photo_name, 'public');

        Room::create([
            'hotel_id' => $this->hotel_id,
            'gambar' => $photo_name,
            'max_person' => $this->max_person,
            'jumlah_kamar' => $this->jumlah_kamar,
            'tipe' => $this->tipe,
            'harga' => $this->harga,
        ]);

        session()->flash('success', 'Room berhasil ditambahkan!');
        $this->reset(); // Clear form after submit
    }

    public function render()
    {
        return view('livewire.admin.room-form', [
            'hotels' => Hotel::all()
        ]);
    }
}
