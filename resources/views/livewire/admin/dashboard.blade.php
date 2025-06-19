<div>
    <div class="" id="">
        <!-- Panic Alert -->
        <div class="panic-alert" id="panicAlert">
            <h6 class="alert-heading">
                <i class="bi bi-exclamation-triangle me-2"></i>
                PANIC BUTTON ACTIVATED!
            </h6>
            <p class="mb-2">Emergency alert from Room 205 - Guest reported security issue</p>
            <div class="d-flex gap-2">
                <button class="btn btn-light btn-sm">Respond</button>
                <button class="btn btn-outline-light btn-sm">Dismiss</button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card" style="--card-color: var(--secondary-color);">
                <div class="stat-header">
                    <div class="stat-icon" style="background: var(--secondary-color);">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                </div>
                <div class="stat-number">{{ $todayReservations }}</div>
                <div class="stat-label">Total Reservasi Hari Ini</div>
            </div>

            <div class="stat-card" style="--card-color: var(--tertiary-color);">
                <div class="stat-header">
                    <div class="stat-icon" style="background: var(--tertiary-color);">
                        <i class="bi bi-door-open"></i>
                    </div>
                </div>
                <div class="stat-number">{{ $rooms }}</div>
                <div class="stat-label">Kamar Tersedia</div>
            </div>

            <div class="stat-card" style="--card-color: var(--accent-color);">
                <div class="stat-header">
                    <div class="stat-icon" style="background: var(--accent-color); color: var(--primary-color);">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                </div>
                <div class="stat-number">Rp 0</div>
                <div class="stat-label">Revenue Bulan Ini</div>
            </div>

            <div class="stat-card" style="--card-color: var(--primary-color);">
                <div class="stat-header">
                    <div class="stat-icon" style="background: var(--primary-color);">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
                <div class="stat-number">{{ $employees }}</div>
                <div class="stat-label">Total Karyawan</div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="row">
            <div class="col-lg-8">
                <div class="table-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Reservasi Terbaru</h5>
                        <button class="btn btn-outline-custom btn-sm">
                            Lihat Semua
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tamu</th>
                                    <th>Kamar</th>
                                    <th>Check-in</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentReservations as $reservation)
                                <tr>
                                    <td class="text-center py-4">{{ $reservation->id  }}</td>
                                    <td class="text-center py-4">{{ $reservation->user->name ?? '-' }}</td>
                                    <td class="text-center py-4">{{ $reservation->room->nomor_kamar ?? '-' }}</td>
                                    <td class="text-center py-4">{{ \Carbon\Carbon::parse($reservation->checkin)->format('d M Y') }}</td>
                                    <td class="text-center py-4">{{ ucfirst($reservation->status) }}</td>
                                    <td>Rp {{ number_format($reservation->room->harga * \Carbon\Carbon::parse($reservation->checkin)->diffInDays($reservation->checkout), 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">Belum ada data reservasi</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-card">
                    <h5 class="mb-3">Quick Actions</h5>
                    <div class="d-grid gap-2">
                        <a href="/admin/room" class="btn btn-primary-custom">
                            <i class="bi bi-plus-circle me-2"></i>
                            Tambah Kamar
                        </a>
                        <a href="/admin/employee" class="btn btn-success-custom">
                            <i class="bi bi-person-plus me-2"></i>
                            Tambah Karyawan
                        </a>
                        <a href="#reports" class="btn btn-warning-custom">
                            <i class="bi bi-file-earmark-text me-2"></i>
                            Generate Laporan
                        </a>
                        <a href="#panic-alerts" class="btn btn-danger-custom">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Lihat Panic Alert
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
