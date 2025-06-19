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
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- SmartStay Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
</head>

<body class="dashboard-user">
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <h4><i class="bi bi-house-heart"></i>SmartStay</h4>
                <p>Hotel Management System</p>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-section-title">Menu Utama</div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/user/dashboard">
                                <i class="bi bi-grid-1x2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/rooms">
                                <i class="bi bi-door-open"></i>
                                Kamar Tersedia
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/reservation">
                                <i class="bi bi-calendar-check"></i>
                                Reservasi Saya
                                <span class="nav-badge">2</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Akun</div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/user/profile">
                                <i class="bi bi-person"></i>
                                Profile Saya
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/notifications">
                                <i class="bi bi-bell"></i>
                                Notifikasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/help">
                                <i class="bi bi-question-circle"></i>
                                Bantuan & FAQ
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-section">
                    <ul class="nav flex-column">
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
                        <h2 class="header-title">Dashboard</h2>
                        <div class="breadcrumb-custom">SmartStay / Dashboard</div>
                    </div>
                </div>
                <div class="header-right">
                    <div class="search-box">
                        <i class="bi bi-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Cari kamar, reservasi...">
                    </div>
                    <button class="notification-btn">
                        <i class="bi bi-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    <div class="user-menu">
                        <div class="user-avatar">
                            {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                        </div>
                        <div class="user-info">
                            <h6>{{ Auth::user()->name ?? 'User' }}</h6>
                            <p>Guest Member</p>
                        </div>
                        <i class="bi bi-chevron-down"></i>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Dashboard Page -->
                @yield('space-work')

                <!-- Rooms Page -->


                <!-- Bookings Page -->


                <!-- Profile Page -->


                <!-- Notifications Page -->


                <!-- Help Page -->
                
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
