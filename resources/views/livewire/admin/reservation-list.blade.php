<div>
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                Data Reservasi User
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama User</th>
                            <th>Tipe Kamar</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reservations as $index => $r)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $r->user->name }}</td>
                                <td>{{ $r->room->tipe }}</td>
                                <td>{{ $r->checkin }}</td>
                                <td>{{ $r->checkout }}</td>
                                <td>
                                    <span class="badge badge-{{ $r->status === 'paid' ? 'success' : 'warning' }} bg-black">
                                        {{ ucfirst($r->status) }}
                                    </span>
                                </td>
                                <td>
                                    {{-- Tombol detail atau verifikasi pembayaran --}}
                                    <a href="#" class="btn btn-sm btn-outline-primary">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada reservasi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
