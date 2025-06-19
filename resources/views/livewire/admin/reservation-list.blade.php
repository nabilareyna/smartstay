<div>
    <div>
        <div class="table-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Manajemen Reservasi</h5>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-custom btn-sm">
                        <i class="bi bi-funnel me-2"></i>Filter
                    </button>
                    <button class="btn btn-outline-custom btn-sm">
                        <i class="bi bi-download me-2"></i>Export
                    </button>
                    <button class="btn btn-primary-custom btn-sm">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Reservasi
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Reservasi</th>
                            <th>Tamu</th>
                            <th>Kamar</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reservations as $reservation)
                            <tr>
                                <td>#RSV{{ str_pad($reservation->id, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $reservation->user->name }}</td>
                                <td>{{ ucfirst($reservation->room->tipe). ' Room' ?? 'Kamar Tidak Ditemukan' }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservation->checkin)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservation->checkout)->format('d M Y') }}</td>
                                <td>Rp {{ number_format($reservation->room->harga * \Carbon\Carbon::parse($reservation->checkin)->diffInDays($reservation->checkout), 0, ',', '.') }}</td>
                                <td class="{{ $reservation->status === 'confirmed' ? 'text-success' : 'text-warning' }}">
                                    {{ ucfirst($reservation->status) }}
                                </td>
                                <td>
                                    <a href="/admin/reservation/detail/{{ $reservation->id }}"
                                        class="btn btn-outline-custom btn-sm">Detail</a>
                                    @if ($reservation->status === 'pending')
                                        <button class="btn btn-primary-custom btn-sm">Konfirmasi</button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">Belum ada data reservasi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
