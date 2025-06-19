<div>
    <div class="" id="">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-1">Semua Kamar Tersedia</h4>
                <p class="text-muted mb-0">Pilih kamar yang sesuai dengan kebutuhan Anda</p>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-outline-custom">
                    <i class="bi bi-funnel"></i>
                    Filter
                </button>
                <button class="btn btn-outline-custom">
                    <i class="bi bi-sort-down"></i>
                    Urutkan
                </button>
            </div>
        </div>

        <div class="rooms-grid">
            @forelse ($rooms as $room)
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
