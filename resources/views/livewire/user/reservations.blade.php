<div>
    <div class="" id="">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Reservasi Saya</h4>
                <p class="text-muted mb-0">Kelola dan pantau semua reservasi Anda</p>
            </div>
            <button class="btn btn-primary-custom" href="/user/reservation/form">
                <i class="bi bi-plus-circle"></i>
                Buat Reservasi Baru
            </button>
        </div>

        @forelse ($reservations as $reservation)
            <div class="booking-card">
                <div class="booking-header">
                    <div>
                        <h6 class="booking-id">
                            {{ ucfirst($reservation->room->tipe). ' Room'?? 'Kamar Tidak Ditemukan' }} -
                            #RSV{{ str_pad($reservation->id, 3, '0', STR_PAD_LEFT) }}
                        </h6>
                        <p class="booking-dates">
                            {{ \Carbon\Carbon::parse($reservation->checkin)->format('d M Y') }} -
                            {{ \Carbon\Carbon::parse($reservation->checkout)->format('d M Y') }} •
                            {{ \Carbon\Carbon::parse($reservation->checkin)->diffInDays($reservation->checkout) }} malam
                        </p>
                        <p class="booking-details">Check-in: 14:00 | Check-out: 12:00</p>
                    </div>
                    <span
                        class="booking-status {{ $reservation->status === 'confirmed' ? 'status-confirmed' : 'status-pending' }}">
                        {{ ucfirst($reservation->status) }}
                    </span>
                </div>
                <div class="booking-footer">
                    {{-- Untuk demo, kamu bisa sesuaikan logika harga total --}}
                    <div class="booking-price">Rp
                        {{ number_format($reservation->room->harga * \Carbon\Carbon::parse($reservation->checkin)->diffInDays($reservation->checkout), 0, ',', '.') }}
                    </div>
                    <div class="d-flex gap-2">
                        <a href="/user/reservation/detail/{{ $reservation->id }}"
                            class="btn btn-outline-custom btn-sm">Detail</a>
                        <button class="btn btn-primary-custom btn-sm">Check-in</button>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">Kamu belum memiliki reservasi.</p>
        @endforelse

    </div>
</div>
