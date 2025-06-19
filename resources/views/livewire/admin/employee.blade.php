<div>
    <div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-card">
                    <h5 class="mb-3">Tambah Karyawan Baru</h5>
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form id="employeeForm" wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="hotel_id">Hotel ID</label>
                            <div class="">
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
                            <label for="employeeName" class="form-label">Nama Lengkap</label>
                            <input type="text" wire:model.defer="nama" class="form-control" id="employeeName"
                                placeholder="John Doe">
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="employeeEmail" class="form-label">Email</label>
                            <input type="email" wire:model.defer="email" class="form-control" id="employeeEmail"
                                placeholder="john@smartstay.com">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="employeePhone" class="form-label">No. Handphone</label>
                            <input type="tel" class="form-control" id="employeePhone" wire:model.defer="no_telepon"
                                placeholder="081234567890">
                            @error('no_telepon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="employeePosition" class="form-label">Jabatan</label>
                            <select class="form-select" id="employeePosition" wire:model.defer="jabatan">
                                <option value="">Pilih Jabatan</option>
                                <option value="receptionist">Receptionist</option>
                                <option value="housekeeping">Housekeeping</option>
                                <option value="security">Security</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="manager">Manager</option>
                                <option value="chef">Chef</option>
                                <option value="waiter">Waiter</option>
                            </select>
                            @error('jabatan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="employeeDepartment" class="form-label">Departemen</label>
                            <select class="form-select" id="employeeDepartment" wire:model.defer="departemen">
                                <option value="">Pilih Departemen</option>
                                <option value="front-office">Front Office</option>
                                <option value="housekeeping">Housekeeping</option>
                                <option value="security">Security</option>
                                <option value="maintenance">Maintenance</option>
                                <option value="food-beverage">Food & Beverage</option>
                                <option value="management">Management</option>
                            </select>
                            @error('departemen')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="employeeStatus" class="form-label">Status</label>
                            <select class="form-select" id="employeeStatus" wire:model.defer="status">
                                <option value="active">Aktif</option>
                                <option value="inactive">Non-Aktif</option>
                                <option value="on-leave">Cuti</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success-custom w-100">
                            <i class="bi bi-person-plus me-2"></i>
                            {{ $isEdit ? 'Update Karyawan' : 'Tambah Karyawan' }}
                        </button>
                        @if ($isEdit)
                            <button type="button" wire:click="resetForm" class="btn btn-secondary">Batal</button>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="table-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Daftar Karyawan</h5>
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
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Departemen</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $emp)
                                    <tr>
                                        <td>{{ $emp->id }}</td>
                                        <td>{{ $emp->nama }}</td>
                                        <td>{{ $emp->email }}</td>
                                        <td>{{ $emp->no_telepon }}</td>
                                        <td>{{ $emp->jabatan }}</td>
                                        <td>{{ $emp->departemen }}</td>
                                        <td>{{ $emp->status }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning"
                                                wire:click="edit({{ $emp->id }})">Edit</button>
                                            <button class="btn btn-sm btn-danger"
                                                wire:click="delete({{ $emp->id }})"
                                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">Belum ada data karyawan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
