<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SmartStay</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #1A3636;
            --secondary-color: #40534C;
            --tertiary-color: #677D6A;
            --accent-color: #D6BD98;
            --accent-light: #E8D7BC;
            --light-color: #F5F1E8;
            --danger-color: #dc3545;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--light-color);
            color: var(--primary-color);
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(180deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-brand h4 {
            color: white;
            margin: 0;
            font-weight: 600;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            border-radius: 0;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .nav-link i {
            margin-right: 10px;
            width: 20px;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Header */
        .header {
            background: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: between;
            align-items: center;
        }

        .header-title {
            margin: 0;
            color: var(--primary-color);
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: var(--accent-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Content */
        .content {
            padding: 30px;
        }

        /* Cards */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border: none;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .stat-label {
            color: #6b7280;
            font-size: 0.9rem;
        }

        /* Room Cards */
        .room-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: none;
        }

        .room-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .room-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .room-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent-color);
            color: var(--primary-color);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .room-price {
            color: var(--secondary-color);
            font-size: 1.3rem;
            font-weight: 700;
        }

        .amenity-tag {
            background: var(--light-color);
            color: var(--secondary-color);
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            margin: 2px;
            display: inline-block;
        }

        /* Buttons */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--secondary-color), var(--tertiary-color));
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(64, 83, 76, 0.3);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }

        .btn-outline-custom {
            border: 2px solid var(--secondary-color);
            color: var(--secondary-color);
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 600;
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background: var(--secondary-color);
            color: white;
        }

        /* Panic Button */
        .panic-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 70px;
            height: 70px;
            background: var(--danger-color);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 24px;
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4);
            z-index: 999;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }

        .panic-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(220, 53, 69, 0.6);
        }

        @keyframes pulse {
            0% { box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4); }
            50% { box-shadow: 0 8px 25px rgba(220, 53, 69, 0.8); }
            100% { box-shadow: 0 8px 25px rgba(220, 53, 69, 0.4); }
        }

        /* Booking History */
        .booking-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 15px;
            border-left: 4px solid var(--secondary-color);
        }

        .booking-status {
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-confirmed {
            background: #d4edda;
            color: #155724;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-completed {
            background: #cce5ff;
            color: #004085;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .header {
                padding: 15px 20px;
            }

            .content {
                padding: 20px;
            }

            .panic-btn {
                bottom: 20px;
                right: 20px;
                width: 60px;
                height: 60px;
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h4><i class="bi bi-house-heart me-2"></i>SmartStay</h4>
        </div>
        <nav class="sidebar-nav">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#dashboard">
                        <i class="bi bi-speedometer2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#rooms">
                        <i class="bi bi-door-open"></i>
                        Kamar Tersedia
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#bookings">
                        <i class="bi bi-calendar-check"></i>
                        Reservasi Saya
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profile">
                        <i class="bi bi-person"></i>
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#help">
                        <i class="bi bi-question-circle"></i>
                        Bantuan
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link" href="/logout">
                        <i class="bi bi-box-arrow-right"></i>
                        Keluar
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header justify-between">
            <div class="d-flex align-items-center">
                <button class="btn btn-link d-md-none me-3" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h3 class="header-title">Dashboard</h3>
            </div>
            <div class="user-info">
                <span>Selamat datang, <strong>{{ Auth::user()->name ?? 'User' }}</strong></span>
                <div class="user-avatar">
                    {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #3498db, #2980b9);">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div class="stat-number">3</div>
                        <div class="stat-label">Total Reservasi</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #2ecc71, #27ae60);">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div class="stat-number">1</div>
                        <div class="stat-label">Reservasi Aktif</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #f39c12, #e67e22);">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="stat-number">2</div>
                        <div class="stat-label">Riwayat Menginap</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background: linear-gradient(135deg, #9b59b6, #8e44ad);">
                            <i class="bi bi-star"></i>
                        </div>
                        <div class="stat-number">4.8</div>
                        <div class="stat-label">Rating Rata-rata</div>
                    </div>
                </div>
            </div>

            <!-- Available Rooms Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4>Kamar Tersedia</h4>
                        <button class="btn btn-outline-custom">
                            <i class="bi bi-funnel me-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <!-- Standard Room -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card room-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="room-image" alt="Standard Room">
                            <span class="room-badge">Tersedia</span>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0">Standard Room</h5>
                                <div class="room-price">Rp 450K</div>
                            </div>
                            <p class="text-muted mb-3">Kamar nyaman dengan fasilitas lengkap untuk istirahat yang sempurna</p>

                            <div class="mb-3">
                                <span class="amenity-tag">AC</span>
                                <span class="amenity-tag">WiFi</span>
                                <span class="amenity-tag">TV</span>
                                <span class="amenity-tag">Kamar Mandi</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="bi bi-people me-1"></i>2 Tamu • 25m²
                                </small>
                                <button class="btn btn-primary-custom btn-sm">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deluxe Room -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card room-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="room-image" alt="Deluxe Room">
                            <span class="room-badge">Populer</span>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0">Deluxe Room</h5>
                                <div class="room-price">Rp 650K</div>
                            </div>
                            <p class="text-muted mb-3">Kamar mewah dengan pemandangan kota dan fasilitas premium</p>

                            <div class="mb-3">
                                <span class="amenity-tag">AC</span>
                                <span class="amenity-tag">WiFi</span>
                                <span class="amenity-tag">Smart TV</span>
                                <span class="amenity-tag">Mini Bar</span>
                                <span class="amenity-tag">Balkon</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="bi bi-people me-1"></i>2-3 Tamu • 35m²
                                </small>
                                <button class="btn btn-primary-custom btn-sm">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Suite Room -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card room-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="room-image" alt="Suite Room">
                            <span class="room-badge">Premium</span>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0">Suite Room</h5>
                                <div class="room-price">Rp 950K</div>
                            </div>
                            <p class="text-muted mb-3">Suite mewah dengan ruang tamu terpisah dan fasilitas eksklusif</p>

                            <div class="mb-3">
                                <span class="amenity-tag">AC</span>
                                <span class="amenity-tag">WiFi</span>
                                <span class="amenity-tag">Smart TV</span>
                                <span class="amenity-tag">Mini Bar</span>
                                <span class="amenity-tag">Jacuzzi</span>
                                <span class="amenity-tag">Living Room</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="bi bi-people me-1"></i>4 Tamu • 55m²
                                </small>
                                <button class="btn btn-primary-custom btn-sm">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings -->
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-3">Reservasi Terbaru</h4>

                    <div class="booking-card">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="mb-1">Deluxe Room - #RSV001</h6>
                                <p class="text-muted mb-2">15 Jan 2024 - 17 Jan 2024 • 2 malam</p>
                                <small class="text-muted">Check-in: 14:00 | Check-out: 12:00</small>
                            </div>
                            <div class="col-md-2">
                                <span class="booking-status status-confirmed">Dikonfirmasi</span>
                            </div>
                            <div class="col-md-2 text-end">
                                <div class="fw-bold">Rp 1.300.000</div>
                                <button class="btn btn-outline-custom btn-sm mt-2">Detail</button>
                            </div>
                        </div>
                    </div>

                    <div class="booking-card">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="mb-1">Standard Room - #RSV002</h6>
                                <p class="text-muted mb-2">20 Feb 2024 - 22 Feb 2024 • 2 malam</p>
                                <small class="text-muted">Check-in: 14:00 | Check-out: 12:00</small>
                            </div>
                            <div class="col-md-2">
                                <span class="booking-status status-pending">Menunggu</span>
                            </div>
                            <div class="col-md-2 text-end">
                                <div class="fw-bold">Rp 900.000</div>
                                <button class="btn btn-outline-custom btn-sm mt-2">Detail</button>
                            </div>
                        </div>
                    </div>

                    <div class="booking-card">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h6 class="mb-1">Suite Room - #RSV003</h6>
                                <p class="text-muted mb-2">10 Des 2023 - 12 Des 2023 • 2 malam</p>
                                <small class="text-muted">Check-in: 14:00 | Check-out: 12:00</small>
                            </div>
                            <div class="col-md-2">
                                <span class="booking-status status-completed">Selesai</span>
                            </div>
                            <div class="col-md-2 text-end">
                                <div class="fw-bold">Rp 1.900.000</div>
                                <button class="btn btn-outline-custom btn-sm mt-2">Review</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Panic Button -->
    <button class="panic-btn" data-bs-toggle="modal" data-bs-target="#panicModal">
        <i class="bi bi-exclamation-triangle"></i>
    </button>

    <!-- Panic Modal -->
    <div class="modal fade" id="panicModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Tombol Darurat
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <strong>Perhatian!</strong> Tombol ini hanya untuk situasi darurat. Tim keamanan akan segera dihubungi.
                    </div>
                    <div class="mb-3">
                        <label for="emergencyDescription" class="form-label">Deskripsi Situasi (Opsional)</label>
                        <textarea class="form-control" id="emergencyDescription" rows="3"
                                  placeholder="Jelaskan situasi darurat yang Anda alami..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger">
                        <i class="bi bi-telephone me-2"></i>
                        Hubungi Keamanan
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar Toggle for Mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');

            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Navigation
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.getAttribute('href').startsWith('#')) {
                    e.preventDefault();

                    // Remove active class from all links
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));

                    // Add active class to clicked link
                    this.classList.add('active');

                    // Update header title
                    const title = this.textContent.trim();
                    document.querySelector('.header-title').textContent = title;
                }
            });
        });

        // Room booking
        document.querySelectorAll('.btn-primary-custom').forEach(button => {
            if (button.textContent.includes('Pesan Sekarang')) {
                button.addEventListener('click', function() {
                    alert('Fitur booking akan segera tersedia!');
                });
            }
        });
    </script>
</body>
</html>
