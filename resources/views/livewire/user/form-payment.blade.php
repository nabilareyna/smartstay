<div>
    <div class="reservation-form-container">
        <div class="container mt-4">
            <div class="reservation-card shadow-sm">
                <div class="reservation-card-header">
                    <h4 class="reservation-card-title">
                        <i class="bi bi-credit-card"></i>
                        Form Pembayaran Reservasi
                    </h4>
                </div>

                <div class="reservation-card-body">
                    <div class="reservation-info-box">
                        <h6 class="reservation-info-title">
                            <i class="bi bi-info-circle me-2"></i>
                            Informasi Pembayaran
                        </h6>
                        <p class="reservation-info-text">
                            Anda sedang melakukan pembayaran untuk reservasi kamar
                            <strong>{{ $reservation->room->tipe }}</strong> dari
                            <strong>{{ date('d M Y', strtotime($reservation->checkin)) }}</strong> sampai
                            <strong>{{ date('d M Y', strtotime($reservation->checkout)) }}</strong>.
                        </p>
                    </div>

                    <form wire:submit.prevent="pay">
                        <!-- Metode Pembayaran -->
                        <div class="reservation-form-group">
                            <label for="metode" class="reservation-label">
                                <i class="bi bi-wallet2 me-2"></i>
                                Metode Pembayaran
                            </label>
                            <select wire:model="metode" id="metode" class="reservation-form-select">
                                <option value="">-- Pilih Metode --</option>
                                <option value="transfer">Transfer Bank</option>
                                <option value="cash">Bayar di Tempat</option>
                            </select>
                            @error('metode')
                                <small class="reservation-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Tanggal Pembayaran -->
                        <div class="reservation-form-group">
                            <label for="tanggal_pembayaran" class="reservation-label">
                                <i class="bi bi-calendar-check me-2"></i>
                                Tanggal Pembayaran
                            </label>
                            <input type="date" wire:model="tanggal_pembayaran" id="tanggal_pembayaran"
                                class="reservation-form-control">
                            @error('tanggal_pembayaran')
                                <small class="reservation-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Total Pembayaran -->
                        <div class="reservation-form-group">
                            <label class="reservation-label">
                                <i class="bi bi-cash-stack me-2"></i>
                                Total Pembayaran
                            </label>
                            <input type="text" class="reservation-form-control" value="Rp{{ number_format($total, 0, ',', '.') }}" readonly>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="reservation-form-group">
                            <button type="submit" class="reservation-submit-btn" wire:loading.attr="disabled">
                                <span wire:loading.remove>
                                    <i class="bi bi-credit-card-2-front me-2"></i>
                                    Bayar Sekarang
                                </span>
                                <span wire:loading>
                                    <span class="loading-spinner"></span>
                                    Memproses Pembayaran...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    @if (session()->has('success'))
        <div class="modal fade show" style="display: block;" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 text-center">
                        <div class="w-100">
                            <div class="text-success mb-3">
                                <i class="bi bi-check-circle-fill" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="modal-title">Pembayaran Berhasil!</h4>
                        </div>
                    </div>
                    <div class="modal-body text-center">
                        <p class="mb-3">{{ session('success') }}</p>
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
            const successModal = document.querySelector('.modal.show');
            if (successModal) {
                setTimeout(() => {
                    successModal.style.display = 'none';
                }, 5000);
            }
        </script>
    @endif
</div>
