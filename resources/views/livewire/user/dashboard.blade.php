<div>
    <div class="" id="">
        <!-- Welcome Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="mb-2">Selamat Datang, {{ Auth::user()->name ?? 'User' }}! 👋
                                </h3>
                                <p class="text-muted mb-0">Temukan pengalaman menginap terbaik di SmartStay
                                </p>
                            </div>
                            <div class="d-none d-md-block">
                                <a href="#rooms" class="btn btn-primary-custom">
                                    <i class="bi bi-search"></i>
                                    Cari Kamar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="stat-number">{{ $totalReservations }}</div>
                <div class="stat-label">Total Reservasi</div>
            </div>

            <div class="stat-card" style="--card-color: var(--tertiary-color);">
                <div class="stat-header">
                    <div class="stat-icon" style="background: var(--tertiary-color);">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
                <div class="stat-number">{{ $activeReservations }}</div>
                <div class="stat-label">Reservasi Aktif</div>
            </div>

            <div class="stat-card" style="--card-color: var(--accent-color);">
                <div class="stat-header">
                    <div class="stat-icon" style="background: var(--accent-color); color: var(--primary-color);">
                        <i class="bi bi-clock-history"></i>
                    </div>
                </div>
                <div class="stat-number">{{ $historyCount }}</div>
                <div class="stat-label">Riwayat Menginap</div>
            </div>
        </div>

        <!-- Quick Actions & Featured Rooms -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Overview Kamar</h4>
                    <a href="/user/rooms" class="btn btn-outline-custom">
                        Lihat Semua Kamar
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Featured Rooms -->
        <div class="rooms-grid">
            @forelse ($popularRooms as $room)
                <div class="room-card">
                    <div class="position-relative">
                        <img src="{{ asset('storage/image/' . $room->gambar) }}" class="room-image"
                            alt="{{ $room->tipe }}">
                        <span class="room-badge badge-popular">Populer</span>
                    </div>
                    <div class="room-content">
                        <div class="room-header">
                            <h5 class="room-title">{{ ucwords($room->tipe) }} Room</h5>
                            <div class="room-price">
                                <div class="price-amount">Rp {{ number_format($room->harga, 0, ',', '.') }}</div>
                                <div class="price-period">per malam</div>
                            </div>
                        </div>
                        @if (str_contains(strtolower($room->tipe), 'suite'))
                            <p class="text-muted mb-3">Kamar nyaman dengan fasilitas lengkap untuk istirahat
                                yang
                                sempurna</p>
                        @elseif (str_contains(strtolower($room->tipe), 'deluxe'))
                            <p class="text-muted mb-3">Kamar mewah dengan pemandangan kota dan fasilitas
                                premium</p>
                        @else
                            <p class="text-muted mb-3">Suite mewah dengan ruang tamu terpisah fasilitas
                                eksklusif</p>
                        @endif
                        <div class="amenities">
                            @foreach (json_decode($room->fasilitas) as $item)
                                <span class="amenity-tag">{{ $item }}</span>
                            @endforeach
                        </div>
                        <div class="room-footer">
                            <div class="room-info">
                                <span><i class="bi bi-people"></i> {{ $room->max_person }} Tamu</span>
                                <span><i class="bi bi-rulers"></i> {{ $room->ukuran_kamar }}m²</span>
                            </div>
                            <a class="btn btn-primary-custom" href="/user/reservation/form">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Tidak ada kamar populer untuk ditampilkan.</p>
            @endforelse
        </div>
    </div>
</div>
