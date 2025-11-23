<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PNC Navigator - Temukan Ruangan dengan Mudah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #7209b7;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--light);
            line-height: 1.6;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* NAVBAR MODERN */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            padding: 1rem 2rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .logo i {
            margin-right: 0.5rem;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-menu a {
            color: var(--dark);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-menu a:hover {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            transform: translateY(-2px);
        }

        .nav-menu a.active {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
        }

        .search-box {
            display: flex;
            background: white;
            border-radius: 50px;
            padding: 0.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .search-box:focus-within {
            border-color: var(--primary);
            transform: scale(1.02);
        }

        .search-box input {
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            outline: none;
            width: 250px;
            font-size: 0.9rem;
        }

        .search-box button {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border: none;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .search-box button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }

        /* HERO SECTION YANG MENARIK */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 2rem;
            margin-top: 0;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="rgba(255,255,255,0.05)" points="0,1000 1000,0 1000,1000"/></svg>');
            background-size: cover;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #fff, #c8b6ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-text p {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            box-shadow: 0 8px 25px rgba(67, 97, 238, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(67, 97, 238, 0.6);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }

        .hero-visual {
            position: relative;
            text-align: center;
        }

        .floating-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: block;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        /* FEATURES SECTION */
        .features {
            padding: 6rem 2rem;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #fff, #a8dadc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-subtitle {
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.2rem;
            margin-bottom: 4rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            padding: 3rem 2rem;
            border-radius: 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: white;
        }

        .feature-card p {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
        }

        /* FOOTER */
        .footer {
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
            padding: 4rem 2rem 2rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
        }

        .footer-section h3 {
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .footer-section p, .footer-section a {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--success);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.5);
        }

        /* RESPONSIVE DESIGN */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-menu {
                gap: 1rem;
            }

            .search-box input {
                width: 200px;
            }

            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .cta-buttons {
                justify-content: center;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .feature-card {
                padding: 2rem 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 1rem;
            }

            .nav-menu {
                flex-direction: column;
                gap: 0.5rem;
            }

            .search-box {
                flex-direction: column;
                gap: 0.5rem;
            }

            .search-box input {
                width: 100%;
            }

            .hero-text h1 {
                font-size: 2rem;
            }

            .btn {
                padding: 0.8rem 1.5rem;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <i class="fas fa-map-marked-alt"></i>
                PNC NAVIGATOR
            </div>
            
            <ul class="nav-menu">
                <li><a href="/" class="active"><i class="fas fa-home"></i> Beranda</a></li>
                <li><a href="/eksplor"><i class="fas fa-compass"></i> Eksplor</a></li>
                <li><a href="/tentang"><i class="fas fa-info-circle"></i> Tentang</a></li>
            </ul>

            <form action="/search" method="GET" class="search-box">
                <input type="search" name="q" placeholder="Cari ruangan..." value="{{ request('q') }}">
                <button type="submit"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Navigasi Kampus Jadi Lebih Mudah</h1>
                <p>Temukan setiap sudut Politeknik Negeri Cilacap dengan panduan digital yang akurat, cepat, dan modern.</p>
                
                <div class="cta-buttons">
                    <a href="/search" class="btn btn-primary">
                        <i class="fas fa-rocket"></i> Mulai Eksplor
                    </a>
                    <a href="/rooms" class="btn btn-secondary">
                        <i class="fas fa-list"></i> Lihat Semua Ruangan
                    </a>
                </div>

                <div class="stats">
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <span class="stat-label">Ruangan Tersedia</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">100%</span>
                        <span class="stat-label">Mobile Friendly</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <span class="stat-label">Akses Digital</span>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="floating-card">
                    <i class="fas fa-map-marker-alt" style="font-size: 4rem; color: #4cc9f0; margin-bottom: 1rem;"></i>
                    <h3 style="color: white; margin-bottom: 0.5rem;">Cari. Temukan. Eksplor.</h3>
                    <p style="color: rgba(255,255,255,0.8);">Semua informasi ruangan dalam genggaman Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="features">
        <h2 class="section-title">Fitur Unggulan</h2>
        <p class="section-subtitle">Desain khusus untuk memudahkan perjalanan Anda di kampus</p>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-search-location"></i>
                </div>
                <h3>Pencarian Cerdas</h3>
                <p>Temukan ruangan dengan cepat menggunakan sistem pencarian real-time yang akurat dan responsif.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Optimized Mobile</h3>
                <p>Didesain khusus untuk smartphone dengan interface yang intuitif dan mudah digunakan.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3>Update Real-time</h3>
                <p>Informasi ruangan selalu diperbarui secara real-time oleh tim administrasi kampus.</p>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>PNC Navigator</h3>
                <p>Sistem navigasi digital untuk Politeknik Negeri Cilacap yang memudahkan mahasiswa dalam menemukan lokasi ruangan.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="/">Beranda</a>
                <a href="/search">Cari Ruangan</a>
                <a href="/rooms">Daftar Ruangan</a>
                <a href="/admin/login">Admin Panel</a>
            </div>

            <div class="footer-section">
                <h3>Kontak</h3>
                <p><i class="fas fa-map-marker-alt"></i> Politeknik Negeri Cilacap</p>
                <p><i class="fas fa-phone"></i> (0282) 123-456</p>
                <p><i class="fas fa-envelope"></i> info@pnc.ac.id</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2024 PNC Navigator. All rights reserved. | Dibuat dengan ❤️ untuk PNC</p>
        </div>
    </footer>

    <script>
        // Animasi smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Animasi fade in pada scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        // Terapkan animasi ke feature cards
        document.querySelectorAll('.feature-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });

        // Loading animation
        window.addEventListener('load', function() {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.5s ease';
            
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);
        });

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.15)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
                navbar.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.1)';
            }
        });
    </script>
</body>
</html>