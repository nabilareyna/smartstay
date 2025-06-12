<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartStay - Hotel Reservation System</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #1A3636;
            --secondary-color: #40534C;
            --tertiary-color: #677D6A;
            --accent-color: #D6BD98;
            --accent-light: #E8D7BC;
            --dark-color: #0F2020;
            --light-color: #F5F1E8;
            --text-dark: #1A3636;
            --text-light: #F5F1E8;
            --text-muted: #8A9A8D;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--text-dark);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }

        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(26, 54, 54, 0.5);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: var(--light-color);
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--secondary-color), var(--tertiary-color));
            border: none;
            border-radius: 8px;
            padding: 14px 35px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            color: var(--light-color);
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(26, 54, 54, 0.3);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--light-color);
        }

        .btn-outline-custom {
            border: 2px solid var(--light-color);
            color: var(--light-color);
            border-radius: 8px;
            padding: 12px 33px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            background: transparent;
        }

        .btn-outline-custom:hover {
            background: var(--light-color);
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 255, 255, 0.2);
        }

        .room-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(15, 32, 32, 0.1);
            transition: all 0.3s ease;
            background: white;
        }

        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(15, 32, 32, 0.15);
        }

        .room-image {
            height: 250px;
            object-fit: cover;
            width: 100%;
        }

        .price-badge {
            background: linear-gradient(135deg, var(--accent-color), var(--accent-light));
            color: var(--primary-color);
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .amenity-badge {
            background: var(--light-color);
            color: var(--secondary-color);
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.85rem;
            margin: 2px;
            display: inline-block;
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--secondary-color), var(--tertiary-color));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--light-color);
            font-size: 28px;
            margin-bottom: 25px;
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .floating-elements::before,
        .floating-elements::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(214, 189, 152, 0.1);
            animation: float 8s ease-in-out infinite;
        }

        .floating-elements::before {
            width: 250px;
            height: 250px;
            top: 15%;
            right: 8%;
            animation-delay: -3s;
        }

        .floating-elements::after {
            width: 180px;
            height: 180px;
            bottom: 15%;
            left: 8%;
            animation-delay: -6s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
            50% { transform: translateY(-30px) rotate(180deg); opacity: 1; }
        }

        .navbar-custom {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(15px);
            box-shadow: 0 2px 25px rgba(15, 32, 32, 0.1);
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 15px;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1.1rem;
            margin-bottom: 50px;
        }

        .bg-light-custom {
            background-color: var(--light-color);
        }

        .bg-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--secondary-color);
        }

        .btn-outline-primary {
            color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
            color: var(--light-color);
        }

        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .text-primary {
            color: var(--secondary-color) !important;
        }

        .text-accent {
            color: var(--accent-color) !important;
        }

        .badge.bg-warning {
            background-color: var(--accent-color) !important;
            color: var(--primary-color);
        }

        .badge.bg-danger {
            background-color: #8B5A2B !important;
            color: var(--light-color);
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: auto;
                padding: 80px 0 60px;
            }

            .card-welcome {
                margin: 30px 0;
            }

            .btn-primary-custom,
            .btn-outline-custom {
                width: 100%;
                margin-bottom: 15px;
            }

            .room-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#" style="color: var(--primary-color);">
                <i class="bi bi-house-heart me-2"></i>
                SmartStay
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#kamar">Kamar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fasilitas">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    <a href="/login/form" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Masuk
                    </a>
                    <a href="/registration/form" class="btn btn-primary btn-sm">
                        <i class="bi bi-person-plus me-1"></i>
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="floating-elements"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="display-3 fw-bold mb-4">
                            Selamat Datang di<br>
                            <span style="color: var(--accent-color);">SmartStay</span>
                        </h1>
                        <p class="lead mb-5">
                            Nikmati pengalaman menginap yang tak terlupakan dengan fasilitas modern
                            dan pelayanan terbaik. Reservasi kamar impian Anda sekarang juga!
                        </p>
                        <div class="d-flex flex-column flex-md-row gap-3">
                            <a href="#kamar" class="btn btn-primary-custom">
                                <i class="bi bi-calendar-check me-2"></i>
                                Pesan Kamar Sekarang
                            </a>
                            <a href="#fasilitas" class="btn btn-outline-custom">
                                <i class="bi bi-eye me-2"></i>
                                Lihat Fasilitas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Room Section -->
    <section id="kamar" class="py-5 bg-light-custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="section-title">Pilihan Kamar Terbaik</h2>
                    <p class="section-subtitle">Temukan kamar yang sesuai dengan kebutuhan dan budget Anda</p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Standard Room -->
                <div class="col-lg-4 col-md-6">
                    <div class="card room-card h-100">
                        <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                             class="room-image" alt="Standard Room">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title fw-bold mb-0">Standard Room</h5>
                                <span class="price-badge">Rp 450K</span>
                            </div>
                            <p class="text-muted mb-3">Kamar nyaman dengan fasilitas lengkap untuk istirahat yang sempurna</p>

                            <div class="mb-3">
                                <span class="amenity-badge">AC</span>
                                <span class="amenity-badge">WiFi Gratis</span>
                                <span class="amenity-badge">TV LED</span>
                                <span class="amenity-badge">Kamar Mandi</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted small">
                                    <i class="bi bi-people me-1"></i> 2 Tamu
                                    <i class="bi bi-rulers ms-3 me-1"></i> 25m²
                                </div>
                                <a href="/registration/form" class="btn btn-primary btn-sm">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deluxe Room -->
                <div class="col-lg-4 col-md-6">
                    <div class="card room-card h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="room-image" alt="Deluxe Room">
                            <span class="badge bg-warning position-absolute top-0 end-0 m-3">Populer</span>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title fw-bold mb-0">Deluxe Room</h5>
                                <span class="price-badge">Rp 650K</span>
                            </div>
                            <p class="text-muted mb-3">Kamar mewah dengan pemandangan kota dan fasilitas premium</p>

                            <div class="mb-3">
                                <span class="amenity-badge">AC</span>
                                <span class="amenity-badge">WiFi Gratis</span>
                                <span class="amenity-badge">Smart TV</span>
                                <span class="amenity-badge">Mini Bar</span>
                                <span class="amenity-badge">Balkon</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted small">
                                    <i class="bi bi-people me-1"></i> 2-3 Tamu
                                    <i class="bi bi-rulers ms-3 me-1"></i> 35m²
                                </div>
                                <a href="/registration/form" class="btn btn-primary btn-sm">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Suite Room -->
                <div class="col-lg-4 col-md-6">
                    <div class="card room-card h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                 class="room-image" alt="Suite Room">
                            <span class="badge bg-danger position-absolute top-0 end-0 m-3">Premium</span>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title fw-bold mb-0">Suite Room</h5>
                                <span class="price-badge">Rp 950K</span>
                            </div>
                            <p class="text-muted mb-3">Suite mewah dengan ruang tamu terpisah dan fasilitas eksklusif</p>

                            <div class="mb-3">
                                <span class="amenity-badge">AC</span>
                                <span class="amenity-badge">WiFi Gratis</span>
                                <span class="amenity-badge">Smart TV</span>
                                <span class="amenity-badge">Mini Bar</span>
                                <span class="amenity-badge">Jacuzzi</span>
                                <span class="amenity-badge">Living Room</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted small">
                                    <i class="bi bi-people me-1"></i> 4 Tamu
                                    <i class="bi bi-rulers ms-3 me-1"></i> 55m²
                                </div>
                                <a href="/registration/form" class="btn btn-primary btn-sm">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="fasilitas" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center mb-5">
                    <h2 class="section-title text-white">Fasilitas Hotel</h2>
                    <p class="section-subtitle text-white">Nikmati berbagai fasilitas premium untuk kenyamanan Anda</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="text-center">
                        <div class="feature-icon mx-auto">
                            <i class="bi bi-wifi"></i>
                        </div>
                        <h6 class="fw-bold text-white">WiFi Gratis</h6>
                        <p class="small text-white">Internet cepat di seluruh area hotel</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="text-center">
                        <div class="feature-icon mx-auto">
                            <i class="bi bi-car-front"></i>
                        </div>
                        <h6 class="fw-bold text-white">Parkir Gratis</h6>
                        <p class="small text-white">Area parkir luas dan aman 24 jam</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="text-center">
                        <div class="feature-icon mx-auto">
                            <i class="bi bi-cup-hot"></i>
                        </div>
                        <h6 class="fw-bold text-white">Restaurant</h6>
                        <p class="small text-white">Hidangan lezat dengan menu internasional</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="text-center">
                        <div class="feature-icon mx-auto">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h6 class="fw-bold text-white">Keamanan 24/7</h6>
                        <p class="small text-white">Sistem keamanan terdepan dengan panic button</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-5 bg-light-custom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">Mengapa Memilih SmartStay?</h2>
                    <p class="text-muted mb-4">
                        SmartStay menghadirkan pengalaman menginap yang tak terlupakan dengan
                        kombinasi sempurna antara kenyamanan modern dan pelayanan personal yang hangat.
                    </p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--tertiary-color);"></i>
                                <span>Lokasi Strategis</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--tertiary-color);"></i>
                                <span>Harga Terjangkau</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--tertiary-color);"></i>
                                <span>Pelayanan 24 Jam</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--tertiary-color);"></i>
                                <span>Fasilitas Lengkap</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="/registration/form" class="btn btn-primary-custom">
                            <i class="bi bi-calendar-check me-2"></i>
                            Mulai Reservasi
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                             alt="Hotel Lobby" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-5 bg-primary-custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <h2 class="fw-bold mb-4">Hubungi Kami</h2>
                    <p class="mb-5">Tim customer service kami siap membantu Anda 24/7 untuk reservasi dan informasi</p>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="bi bi-telephone-fill mb-3" style="font-size: 2.5rem; color: var(--accent-color);"></i>
                                <h6>Telepon</h6>
                                <p class="mb-0">+62 21 5555 0123</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="bi bi-envelope-fill mb-3" style="font-size: 2.5rem; color: var(--accent-color);"></i>
                                <h6>Email</h6>
                                <p class="mb-0">info@smartstay.com</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center">
                                <i class="bi bi-geo-alt-fill mb-3" style="font-size: 2.5rem; color: var(--accent-color);"></i>
                                <h6>Alamat</h6>
                                <p class="mb-0">Jl. Thamrin No. 88, Jakarta Pusat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-house-heart me-2" style="color: var(--accent-color);"></i>
                        <span class="fw-bold">SmartStay</span>
                    </div>
                    <p class="mb-0 mt-2 small text-muted">&copy; {{ date('Y') }} SmartStay Hotel. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-flex justify-content-md-end gap-3">
                        <a href="#" class="text-white-50"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white-50"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white-50"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white-50"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 2px 25px rgba(26, 54, 54, 0.15)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = '0 2px 25px rgba(26, 54, 54, 0.1)';
            }
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe room cards
        document.querySelectorAll('.room-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
</body>
</html>
