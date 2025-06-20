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

        // Buat reservasi
        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'checkin' => $this->checkin,
            'checkout' => $this->checkout,
            'status' => 'pending', // akan diupdate setelah pembayaran
        ]);

        $room->update([
            'status' => 'unavailable'
        ]);

        $bookingCode = 'RSV' . str_pad($reservation->id, 3, '0', STR_PAD_LEFT);

        session()->flash('success', 'Reservasi berhasil dibuat!');
        session()->flash('booking_code', $bookingCode);
        $this->reset();

        return redirect()->to('/user/payment/' . $reservation->id);
    }

    public function render()
    {
        return view('livewire.user.form-reservation', data: [
            'rooms' => Room::where('status', 'available')->get(),
        ]);
    }
}
