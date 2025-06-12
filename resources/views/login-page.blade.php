<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SmartStay</title>

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
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated Background Circles */
        .bg-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(214, 189, 152, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .circle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 20%;
            right: 15%;
            animation-delay: -2s;
        }

        .circle:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 30%;
            left: 20%;
            animation-delay: -4s;
        }

        .circle:nth-child(4) {
            width: 100px;
            height: 100px;
            bottom: 20%;
            right: 10%;
            animation-delay: -1s;
        }

        .circle:nth-child(5) {
            width: 140px;
            height: 140px;
            top: 50%;
            left: 5%;
            animation-delay: -3s;
        }

        .circle:nth-child(6) {
            width: 90px;
            height: 90px;
            top: 70%;
            right: 25%;
            animation-delay: -5s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
                opacity: 0.7;
            }
            33% {
                transform: translateY(-30px) translateX(20px) rotate(120deg);
                opacity: 1;
            }
            66% {
                transform: translateY(20px) translateX(-20px) rotate(240deg);
                opacity: 0.8;
            }
        }

        .auth-container {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .auth-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: none;
            max-width: 380px;
            margin: 0 auto;
        }

        .auth-header {
            text-align: center;
            padding: 30px 30px 20px;
            border-bottom: 1px solid #f0f0f0;
        }

        .auth-header h2 {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 8px;
        }

        .auth-header p {
            color: #6b7280;
            margin: 0;
            font-size: 0.9rem;
        }

        .auth-body {
            padding: 25px 30px 30px;
        }

        .form-label {
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control {
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(64, 83, 76, 0.25);
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--secondary-color), var(--tertiary-color));
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            color: white;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(64, 83, 76, 0.3);
            background: linear-gradient(135deg, var(--accent-color), var(--tertiary-color));
        }

        .auth-link {
            text-align: center;
            margin-top: 20px;
        }

        .auth-link a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .auth-link a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }

        .brand-link {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.2rem;
            z-index: 3;
        }

        .brand-link:hover {
            color: var(--accent-color);
        }

        .form-check-input:checked {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .form-check-input:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(64, 83, 76, 0.25);
        }

        @media (max-width: 768px) {
            .auth-card {
                margin: 20px;
                max-width: none;
            }

            .auth-header {
                padding: 25px 20px 15px;
            }

            .auth-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Brand Link -->
    <a href="/" class="brand-link">
        <i class="bi bi-house-heart me-2"></i>
        SmartStay
    </a>

    <!-- Background Animation -->
    <div class="bg-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <!-- Auth Container -->
    <div class="auth-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card auth-card">
                        <div class="auth-header">
                            <h2>Selamat Datang</h2>
                            <p>Masuk ke akun SmartStay Anda</p>
                        </div>
                        <div class="auth-body">
                            <form method="POST" action="{{ route('LoginUser')}}">
                                @csrf

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required
                                           autocomplete="email"
                                           autofocus
                                           placeholder="contoh@email.com">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           id="password"
                                           name="password"
                                           required
                                           autocomplete="current-password"
                                           placeholder="Masukkan password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary-custom">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Masuk
                                </button>
                            </form>

                            <!-- Register Link -->
                            <div class="auth-link">
                                <p class="mb-2">Belum punya akun? <a href="/registration/form">Daftar di sini</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
