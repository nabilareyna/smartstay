<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Reservasi - SmartStay</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- SmartStay Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="reservation-detail-page">
    <div class="container-fluid">
        <!-- Header -->
        <div class="reservation-detail-header">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-left">
                        <a href="/user/dashboard" class="back-btn">
                            <i class="bi bi-arrow-left"></i>
                            Kembali
                        </a>
                        <div class="header-info">
                            <h2 class="reservation-detail-title">Detail Reservasi</h2>
                            <p class="reservation-detail-subtitle">Informasi lengkap reservasi Anda</p>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="reservation-status-badge status-confirmed">
                            <i class="bi bi-check-circle"></i>
                            Dikonfirmasi
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container reservation-detail-container">
            @yield('space-work')
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
