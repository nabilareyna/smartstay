<div>
    <section>
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <div class="card alert alert-success">
                    <div class="card-body">
                        <h5 class="card-title">Booked!</h5>
                        <h2>5</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card alert alert-warning">
                    <div class="card-body">
                        <h5 class="card-title">Pending</h5>
                        <h2>5</h2>
                    </div>
                </div>
            </div>
            <div>
                <h5>Room List</h5>
            </div>
            <div class="col-lg-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hotel Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Max Person</th>
                            <th scope="col">Room Count</th>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rooms as $room)
                            <tr>
                                <td>{{ $room->id }}</td>
                                <td>{{ $room->hotel->nama_hotel ?? 'N/A' }}</td>
                                <td><img src="{{ asset('storage/image/' . $room->gambar) }}" width="100" />
                                </td>
                                <td>{{ $room->max_person }}</td>
                                <td>{{ $room->jumlah_kamar }}</td>
                                <td>{{ $room->tipe }}</td>
                                <td>{{ number_format($room->harga) }}</td>
                                <td>{{ $room->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Tidak ada data kamar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div>
                <h5>Employees List</h5>
            </div>
            <div class="col-lg-10">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Hotel Name</th>
                            <th scope="col">Name</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
