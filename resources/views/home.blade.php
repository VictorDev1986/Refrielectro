@extends('layouts.public')

@section('title', 'RefriElectro - Sistema de Gestión POS')

@section('content')

<!-- Hero Slider Section -->
<section class="hero-slider-section">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-slide" style="background: linear-gradient(135deg, rgba(13, 71, 161, 0.95), rgba(21, 101, 192, 0.9)), url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=2000') center/cover;">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-lg-8 text-white">
                                <span class="badge-slide mb-3">
                                    <i class="bi bi-snow2"></i> Refrigeración Industrial
                                </span>
                                <h1 class="display-2 fw-bold mb-4 slide-title">Soluciones en Refrigeración de Alta Eficiencia</h1>
                                <p class="lead mb-4 slide-text">Equipos industriales de última generación para mantener tus productos en condiciones óptimas. Tecnología confiable para tu negocio.</p>
                                <div class="d-flex gap-3 flex-wrap">
                                    
                                    <a href="#servicios" class="btn btn-outline-light btn-lg px-5 slide-btn-outline">
                                        <i class="bi bi-collection me-2"></i> Ver Catálogo
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-slide" style="background: linear-gradient(135deg, rgba(26, 35, 126, 0.95), rgba(40, 53, 147, 0.9)), url('https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=2000') center/cover;">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-lg-8 text-white">
                                <span class="badge-slide mb-3">
                                    <i class="bi bi-gear-wide-connected"></i> Tecnología Avanzada
                                </span>
                                <h1 class="display-2 fw-bold mb-4 slide-title">Control Inteligente de Inventario</h1>
                                <p class="lead mb-4 slide-text">Sistema POS integrado para gestión completa de tu almacén refrigerado. Monitoreo en tiempo real de temperatura y stock.</p>
                                <div class="d-flex gap-3 flex-wrap">
                                    <a href="{{ route('login') }}" class="btn btn-light btn-lg px-5 slide-btn">
                                        <i class="bi bi-speedometer2 me-2"></i> Prueba el Sistema
                                    </a>
                                    <a href="#nosotros" class="btn btn-outline-light btn-lg px-5 slide-btn-outline">
                                        <i class="bi bi-info-circle me-2"></i> Conocer Más
                                    </a>
                                </div>
                                <div class="row mt-5 g-4">
                                    <div class="col-auto">
                                        <div class="stat-badge">
                                            <i class="bi bi-clock-history"></i>
                                            <div>
                                                <div class="stat-number">24/7</div>
                                                <small>Monitoreo Continuo</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="stat-badge">
                                            <i class="bi bi-shield-check"></i>
                                            <div>
                                                <div class="stat-number">100%</div>
                                                <small>Seguridad Garantizada</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-slide" style="background: linear-gradient(135deg, rgba(0, 96, 100, 0.95), rgba(0, 121, 107, 0.9)), url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=2000') center/cover;">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-lg-8 text-white">
                                <span class="badge-slide mb-3">
                                    <i class="bi bi-award"></i> Calidad Premium
                                </span>
                                <h1 class="display-2 fw-bold mb-4 slide-title">Equipos Certificados de Refrigeración</h1>
                                <p class="lead mb-4 slide-text">Cámaras frías, vitrinas y congeladores de grado industrial. Garantía extendida y servicio técnico especializado incluido.</p>
                                <div class="d-flex gap-3 flex-wrap">
                                    <a href="{{ route('login') }}" class="btn btn-light btn-lg px-5 slide-btn">
                                        <i class="bi bi-cart-check me-2"></i> Ver Productos
                                    </a>
                                    <a href="#contacto" class="btn btn-outline-light btn-lg px-5 slide-btn-outline">
                                        <i class="bi bi-telephone me-2"></i> Solicitar Cotización
                                    </a>
                                </div>
                                <div class="row mt-5 g-4">
                                    <div class="col-auto">
                                        <div class="stat-badge">
                                            <i class="bi bi-people"></i>
                                            <div>
                                                <div class="stat-number">500+</div>
                                                <small>Clientes Satisfechos</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="stat-badge">
                                            <i class="bi bi-tools"></i>
                                            <div>
                                                <div class="stat-number">10+</div>
                                                <small>Años de Experiencia</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-icon">
                <i class="bi bi-chevron-left"></i>
            </span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-icon">
                <i class="bi bi-chevron-right"></i>
            </span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</section>

