<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'RefriElectro - Sistema POS')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            overflow-x: hidden;
        }
        
        /* Hero Slider Styles */
        .hero-slider-section {
            margin-top: -80px;
            padding-top: 80px;
        }
        
        .carousel-slide {
            height: 100vh;
            min-height: 700px;
            display: flex;
            align-items: center;
            position: relative;
            background-attachment: fixed !important;
        }
        
        .carousel-fade .carousel-item {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        
        .carousel-fade .carousel-item.active {
            opacity: 1;
        }
        
        .slide-title {
            animation: slideInLeft 1s ease-out;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        
        .slide-text {
            animation: slideInLeft 1.2s ease-out;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .badge-slide {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            padding: 10px 25px;
            border-radius: 50px;
            display: inline-block;
            font-weight: 600;
            font-size: 1rem;
            border: 1px solid rgba(255,255,255,0.3);
            animation: slideInLeft 0.8s ease-out;
        }
        
        .slide-btn {
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            animation: slideInLeft 1.4s ease-out;
        }
        
        .slide-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }
        
        .slide-btn-outline {
            border: 2px solid white;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            animation: slideInLeft 1.6s ease-out;
        }
        
        .slide-btn-outline:hover {
            background: white;
            color: #1565c1 !important;
            transform: translateY(-3px);
        }
        
        .stat-badge {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 15px 25px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1px solid rgba(255,255,255,0.2);
            animation: fadeInUp 1.8s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .stat-badge i {
            font-size: 2rem;
            opacity: 0.9;
        }
        
        .stat-badge .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 3px;
        }
        
        .stat-badge small {
            font-size: 0.75rem;
            opacity: 0.9;
            display: block;
        }
        
        .carousel-indicators {
            bottom: 30px;
        }
        
        .carousel-indicators button {
            width: 50px;
            height: 4px;
            border-radius: 2px;
            background: rgba(255,255,255,0.5);
            border: none;
            transition: all 0.3s;
        }
        
        .carousel-indicators button.active {
            background: white;
            width: 70px;
        }
        
        .carousel-control-icon {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255,255,255,0.3);
            transition: all 0.3s;
        }
        
        .carousel-control-icon:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.1);
        }
        
        .carousel-control-icon i {
            font-size: 1.5rem;
            color: white;
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            width: auto;
            opacity: 1;
        }
        
        /* Responsive Slider */
        @media (max-width: 768px) {
            .carousel-slide {
                height: 90vh;
                min-height: 600px;
                background-attachment: scroll !important;
            }
            
            .slide-title {
                font-size: 2.5rem !important;
            }
            
            .slide-text {
                font-size: 1.1rem !important;
            }
            
            .stat-badge {
                padding: 12px 20px;
                font-size: 0.85rem;
            }
            
            .stat-badge .stat-number {
                font-size: 1.2rem;
            }
            
            .carousel-control-icon {
                width: 45px;
                height: 45px;
            }
            
            .carousel-control-icon i {
                font-size: 1.2rem;
            }
        }
        
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
            min-height: 600px;
            display: flex;
            align-items: center;
        }
        
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #667eea !important;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: transform 0.3s;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        
        .btn-outline-custom {
            border: 2px solid white;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-outline-custom:hover {
            background: white;
            color: #667eea;
        }
        
        .feature-card {
            border: none;
            border-radius: 15px;
            padding: 30px;
            height: 100%;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .section-title {
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 50px;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 20px auto 0;
            border-radius: 2px;
        }
        
        footer {
            background: #1a1a2e;
            color: white;
            padding: 40px 0 20px;
        }
        
        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin: 0 5px;
            transition: all 0.3s;
        }
        
        .social-icons a:hover {
            background: #667eea;
            transform: translateY(-3px);
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <i class="bi bi-shop"></i> RefriElectro
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="btn btn-primary-custom btn-sm" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Acceder al Sistema
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3"><i class="bi bi-shop"></i> RefriElectro</h5>
                    <p class="text-light">Sistema integral de gestión de ventas y almacén diseñado para optimizar tu negocio.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#nosotros" class="text-light text-decoration-none">Nosotros</a></li>
                        <li><a href="#servicios" class="text-light text-decoration-none">Servicios</a></li>
                        <li><a href="{{ route('login') }}" class="text-light text-decoration-none">Acceder al Sistema</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Síguenos</h5>
                    <div class="social-icons">
                        <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-light">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0 text-light">&copy; {{ date('Y') }} RefriElectro. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>
