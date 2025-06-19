<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-card">
                <h5 class="mb-3">Tambah Kamar Baru</h5>
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form id="roomForm" wire:submit.prevent="save">
                    <div class="mb-3">
                        <label for="roomNumber" class="form-label">Hotel</label>
                        <div class="col-sm-10">
                            <select name="hotel_id" wire:model="hotel_id" class="form-select">
                                <option value="">-- Pilih Hotel --</option>
                                @foreach ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}">{{ $hotel->nama_hotel }}</option>
                                @endforeach
                            </select>
                            @error('hotel_id')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="roomNumber" class="form-label">Nomor Kamar</label>
                        <input type="text" class="form-control" id="roomNumber" placeholder="Contoh: 205"
                            wire:model="nomor_kamar">
                        @error('nomor_kamar')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="roomImage" class="form-label">Gambar Kamar</label>
                        <input type="file" class="form-control" id="roomImage" wire:model="gambar">
                        @error('gambar')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="roomType" class="form-label">Tipe Kamar</label>
                        <select class="form-select" id="roomType" wire:model="tipe">
                            <option value="">Pilih Tipe Kamar</option>
                            <option value="standard">Standard Room</option>
                            <option value="deluxe">Deluxe Room</option>
                            <option value="suite">Suite Room</option>
                            <option value="presidential">Presidential Suite</option>
                        </select>
                        @error('tipe')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="roomPrice" class="form-label">Harga per Malam</label>
                        <input type="number" class="form-control" id="roomPrice" wire:model="harga"
                            placeholder="450000">
                        @error('harga')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="roomCapacity" class="form-label">Kapasitas Tamu</label>
                        <select class="form-select" id="roomCapacity" wire:model="max_person">
                            <option value="">Pilih Kapasitas</option>
                            <option value="1">1 Tamu</option>
                            <option value="2">2 Tamu</option>
                            <option value="3">3 Tamu</option>
                            <option value="4">4 Tamu</option>
                            <option value="6">6 Tamu</option>
                        </select>
                        @error('max_person')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="roomSize" class="form-label">Ukuran Kamar (m²)</label>
                        <input type="number" class="form-control" id="roomSize" placeholder="25"
                            wire:model="ukuran_kamar">
                        @error('ukuran_kamar')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="roomAmenities" class="form-label">Fasilitas</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model="fasilitas"
                                        value="AC" id="ac">
                                    <label class="form-check-label" for="ac">AC</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model="fasilitas"
                                        value="WiFi" id="wifi">
                                    <label class="form-check-label" for="wifi">WiFi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model="fasilitas"
                                        value="TV" id="tv">
                                    <label class="form-check-label" for="tv">TV</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model="fasilitas"
                                        value="Mini Bar" id="minibar">
                                    <label class="form-check-label" for="minibar">Mini Bar</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model="fasilitas"
                                        value="Balkon" id="balcony">
                                    <label class="form-check-label" for="balcony">Balkon</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model="fasilitas"
                                        value="Jacuzzi" id="jacuzzi">
                                    <label class="form-check-label" for="jacuzzi">Jacuzzi</label>
                                </div>
                            </div>
                        </div>
                        @error('fasilitas')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="roomStatus" class="form-label">Status</label>
                        <select class="form-select" id="roomStatus" wire:model="status">
                            <option value="available">Tersedia</option>
                            <option value="occupied">Terisi</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="cleaning">Cleaning</option>
                        </select>
                        @error('status')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary-custom w-100">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah Kamar
                    </button>
                </form>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="table-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Daftar Kamar</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-custom btn-sm">
                            <i class="bi bi-funnel me-2"></i>Filter
                        </button>
                        <button class="btn btn-outline-custom btn-sm">
                            <i class="bi bi-download me-2"></i>Export
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tipe</th>
                                <th>Harga</th>
                                <th>Kapasitas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rooms as $room)
                                <tr>
                                    <td>{{ $room->nomor_kamar }}</td>
                                    <td>{{ ucwords($room->tipe) }}</td>
                                    <td>Rp {{ number_format($room->harga, 0, ',', '.') }}</td>
                                    <td>{{ $room->max_person }} Tamu</td>
                                    <td>
                                        @php
                                            $statusClass = match ($room->status) {
                                                'available' => 'status-active',
                                                'occupied' => 'status-inactive',
                                                'maintenance', 'cleaning' => 'status-warning',
                                                default => '',
                                            };
                                        @endphp
                                        <span
                                            class="status-badge {{ $statusClass }}">{{ ucfirst($room->status) }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-custom btn-sm me-1"
                                            wire:click="$emit('editRoom', {{ $room->id }})">Edit</button>
                                        <button class="btn btn-danger-custom btn-sm"
                                            wire:click="confirmDelete({{ $room->id }})">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data kamar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