<!-- Nosotros Section -->
<section id="nosotros" class="py-5 bg-light">
    <div class="container py-5">
        <h2 class="section-title text-center">Sobre Nosotros</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <p class="lead mb-4">RefriElectro es una empresa líder en soluciones tecnológicas para la gestión empresarial. Nuestro sistema POS ha sido diseñado pensando en las necesidades reales de los negocios modernos.</p>
                <p class="text-muted">Con años de experiencia en el sector, ofrecemos herramientas intuitivas y potentes que permiten a nuestros clientes optimizar sus operaciones diarias, mejorar la atención al cliente y tomar decisiones informadas basadas en datos precisos.</p>
            </div>
        </div>
        
        <div class="row mt-5 g-4">
            <div class="col-md-4 text-center">
                <div class="feature-icon mx-auto">
                    <i class="bi bi-award"></i>
                </div>
                <h4 class="fw-bold mb-3">Experiencia</h4>
                <p class="text-muted">Más de 10 años desarrollando soluciones empresariales exitosas.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon mx-auto">
                    <i class="bi bi-people"></i>
                </div>
                <h4 class="fw-bold mb-3">Clientes Satisfechos</h4>
                <p class="text-muted">Cientos de empresas confían en nuestras soluciones tecnológicas.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon mx-auto">
                    <i class="bi bi-headset"></i>
                </div>
                <h4 class="fw-bold mb-3">Soporte 24/7</h4>
                <p class="text-muted">Estamos siempre disponibles para ayudarte cuando lo necesites.</p>
            </div>
        </div>
    </div>
</section>

<!-- Servicios Section -->
<section id="servicios" class="py-5">
    <div class="container py-5">
        <h2 class="section-title text-center">Nuestros Servicios</h2>
        <p class="text-center text-muted mb-5">Soluciones completas para la gestión de tu negocio</p>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-cash-register"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Punto de Venta</h4>
                    <p class="text-muted">Sistema POS completo con interfaz intuitiva para procesar ventas de manera rápida y eficiente.</p>
                    <ul class="list-unstyled text-muted">
                        <li><i class="bi bi-check-circle-fill text-success"></i> Ventas rápidas</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Múltiples métodos de pago</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Tickets y facturas</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Control de Inventario</h4>
                    <p class="text-muted">Gestión completa de productos, stock y almacén con alertas automáticas.</p>
                    <ul class="list-unstyled text-muted">
                        <li><i class="bi bi-check-circle-fill text-success"></i> Gestión de productos</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Control de stock</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Alertas de inventario</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Reportes y Analytics</h4>
                    <p class="text-muted">Análisis detallado de ventas, productos más vendidos y métricas de negocio.</p>
                    <ul class="list-unstyled text-muted">
                        <li><i class="bi bi-check-circle-fill text-success"></i> Reportes detallados</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Gráficas y estadísticas</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Exportación de datos</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Gestión de Usuarios</h4>
                    <p class="text-muted">Control de accesos y permisos para diferentes roles dentro de tu organización.</p>
                    <ul class="list-unstyled text-muted">
                        <li><i class="bi bi-check-circle-fill text-success"></i> Múltiples usuarios</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Roles y permisos</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Auditoría de acciones</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Gestión de Proveedores</h4>
                    <p class="text-muted">Administra tus proveedores, compras y órdenes de manera centralizada.</p>
                    <ul class="list-unstyled text-muted">
                        <li><i class="bi bi-check-circle-fill text-success"></i> Base de proveedores</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Control de compras</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Historial completo</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-grid-3x3"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Categorización</h4>
                    <p class="text-muted">Organiza tus productos por categorías para una gestión más eficiente.</p>
                    <ul class="list-unstyled text-muted">
                        <li><i class="bi bi-check-circle-fill text-success"></i> Categorías personalizadas</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Organización flexible</li>
                        <li><i class="bi bi-check-circle-fill text-success"></i> Búsqueda rápida</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light">
    <div class="container py-5 text-center">
        <h2 class="display-5 fw-bold mb-4">¿Listo para transformar tu negocio?</h2>
        <p class="lead text-muted mb-4">Accede a nuestro sistema y descubre todas las funcionalidades que tenemos para ti.</p>
        <a href="{{ route('login') }}" class="btn btn-primary-custom btn-lg px-5">
            <i class="bi bi-box-arrow-in-right"></i> Acceder al Sistema POS
        </a>
    </div>
</section>

<!-- Contacto Section -->
<section id="contacto" class="py-5">
    <div class="container py-5">
        <h2 class="section-title text-center">Contáctanos</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row g-4">
                    <div class="col-md-4 text-center">
                        <div class="feature-icon mx-auto">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h5 class="fw-bold mt-3">Ubicación</h5>
                        <p class="text-muted">Av. Principal 123<br>Ciudad, País</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="feature-icon mx-auto">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <h5 class="fw-bold mt-3">Teléfono</h5>
                        <p class="text-muted">+1 (234) 567-8900<br>Lun - Vie: 9AM - 6PM</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="feature-icon mx-auto">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <h5 class="fw-bold mt-3">Email</h5>
                        <p class="text-muted">contacto@refrielectro.com<br>soporte@refrielectro.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    // Smooth scrolling para los enlaces del menú
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

    // Cambiar navbar al hacer scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.style.boxShadow = '0 5px 20px rgba(0,0,0,0.1)';
        } else {
            navbar.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
        }
    });
</script>
@endsection
