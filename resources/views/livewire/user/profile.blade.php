<div>
    <div class="" id="">
        <div class="row">
            <div class="col-md-8">
                <div class="form-card">
                    <h5 class="mb-4">Informasi Personal</h5>
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::user()->name ?? 'John Doe' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control"
                                    value="{{ Auth::user()->email ?? 'john@example.com' }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. Handphone</label>
                                <input type="tel" class="form-control" value="081234567890">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="bi bi-check-circle"></i>
                            Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-card">
                    <h6 class="mb-3">Preferensi</h6>
                    <div class="mb-3">
                        <label class="form-label">Bahasa</label>
                        <select class="form-select">
                            <option value="id">Bahasa Indonesia</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mata Uang</label>
                        <select class="form-select">
                            <option value="idr">IDR (Rupiah)</option>
                            <option value="usd">USD (Dollar)</option>
                        </select>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="emailNotif">
                        <label class="form-check-label" for="emailNotif">
                            Notifikasi Email
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="smsNotif">
                        <label class="form-check-label" for="smsNotif">
                            Notifikasi SMS
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
