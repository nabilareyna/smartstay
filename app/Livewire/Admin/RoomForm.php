<?php

namespace App\Livewire\Admin;

use App\Models\Hotel;
use App\Models\Room;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class RoomForm extends Component
{
    use WithFileUploads;
    public $hotel_id, $nomor_kamar, $gambar, $max_person, $tipe, $harga,
    $ukuran_kamar, $status;
    public $fasilitas = []; // fasilitas sebagai array checkbox


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

    public $rooms = [];

    public function mount()
    {
        $this->loadRooms();
    }

    public function loadRooms()
    {
        $this->rooms = Room::orderBy('nomor_kamar')->get();
    }

    public function getHotelNameProperty()
    {
        return Hotel::find($this->hotel_id)?->nama_hotel ?? '-';
    }

    public function save()
    {
        logger('Form save method triggered');
        $this->validate([
            'hotel_id' => 'required',
            'nomor_kamar' => 'required|integer|unique:rooms,nomor_kamar',
            'gambar' => 'required|image|max:2048',
            'max_person' => 'required|integer|min:1',
            'tipe' => 'required',
            'harga' => 'required|numeric|min:0',
            'ukuran_kamar' => 'required|integer|min:1',
            'fasilitas' => 'required|array|min:1', // array dari checkbox
        ]);

        $photo_name = md5($this->gambar . microtime()) . '.' . $this->gambar->extension();
        $this->gambar->storeAs('image', $photo_name, 'public');

        // dd([
        //     'hotel_id' => $this->hotel_id,
        //     'nomor_kamar' => $this->nomor_kamar,
        //     'gambar' => $photo_name,
        //     'max_person' => $this->max_person,
        //     'tipe' => $this->tipe,
        //     'harga' => $this->harga,
        //     'ukuran_kamar' => $this->ukuran_kamar,
        //     'fasilitas' => implode(', ', $this->fasilitas),
        //     'status' => 'Available',
        // ]);

        Room::create([
            'hotel_id' => $this->hotel_id,
            'nomor_kamar' => $this->nomor_kamar,
            'gambar' => $photo_name,
            'max_person' => $this->max_person,
            'tipe' => $this->tipe,
            'harga' => $this->harga,
            'ukuran_kamar' => $this->ukuran_kamar,
            'fasilitas' => json_encode($this->fasilitas),
            'status' => 'Available',
        ]);

        session()->flash('success', 'Room berhasil ditambahkan!');
        $this->reset(); // Clear form after submit
        $this->loadRooms();
    }

    public function render()
    {
        return view('livewire.admin.room-form', [
            'hotels' => Hotel::all()
        ]);
    }
}
