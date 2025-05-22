<div>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Buat Reservasi Kamar
            </div>

            <div class="card-body">
                <form wire:submit.prevent="reserve">
                    <div class="form-group">
                        <label for="room_id">Pilih Kamar</label>
                        <select wire:model="room_id" id="room_id" class="form-control">
                            <option value="">-- Pilih Kamar --</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">
                                    {{ $room->tipe }} - Rp{{ number_format($room->harga, 0, ',', '.') }}
                                    (Tersisa: {{ $room->jumlah_kamar }})
                                </option>
                            @endforeach
                        </select>
                        @error('room_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="checkin">Tanggal Check-in</label>
                        <input type="date" id="checkin" wire:model="checkin" class="form-control">
                        @error('checkin')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="checkout">Tanggal Check-out</label>
                        <input type="date" id="checkout" wire:model="checkout" class="form-control">
                        @error('checkout')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success" wire:loading.attr="disabled">
                        <span wire:loading.remove>Pesan Sekarang</span>
                        <span wire:loading>Memproses...</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
