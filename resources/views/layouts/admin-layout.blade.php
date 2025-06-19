<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SmartStay</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h4><i class="bi bi-house-heart me-2"></i>SmartStay</h4>
            <p>Admin Management System</p>
            <span class="admin-badge">Administrator</span>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-section-title">Dashboard</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard">
                            <i class="bi bi-grid-1x2"></i>
                            Overview
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Manajemen</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/room">
                            <i class="bi bi-door-open"></i>
                            Kelola Kamar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/employee">
                            <i class="bi bi-people"></i>
                            Kelola Karyawan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/reservation">
                            <i class="bi bi-calendar-check"></i>
                            Reservasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/payment">
                            <i class="bi bi-receipt"></i>
                            Transaksi
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <div class="nav-section-title">Keamanan</div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/panic-button">
                            <i class="bi bi-exclamation-triangle"></i>
                            Panic Alerts
                            <span class="nav-badge warning">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reports">
                            <i class="bi bi-file-earmark-text"></i>
                            Laporan
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#settings">
                            <i class="bi bi-gear"></i>
                            Pengaturan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <button class="btn btn-link d-lg-none p-0" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <div>
                    <h2 class="header-title">Dashboard Admin</h2>
                    <div class="breadcrumb-custom">SmartStay Admin / Dashboard</div>
                </div>
            </div>
            <div class="header-right">
                <div class="search-box">
                    <i class="bi bi-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Cari reservasi, kamar, karyawan...">
                </div>
                <button class="notification-btn">
                    <i class="bi bi-bell"></i>
                    <span class="notification-badge">5</span>
                </button>
                <div class="user-menu">
                    <div class="user-avatar">
                        A
                    </div>
                    <div class="user-info">
                        <h6>Admin User</h6>
                        <p>Administrator</p>
                    </div>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Dashboard Page -->
            @yield('space-work')

            <!-- Rooms Management Page -->


            <!-- Employees Management Page -->


            <!-- Reservations Page -->


            <!-- Transactions Page -->

            <!-- Panic Alerts Page -->

            <!-- Other pages placeholders -->
            <div class="page-section" id="analytics-page">
                <h4 class="mb-4">Analytics Dashboard</h4>
                <p>Analytics dan reporting akan segera tersedia.</p>
            </div>

            <div class="page-section" id="reports-page">
                <h4 class="mb-4">Laporan</h4>
                <p>Sistem laporan akan segera tersedia.</p>
            </div>

            <div class="page-section" id="settings-page">
                <h4 class="mb-4">Pengaturan Sistem</h4>
                <p>Pengaturan sistem akan segera tersedia.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
