<div>
    <div class="reservation-form-container">
        <div class="container mt-4">
            <div class="reservation-card shadow-sm">
                <div class="reservation-card-header">
                    <h4 class="reservation-card-title">
                        <i class="bi bi-calendar-check"></i>
                        Buat Reservasi Kamar
                    </h4>
                </div>

                <div class="reservation-card-body">
                    <!-- Information Box -->
                    <div class="reservation-info-box">
                        <h6 class="reservation-info-title">
                            <i class="bi bi-info-circle me-2"></i>
                            Informasi Reservasi
                        </h6>
                        <p class="reservation-info-text">
                            Silakan lengkapi formulir di bawah ini untuk melakukan reservasi kamar.
                            Pastikan tanggal dan tipe kamar yang dipilih sudah sesuai dengan kebutuhan Anda.
                        </p>
                    </div>

                    <form wire:submit.prevent="reserve">
                        <!-- Room Selection -->
                        <div class="reservation-form-group">
                            <label for="room_id" class="reservation-label">
                                <i class="bi bi-door-open me-2"></i>
                                Pilih Kamar
                            </label>
                            <select wire:model="room_id" id="room_id" class="reservation-form-select">
                                <option value="">-- Pilih Tipe Kamar --</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">
                                        {{ $room->tipe }} - Rp{{ number_format($room->harga, 0, ',', '.') }}/malam
                                        ({{ $room->jumlah_kamar }} kamar tersedia)
                                    </option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <small class="reservation-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Date Selection -->
                        <div class="reservation-date-row">
                            <div class="reservation-form-group">
                                <label for="checkin" class="reservation-label">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    Tanggal Check-in
                                </label>
                                <div class="reservation-date-group">
                                    <input type="date" id="checkin" wire:model="checkin"
                                        class="reservation-form-control" min="{{ date('Y-m-d') }}">
                                </div>
                                @error('checkin')
                                    <small class="reservation-error">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="reservation-form-group">
                                <label for="checkout" class="reservation-label">
                                    <i class="bi bi-calendar-x me-2"></i>
                                    Tanggal Check-out
                                </label>
                                <div class="reservation-date-group">
                                    <input type="date" id="checkout" wire:model="checkout"
                                        class="reservation-form-control" min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                </div>
                                @error('checkout')
                                    <small class="reservation-error">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="reservation-form-group">
                            <button type="submit" class="reservation-submit-btn" wire:loading.attr="disabled">
                                <span wire:loading.remove>
                                    <i class="bi bi-check-circle me-2"></i>
                                    Pesan Sekarang
                                </span>
                                <span wire:loading>
                                    <span class="loading-spinner"></span>
                                    Memproses Reservasi...
                                </span>
                            </button>
                        </div>

                        <!-- Loading Overlay -->
                        <div wire:loading class="reservation-loading-overlay">
                            <div class="reservation-loading-content">
                                <div class="reservation-loading-spinner"></div>
                                <p>Sedang memproses reservasi Anda...</p>
                            </div>
                        </div>
                    </form>

                    <!-- Hotel Policies -->
                    <div class="reservation-info-box mt-4">
                        <h6 class="reservation-info-title">
                            <i class="bi bi-shield-check me-2"></i>
                            Kebijakan Hotel
                        </h6>
                        <ul class="reservation-info-text mb-0" style="padding-left: 16px;">
                            <li>Check-in: 14:00 - 23:00 WIB</li>
                            <li>Check-out: 06:00 - 12:00 WIB</li>
                            <li>Pembatalan gratis hingga 24 jam sebelum check-in</li>
                            <li>Pembayaran dapat dilakukan di hotel atau melalui transfer</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal (if needed) -->
    @if (session()->has('success'))
        <div class="modal fade show" style="display: block;" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 text-center">
                        <div class="w-100">
                            <div class="text-success mb-3">
                                <i class="bi bi-check-circle-fill" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="modal-title">Reservasi Berhasil!</h4>
                        </div>
                    </div>
                    <div class="modal-body text-center">
                        <p class="mb-3">{{ session('success') }}</p>
                        <div class="reservation-details bg-light p-3 rounded">
                            <p class="mb-1"><strong>Kode Reservasi:</strong> <span
                                    class="text-primary">#{{ session('booking_code', 'RSV001234') }}</span></p>
                            <p class="mb-0"><strong>Email konfirmasi</strong> telah dikirim ke alamat email Anda.</p>
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-primary-custom"
                            onclick="window.location.href='/user/dashboard'">
                            Kembali ke Dashboard
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Auto-hide success modal after 5 seconds
            const successModal = document.querySelector('.modal.show');
            if (successModal) {
                setTimeout(() => {
                    successModal.style.display = 'none';
                }, 5000);
            }
        </script>
    @endif
</div>
