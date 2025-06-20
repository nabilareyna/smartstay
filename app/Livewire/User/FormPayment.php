<?php

namespace App\Livewire\User;

use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;

class FormPayment extends Component
{
    public $reservation;
    public $metode;
    public $tanggal_pembayaran;
    public $total;

    public function mount($reservation_id = null)
    {
        $this->reservation = Reservation::with('room')
            ->where('id', $reservation_id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $checkin = Carbon::parse($this->reservation->checkin);
        $checkout = Carbon::parse($this->reservation->checkout);
        $durasi = $checkin->diffInDays($checkout);
        $this->total = $this->reservation->room->harga * $durasi;
    }

    public function pay()
    {
        $this->validate([
            'metode' => 'required|string',
            'tanggal_pembayaran' => 'required|date',
        ]);

        Payment::create([
            'reservation_id' => $this->reservation->id,
            'user_id' => Auth::id(),
            'metode' => $this->metode,
            'status' => 'pending',
            'total' => $this->total,
            'tanggal_pembayaran' => $this->tanggal_pembayaran,
        ]);

        $this->reservation->update(['status' => 'paid']);
        session()->flash('success', 'Pembayaran berhasil dikirim!');
        return redirect('/user/dashboard');
    }

    public function render()
    {
        return view('livewire.user.form-payment');
    }
}
