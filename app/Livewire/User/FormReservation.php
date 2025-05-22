<?php

namespace App\Livewire\User;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormReservation extends Component
{
    public $room_id;
    public $checkin;
    public $checkout;

    public function reserve()
    {
        $this->validate(
            [
                'room_id' => 'required|exists:rooms,id',
                'checkin' => 'required|date|after_or_equal:today',
                'checkout' => 'required|date|after:checkin',
            ],
            [
                'room_id.required' => 'Kamar wajib dipilih.',
                'room_id.exists' => 'Kamar tidak ditemukan.',
                'checkin.required' => 'Tanggal check-in wajib diisi.',
                'checkin.date' => 'Tanggal check-in tidak valid.',
                'checkin.after_or_equal' => 'Tanggal check-in tidak boleh sebelum hari ini.',
                'checkout.required' => 'Tanggal check-out wajib diisi.',
                'checkout.date' => 'Tanggal check-out tidak valid.',
                'checkout.after' => 'Tanggal check-out harus setelah check-in.',
            ]
        );

        $room = Room::find($this->room_id);


        // Cek ketersediaan kamar
        if ($room->jumlah_kamar < 1) {
            session()->flash('error', 'Kamar tidak tersedia.');
            return;
        }

        // Buat reservasi
        Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'checkin' => $this->checkin,
            'checkout' => $this->checkout,
            'status' => 'pending', // akan diupdate setelah pembayaran
        ]);

        // Kurangi jumlah kamar
        $room->decrement('jumlah_kamar');

        session()->flash('success', 'Reservasi berhasil dibuat!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.user.form-reservation', [
            'rooms' => Room::where('jumlah_kamar', '>', 0)->get()
        ]);
    }
}
