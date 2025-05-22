<div>
    <div class="pagetitle">
        <h1>Rooms</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Rooms</li>
            </ol>
        </nav>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h5>Input Room</h5>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form wire:submit.prevent="save">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Hotel ID:</label>
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

                    <div class="col-sm-10">
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" wire:model="gambar" id="">
                            <label class="col-sm-2 col-form-label">Gambar</label>
                        </div>
                        @error('gambar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Max Person:</label>
                        <div class="col-sm-10">
                            <div class="form-floating mb-3">
                                <div>
                                    <input type="number" wire:model="max_person" class="form-control">
                                    @error('max_person')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Jumlah Kamar:</label>
                        <div class="col-sm-10">
                            <div class="form-floating mb-3">
                                <div>
                                    <input type="number" wire:model="jumlah_kamar" class="form-control">
                                    @error('jumlah_kamar')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tipe:</label>
                        <div class="col-sm-10">
                            <div class="form-floating mb-3">
                                <div>
                                    <input type="text" wire:model="tipe" class="form-control">
                                    @error('tipe')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Harga:</label>
                        <div class="col-sm-10">
                            <div class="form-floating mb-3">
                                <div>
                                    <input type="number" wire:model="harga" class="form-control">
                                    @error('harga')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="" wire:navigate class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
