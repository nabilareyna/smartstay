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

    <style>
        :root {
            --primary-color: #1A3636;
            --secondary-color: #40534C;
            --tertiary-color: #677D6A;
            --accent-color: #D6BD98;
            --accent-light: #E8D7BC;
            --light-color: #F5F1E8;
            --white: #FFFFFF;
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;
            --danger-color: #dc3545;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --info-color: #17a2b8;
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }

        body {
            background: linear-gradient(135deg, var(--light-color) 0%, var(--accent-light) 100%);
            color: var(--primary-color);
            font-size: 14px;
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            min-height: 100vh;
            width: 280px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid var(--gray-200);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        .sidebar-brand h4 {
            color: var(--white);
            margin: 0;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .sidebar-brand p {
            color: var(--accent-light);
            margin: 0;
            font-size: 0.875rem;
            opacity: 0.9;
        }

        .admin-badge {
            background: var(--accent-color);
            color: var(--primary-color);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-top: 8px;
            display: inline-block;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-section {
            margin-bottom: 32px;
        }

        .nav-section-title {
            padding: 0 20px 8px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--white);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .nav-item {
            margin-bottom: 4px;
        }

        .nav-link {
            color: var(--white);
            padding: 12px 20px;
            border-radius: 0;
            transition: all 0.2s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-weight: 500;
            position: relative;
        }

        .nav-link:hover {
            background: var(--gray-50);
            color: var(--primary-color);
            transform: translateX(4px);
        }

        .nav-link.active {
            background: linear-gradient(90deg, var(--accent-light), transparent);
            color: var(--primary-color);
            font-weight: 600;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-color);
        }

        .nav-link i {
            margin-right: 12px;
            width: 20px;
            font-size: 18px;
        }

        .nav-badge {
            background: var(--danger-color);
            color: var(--white);
            font-size: 0.75rem;
            padding: 2px 6px;
            border-radius: 10px;
            margin-left: auto;
        }

        .nav-badge.warning {
            background: var(--warning-color);
            color: var(--gray-800);
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, var(--light-color) 0%, var(--accent-light) 100%);
            padding: 20px 32px;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(8px);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .header-title {
            margin: 0;
            color: var(--gray-900);
            font-weight: 700;
            font-size: 1.75rem;
        }

        .breadcrumb-custom {
            color: var(--gray-500);
            font-size: 0.875rem;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .search-box {
            position: relative;
            width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 10px 16px 10px 40px;
            border: 1px solid var(--gray-300);
            border-radius: 12px;
            background: var(--gray-50);
            transition: all 0.2s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(26, 54, 54, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
        }

        .notification-btn {
            position: relative;
            background: var(--gray-100);
            border: none;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            transition: all 0.2s ease;
        }

        .notification-btn:hover {
            background: var(--gray-200);
            color: var(--primary-color);
        }

        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 18px;
            height: 18px;
            background: var(--danger-color);
            color: var(--white);
            border-radius: 50%;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 12px;
            border-radius: 12px;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .user-menu:hover {
            background: var(--gray-100);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1rem;
        }

        .user-info h6 {
            margin: 0;
            font-weight: 600;
            color: var(--gray-900);
            font-size: 0.875rem;
        }

        .user-info p {
            margin: 0;
            color: var(--gray-500);
            font-size: 0.75rem;
        }

        /* Content */
        .content {
            padding: 32px;
        }

        .page-section {
            display: none;
        }

        .page-section.active {
            display: block;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--white);
            border-radius: 16px;
            padding: 24px;
            border: 1px solid var(--gray-200);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--card-color, var(--primary-color));
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--white);
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .trend-up {
            color: var(--success-color);
        }

        .trend-down {
            color: var(--danger-color);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 4px;
            line-height: 1;
        }

        .stat-label {
            color: var(--gray-600);
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Form Styles */
        .form-card {
            background: var(--white);
            border-radius: 16px;
            padding: 24px;
            border: 1px solid var(--gray-200);
            margin-bottom: 24px;
        }

        .form-label {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(26, 54, 54, 0.25);
        }

        .form-select {
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(26, 54, 54, 0.25);
        }

        /* Buttons */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            color: var(--white);
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(26, 54, 54, 0.3);
            background: linear-gradient(135deg, var(--secondary-color), var(--tertiary-color));
            color: var(--white);
        }

        .btn-outline-custom {
            border: 2px solid var(--gray-300);
            color: var(--gray-700);
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            background: var(--white);
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .btn-outline-custom:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background: var(--gray-50);
        }

        .btn-success-custom {
            background: var(--success-color);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            color: var(--white);
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .btn-success-custom:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
        }

        .btn-warning-custom {
            background: var(--warning-color);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            color: var(--gray-800);
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .btn-warning-custom:hover {
            background: #e0a800;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 193, 7, 0.3);
        }

        .btn-danger-custom {
            background: var(--danger-color);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            color: var(--white);
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .btn-danger-custom:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(220, 53, 69, 0.3);
        }

        /* Tables */
        .table-card {
            background: var(--white);
            border-radius: 16px;
            padding: 24px;
            border: 1px solid var(--gray-200);
            overflow: hidden;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background: var(--gray-50);
            color: var(--gray-700);
            font-weight: 600;
            border: none;
            padding: 16px;
        }

        .table td {
            padding: 16px;
            border-color: var(--gray-200);
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: var(--gray-50);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .status-active {
            background: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }

        .status-inactive {
            background: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
        }

        .status-confirmed {
            background: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }

        .status-pending {
            background: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
        }

        .status-cancelled {
            background: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
        }

        /* Panic Alert */
        .panic-alert {
            background: linear-gradient(135deg, var(--danger-color), #c82333);
            color: var(--white);
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 24px;
            border: none;
            animation: pulse-alert 2s infinite;
        }

        @keyframes pulse-alert {
            0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(220, 53, 69, 0); }
            100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
        }

        .panic-alert .alert-heading {
            color: var(--white);
            margin-bottom: 8px;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .search-box {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 16px 20px;
            }

            .content {
                padding: 20px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .header-title {
                font-size: 1.5rem;
            }

            .table-responsive {
                border-radius: 12px;
            }
        }
    </style>
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
                        <a class="nav-link active" href="#dashboard" data-page="dashboard">
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
                        <a class="nav-link" href="#rooms" data-page="rooms">
                            <i class="bi bi-door-open"></i>
                            Kelola Kamar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#employees" data-page="employees">
                            <i class="bi bi-people"></i>
                            Kelola Karyawan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reservations" data-page="reservations">
                            <i class="bi bi-calendar-check"></i>
                            Reservasi
                            <span class="nav-badge">12</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#transactions" data-page="transactions">
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
                        <a class="nav-link" href="#panic-alerts" data-page="panic-alerts">
                            <i class="bi bi-exclamation-triangle"></i>
                            Panic Alerts
                            <span class="nav-badge warning">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reports" data-page="reports">
                            <i class="bi bi-file-earmark-text"></i>
                            Laporan
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav-section">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="logout()">
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
            <div class="page-section active" id="dashboard-page">
                <!-- Panic Alert -->
                <div class="panic-alert" id="panicAlert" style="display: none;">
                    <h6 class="alert-heading">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        PANIC BUTTON ACTIVATED!
                    </h6>
                    <p class="mb-2">Emergency alert from Room 205 - Guest reported security issue</p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-light btn-sm">Respond</button>
                        <button class="btn btn-outline-light btn-sm" onclick="dismissPanic()">Dismiss</button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card" style="--card-color: var(--secondary-color);">
                        <div class="stat-header">
                            <div class="stat-icon" style="background: var(--secondary-color);">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                +15%
                            </div>
                        </div>
                        <div class="stat-number">47</div>
                        <div class="stat-label">Total Reservasi Hari Ini</div>
                    </div>

                    <div class="stat-card" style="--card-color: var(--tertiary-color);">
                        <div class="stat-header">
                            <div class="stat-icon" style="background: var(--tertiary-color);">
                                <i class="bi bi-door-open"></i>
                            </div>
                            <div class="stat-trend trend-down">
                                <i class="bi bi-arrow-down"></i>
                                -3%
                            </div>
                        </div>
                        <div class="stat-number">23</div>
                        <div class="stat-label">Kamar Tersedia</div>
                    </div>

                    <div class="stat-card" style="--card-color: var(--primary-color);">
                        <div class="stat-header">
                            <div class="stat-icon" style="background: var(--primary-color);">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="stat-trend trend-up">
                                <i class="bi bi-arrow-up"></i>
                                +2
                            </div>
                        </div>
                        <div class="stat-number">28</div>
                        <div class="stat-label">Total Karyawan</div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="table-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Reservasi Terbaru</h5>
                                <button class="btn btn-outline-custom btn-sm" onclick="showPage('reservations')">
                                    Lihat Semua
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tamu</th>
                                            <th>Kamar</th>
                                            <th>Check-in</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#RSV001</td>
                                            <td>John Doe</td>
                                            <td>Deluxe Room 205</td>
                                            <td>15 Jan 2024</td>
                                            <td><span class="status-badge status-confirmed">Confirmed</span></td>
                                            <td>Rp 1.300.000</td>
                                        </tr>
                                        <tr>
                                            <td>#RSV002</td>
                                            <td>Jane Smith</td>
                                            <td>Suite Room 301</td>
                                            <td>16 Jan 2024</td>
                                            <td><span class="status-badge status-pending">Pending</span></td>
                                            <td>Rp 1.900.000</td>
                                        </tr>
                                        <tr>
                                            <td>#RSV003</td>
                                            <td>Bob Johnson</td>
                                            <td>Standard Room 102</td>
                                            <td>17 Jan 2024</td>
                                            <td><span class="status-badge status-confirmed">Confirmed</span></td>
                                            <td>Rp 900.000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-card">
                            <h5 class="mb-3">Quick Actions</h5>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary-custom" onclick="showPage('rooms')">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Tambah Kamar
                                </button>
                                <button class="btn btn-success-custom" onclick="showPage('employees')">
                                    <i class="bi bi-person-plus me-2"></i>
                                    Tambah Karyawan
                                </button>
                                <button class="btn btn-warning-custom" onclick="showPage('reports')">
                                    <i class="bi bi-file-earmark-text me-2"></i>
                                    Generate Laporan
                                </button>
                                <button class="btn btn-danger-custom" onclick="showPanicAlert()">
                                    <i class="bi bi-exclamation-triangle me-2"></i>
                                    Test Panic Alert
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rooms Management Page -->
            <div class="page-section" id="rooms-page">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-card">
                            <h5 class="mb-3">Tambah Kamar Baru</h5>
                            <form id="roomForm">
                                <div class="mb-3">
                                    <label for="roomNumber" class="form-label">Nomor Kamar</label>
                                    <input type="text" class="form-control" id="roomNumber" placeholder="Contoh: 205">
                                </div>
                                <div class="mb-3">
                                    <label for="roomNumber" class="form-label">Gambar Kamar</label>
                                    <input type="file" class="form-control" id="roomNumber" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="roomType" class="form-label">Tipe Kamar</label>
                                    <select class="form-select" id="roomType">
                                        <option value="">Pilih Tipe Kamar</option>
                                        <option value="standard">Standard Room</option>
                                        <option value="deluxe">Deluxe Room</option>
                                        <option value="suite">Suite Room</option>
                                        <option value="presidential">Presidential Suite</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="roomPrice" class="form-label">Harga per Malam</label>
                                    <input type="number" class="form-control" id="roomPrice" placeholder="450000">
                                </div>
                                <div class="mb-3">
                                    <label for="roomCapacity" class="form-label">Kapasitas Tamu</label>
                                    <select class="form-select" id="roomCapacity">
                                        <option value="">Pilih Kapasitas</option>
                                        <option value="1">1 Tamu</option>
                                        <option value="2">2 Tamu</option>
                                        <option value="3">3 Tamu</option>
                                        <option value="4">4 Tamu</option>
                                        <option value="6">6 Tamu</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="roomSize" class="form-label">Ukuran Kamar (m²)</label>
                                    <input type="number" class="form-control" id="roomSize" placeholder="25">
                                </div>
                                <div class="mb-3">
                                    <label for="roomAmenities" class="form-label">Fasilitas</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="ac">
                                                <label class="form-check-label" for="ac">AC</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="wifi">
                                                <label class="form-check-label" for="wifi">WiFi</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="tv">
                                                <label class="form-check-label" for="tv">TV</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="minibar">
                                                <label class="form-check-label" for="minibar">Mini Bar</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="balcony">
                                                <label class="form-check-label" for="balcony">Balkon</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="jacuzzi">
                                                <label class="form-check-label" for="jacuzzi">Jacuzzi</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="roomStatus" class="form-label">Status</label>
                                    <select class="form-select" id="roomStatus">
                                        <option value="available">Tersedia</option>
                                        <option value="occupied">Terisi</option>
                                        <option value="maintenance">Maintenance</option>
                                        <option value="cleaning">Cleaning</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary-custom w-100">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Tambah Kamar
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="table-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Daftar Kamar</h5>
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
                                            <th>Nomor</th>
                                            <th>Tipe</th>
                                            <th>Harga</th>
                                            <th>Kapasitas</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>101</td>
                                            <td>Standard Room</td>
                                            <td>Rp 450.000</td>
                                            <td>2 Tamu</td>
                                            <td><span class="status-badge status-active">Available</span></td>
                                            <td>
                                                <button class="btn btn-outline-custom btn-sm me-1">Edit</button>
                                                <button class="btn btn-danger-custom btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>102</td>
                                            <td>Standard Room</td>
                                            <td>Rp 450.000</td>
                                            <td>2 Tamu</td>
                                            <td><span class="status-badge status-inactive">Occupied</span></td>
                                            <td>
                                                <button class="btn btn-outline-custom btn-sm me-1">Edit</button>
                                                <button class="btn btn-danger-custom btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>205</td>
                                            <td>Deluxe Room</td>
                                            <td>Rp 650.000</td>
                                            <td>3 Tamu</td>
                                            <td><span class="status-badge status-active">Available</span></td>
                                            <td>
                                                <button class="btn btn-outline-custom btn-sm me-1">Edit</button>
                                                <button class="btn btn-danger-custom btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Employees Management Page -->
            <div class="page-section" id="employees-page">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-card">
                            <h5 class="mb-3">Tambah Karyawan Baru</h5>
                            <form id="employeeForm">
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="employeeName" placeholder="John Doe">
                                </div>
                                <div class="mb-3">
                                    <label for="employeePosition" class="form-label">Posisi</label>
                                    <select class="form-select" id="employeePosition">
                                        <option value="">Pilih Posisi</option>
                                        <option value="receptionist">Receptionist</option>
                                        <option value="housekeeping">Housekeeping</option>
                                        <option value="security">Security</option>
                                        <option value="maintenance">Maintenance</option>
                                        <option value="manager">Manager</option>
                                        <option value="chef">Chef</option>
                                        <option value="waiter">Waiter</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="employeeDepartment" class="form-label">Departemen</label>
                                    <select class="form-select" id="employeeDepartment">
                                        <option value="">Pilih Departemen</option>
                                        <option value="front-office">Front Office</option>
                                        <option value="housekeeping">Housekeeping</option>
                                        <option value="security">Security</option>
                                        <option value="maintenance">Maintenance</option>
                                        <option value="food-beverage">Food & Beverage</option>
                                        <option value="management">Management</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="employeeStatus" class="form-label">Status</label>
                                    <select class="form-select" id="employeeStatus">
                                        <option value="active">Aktif</option>
                                        <option value="inactive">Non-Aktif</option>
                                        <option value="on-leave">Cuti</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success-custom w-100">
                                    <i class="bi bi-person-plus me-2"></i>
                                    Tambah Karyawan
                                </button>
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
                                            <th>Posisi</th>
                                            <th>Departemen</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EMP001</td>
                                            <td>Sarah Johnson</td>
                                            <td>Receptionist</td>
                                            <td>Front Office</td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>
                                                <button class="btn btn-outline-custom btn-sm me-1">Edit</button>
                                                <button class="btn btn-danger-custom btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>EMP002</td>
                                            <td>Mike Wilson</td>
                                            <td>Security</td>
                                            <td>Security</td>
                                            <td><span class="status-badge status-active">Active</span></td>
                                            <td>
                                                <button class="btn btn-outline-custom btn-sm me-1">Edit</button>
                                                <button class="btn btn-danger-custom btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>EMP003</td>
                                            <td>Lisa Brown</td>
                                            <td>Housekeeping</td>
                                            <td>Housekeeping</td>
                                            <td><span class="status-badge status-inactive">On Leave</span></td>
                                            <td>
                                                <button class="btn btn-outline-custom btn-sm me-1">Edit</button>
                                                <button class="btn btn-danger-custom btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reservations Page -->
            <div class="page-section" id="reservations-page">
                <div class="table-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Manajemen Reservasi</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-custom btn-sm">
                                <i class="bi bi-funnel me-2"></i>Filter
                            </button>
                            <button class="btn btn-outline-custom btn-sm">
                                <i class="bi bi-download me-2"></i>Export
                            </button>
                            <button class="btn btn-primary-custom btn-sm">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Reservasi
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Reservasi</th>
                                    <th>Tamu</th>
                                    <th>Kamar</th>
                                    <th>Check-in</th>
                                    <th>Check-out</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#RSV001</td>
                                    <td>
                                        <div>
                                            <strong>John Doe</strong><br>
                                            <small class="text-muted">john@email.com</small>
                                        </div>
                                    </td>
                                    <td>Deluxe Room 205</td>
                                    <td>15 Jan 2024</td>
                                    <td>17 Jan 2024</td>
                                    <td>Rp 1.300.000</td>
                                    <td><span class="status-badge status-confirmed">Confirmed</span></td>
                                    <td>
                                        <button class="btn btn-outline-custom btn-sm me-1">View</button>
                                        <button class="btn btn-warning-custom btn-sm me-1">Edit</button>
                                        <button class="btn btn-danger-custom btn-sm">Cancel</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#RSV002</td>
                                    <td>
                                        <div>
                                            <strong>Jane Smith</strong><br>
                                            <small class="text-muted">jane@email.com</small>
                                        </div>
                                    </td>
                                    <td>Suite Room 301</td>
                                    <td>16 Jan 2024</td>
                                    <td>18 Jan 2024</td>
                                    <td>Rp 1.900.000</td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                    <td>
                                        <button class="btn btn-outline-custom btn-sm me-1">View</button>
                                        <button class="btn btn-success-custom btn-sm me-1">Confirm</button>
                                        <button class="btn btn-danger-custom btn-sm">Cancel</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#RSV003</td>
                                    <td>
                                        <div>
                                            <strong>Bob Johnson</strong><br>
                                            <small class="text-muted">bob@email.com</small>
                                        </div>
                                    </td>
                                    <td>Standard Room 102</td>
                                    <td>17 Jan 2024</td>
                                    <td>19 Jan 2024</td>
                                    <td>Rp 900.000</td>
                                    <td><span class="status-badge status-confirmed">Confirmed</span></td>
                                    <td>
                                        <button class="btn btn-outline-custom btn-sm me-1">View</button>
                                        <button class="btn btn-warning-custom btn-sm me-1">Edit</button>
                                        <button class="btn btn-danger-custom btn-sm">Cancel</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Transactions Page -->
            <div class="page-section" id="transactions-page">
                <div class="table-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Laporan Transaksi</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-custom btn-sm">
                                <i class="bi bi-calendar me-2"></i>Filter Tanggal
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
                                    <th>ID Transaksi</th>
                                    <th>Reservasi</th>
                                    <th>Tamu</th>
                                    <th>Tanggal</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#TXN001</td>
                                    <td>#RSV001</td>
                                    <td>John Doe</td>
                                    <td>15 Jan 2024</td>
                                    <td>Credit Card</td>
                                    <td>Rp 1.300.000</td>
                                    <td><span class="status-badge status-confirmed">Paid</span></td>
                                    <td>
                                        <button class="btn btn-outline-custom btn-sm me-1">View</button>
                                        <button class="btn btn-primary-custom btn-sm">Invoice</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#TXN002</td>
                                    <td>#RSV002</td>
                                    <td>Jane Smith</td>
                                    <td>16 Jan 2024</td>
                                    <td>Bank Transfer</td>
                                    <td>Rp 1.900.000</td>
                                    <td><span class="status-badge status-pending">Pending</span></td>
                                    <td>
                                        <button class="btn btn-outline-custom btn-sm me-1">View</button>
                                        <button class="btn btn-warning-custom btn-sm">Follow Up</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#TXN003</td>
                                    <td>#RSV003</td>
                                    <td>Bob Johnson</td>
                                    <td>17 Jan 2024</td>
                                    <td>Cash</td>
                                    <td>Rp 900.000</td>
                                    <td><span class="status-badge status-confirmed">Paid</span></td>
                                    <td>
                                        <button class="btn btn-outline-custom btn-sm me-1">View</button>
                                        <button class="btn btn-primary-custom btn-sm">Invoice</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Panic Alerts Page -->
            <div class="page-section" id="panic-alerts-page">
                <div class="table-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Panic Button Alerts</h5>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-custom btn-sm">
                                <i class="bi bi-funnel me-2"></i>Filter
                            </button>
                            <button class="btn btn-danger-custom btn-sm" onclick="showPanicAlert()">
                                <i class="bi bi-exclamation-triangle me-2"></i>Test Alert
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Alert</th>
                                    <th>Lokasi</th>
                                    <th>Tamu/Karyawan</th>
                                    <th>Waktu</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#PA001</td>
                                    <td>Room 205</td>
                                    <td>John Doe (Guest)</td>
                                    <td>15 Jan 2024 14:30</td>
                                    <td>Security issue reported</td>
                                    <td><span class="status-badge status-pending">Active</span></td>
                                    <td>
                                        <button class="btn btn-success-custom btn-sm me-1">Respond</button>
                                        <button class="btn btn-outline-custom btn-sm">Dismiss</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#PA002</td>
                                    <td>Lobby</td>
                                    <td>Sarah Johnson (Staff)</td>
                                    <td>14 Jan 2024 09:15</td>
                                    <td>Medical emergency</td>
                                    <td><span class="status-badge status-confirmed">Resolved</span></td>
                                    <td>
                                        <button class="btn btn-outline-custom btn-sm">View Report</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#PA003</td>
                                    <td>Room 301</td>
                                    <td>Jane Smith (Guest)</td>
                                    <td>13 Jan 2024 22:45</td>
                                    <td>Suspicious activity</td>
                                    <td><span class="status-badge status-confirmed">Resolved</span></td>
                                    <td>
                                        <button class="btn btn-outline-custom btn-sm">View Report</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="page-section" id="reports-page">
                <h4 class="mb-4">Laporan</h4>
                <p>Sistem laporan akan segera tersedia.</p>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Navigation System
        function showPage(pageId) {
            // Hide all pages
            document.querySelectorAll('.page-section').forEach(page => {
                page.classList.remove('active');
            });

            // Show selected page
            document.getElementById(pageId + '-page').classList.add('active');

            // Update navigation
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });

            const activeLink = document.querySelector(`[data-page="${pageId}"]`);
            if (activeLink) {
                activeLink.classList.add('active');
            }

            // Update header title and breadcrumb
            const titles = {
                'dashboard': 'Dashboard Admin',
                'analytics': 'Analytics',
                'rooms': 'Kelola Kamar',
                'employees': 'Kelola Karyawan',
                'reservations': 'Manajemen Reservasi',
                'transactions': 'Laporan Transaksi',
                'panic-alerts': 'Panic Button Alerts',
                'reports': 'Laporan',
                'settings': 'Pengaturan Sistem'
            };

            document.querySelector('.header-title').textContent = titles[pageId] || 'Dashboard Admin';
            document.querySelector('.breadcrumb-custom').textContent = `SmartStay Admin / ${titles[pageId] || 'Dashboard'}`;
        }

        // Sidebar Toggle for Mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Navigation Links
        document.querySelectorAll('.nav-link[data-page]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const pageId = this.getAttribute('data-page');
                showPage(pageId);

                // Close sidebar on mobile
                if (window.innerWidth <= 1024) {
                    document.getElementById('sidebar').classList.remove('show');
                }
            });
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');

            if (window.innerWidth <= 1024) {
                if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });

        // Form Submissions
        document.getElementById('roomForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const roomData = {
                number: document.getElementById('roomNumber').value,
                type: document.getElementById('roomType').value,
                price: document.getElementById('roomPrice').value,
                capacity: document.getElementById('roomCapacity').value,
                size: document.getElementById('roomSize').value,
                status: document.getElementById('roomStatus').value
            };

            // Get amenities
            const amenities = [];
            document.querySelectorAll('#roomForm input[type="checkbox"]:checked').forEach(checkbox => {
                amenities.push(checkbox.id);
            });
            roomData.amenities = amenities;

            console.log('Room Data:', roomData);
            alert('Kamar berhasil ditambahkan!');

            // Reset form
            this.reset();
        });

        document.getElementById('employeeForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const employeeData = {
                name: document.getElementById('employeeName').value,
                email: document.getElementById('employeeEmail').value,
                phone: document.getElementById('employeePhone').value,
                position: document.getElementById('employeePosition').value,
                department: document.getElementById('employeeDepartment').value,
                salary: document.getElementById('employeeSalary').value,
                startDate: document.getElementById('employeeStartDate').value,
                status: document.getElementById('employeeStatus').value
            };

            console.log('Employee Data:', employeeData);
            alert('Karyawan berhasil ditambahkan!');

            // Reset form
            this.reset();
        });

        // Panic Alert Functions
        function showPanicAlert() {
            const panicAlert = document.getElementById('panicAlert');
            panicAlert.style.display = 'block';

            // Auto hide after 10 seconds
            setTimeout(() => {
                panicAlert.style.display = 'none';
            }, 10000);
        }

        function dismissPanic() {
            document.getElementById('panicAlert').style.display = 'none';
        }

        // Logout function
        function logout() {
            if (confirm('Apakah Anda yakin ingin keluar?')) {
                // Redirect to logout route
                window.location.href = '/logout';
            }
        }

        // Search functionality
        document.querySelector('.search-input').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            // Implement search logic here
            console.log('Searching for:', searchTerm);
        });

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            // Show panic alert demo after 3 seconds
            setTimeout(() => {
                showPanicAlert();
            }, 3000);
        });
    </script>
</body>
</html>
