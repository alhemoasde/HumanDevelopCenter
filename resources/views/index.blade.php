<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name')}}</title>

  <!-- <title>Centro de Desarrollo Humano</title> -->
  <meta content="Centro de Desarrollo Humano, una luz en el camino hacia la sanación verdadera." name="description">
  <meta content="yoga, sanación, liberación emocional, universo, primera infancia" name="keywords">

  <!-- Favicons -->
  <link href="/img/logo.png" rel="icon">
  <link href="/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
  @yield('css')
  <link href="{{asset('/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('/css/style.css')}}" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center ">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <!-- Uncomment below if you prefer to use a text logo -->
        <a href="/" class="scrollto"><img src="/img/logo.png" alt="" title="">
          <!-- <h1><a href="/">Center<span>Human</span></a></h1> -->
        </a>
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Inicio</a></li>
          @auth
          <li class="dropdown"><a href="#"><span>Administración</span> <i class="bi bi-chevron-right"></i></a>

            <ul>
              <li>
                <a href="{{ route('bussiness.index') }}">Datos Negocio</a>
              </li>
              <li>
                <a href="{{ route('contacts.index') }}">Usuarios</a>
              </li>
              <li>
                <a href="{{ route('events.index') }}">Eventos</a>
              </li>
              <li>
                <a href="{{ route('contacts.index') }}">Productos</a>
              </li>
              <li>
                <a href="{{ route('contacts.index') }}">Suscriptores</a>
              </li>
              <li>
                <a href="{{ route('contacts.index') }}">Mensajes</a>
              </li>
              <li>
                <a href="{{ route('contacts.index') }}">Ventas</a>
              </li>
            </ul>
          </li>
          @endauth
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li> -->
          <li><a class="nav-link scrollto" href="#speakers">Conferencistas</a></li>
          <li><a class="nav-link scrollto" href="#schedule">Evento</a></li>
          <!-- <li><a class="nav-link scrollto" href="#venue">Venue</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#hotels">Hotels</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#supporters">Sponsors</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
          <li class="dropdown"><a href="{{ route('contacts.create') }}"><span>Contáctanos</span> <i class="bi bi-chevron-right"></i></a>
            @auth
            <ul>
              <li>
                <a href="{{ route('contacts.index') }}">Ver Mensajes</a>
              </li>
            </ul>
            @endauth
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
      @guest
      @if (Route::has('login'))
      <a class="buy-tickets scrollto" href="{{ route('login') }}">Login</a>
      @endif
      @if (Route::has('register'))
      <a class="buy-tickets scrollto" href="{{ route('register') }}">Registro</a>
      @endif
      @else
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            {{ __('Salir') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </li>
      @endguest
      <a class="buy-tickets scrollto" href="#buy-tickets">Comprar</a>
    </div>
  </header>

  <!-- End Header -->
  <main id="main">
    @yield('content')
    @guest
    <!-- ======= Subscribe Section ======= -->
    <section id="subscribe">
      <div class="container" data-aos="zoom-in">
        <div class="section-header">
          <h2>Boletín de Noticias</h2>
          <p>Suscríbete ahora y recibe notificación de nuestros eventos.</p>
        </div>
        <form method="POST" action="#">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 d-flex">
              <input type="text" class="form-control" placeholder="Ingrese su Email">
              <button type="submit" class="ms-2">Suscribirse</button>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- End Subscribe Section -->
    @endguest
  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="/img/logo.png" alt="TheEvenet">
            <p>Centro de Desarrollo Humano <br> <strong>¿Por qué existe la enfermedad?</strong> <br>
              Es momento de ampliar conceptos y darle claridad a temas que hemos comprado como verdad absoluta.
              Salud Vs. enfermedad, mitos y realidades
              Bienestar integral Vs. desarmonía, una opción de vida.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Enlaces útiles</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Inicio</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Quienes Somos</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Servicios</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Condiciones de servicio</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Política de privacidad</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Otros</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Contacto</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Registro</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Ingresar</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Galería</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Preguntas Frecuentes</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Datos de Contacto</h4>
            <p>
              Carrera 41 No.15-57 <br>
              Bogota Dc - Colombia<br>
              <strong>Teléfono:</strong> +057 310 323 5849<br>
              <strong>Correo:</strong> centrodedesarrollohumanocolombia@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright ©2022 <strong>Centro de Desarrollo Humano</strong>. Todos los derechos reservados.
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>
  <!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @yield('js')
  <script src="{{asset('/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <!-- <script src="{{asset('/assets/vendor/php-email-form/validate.js')}}"></script> -->

  <!-- Template Main JS File -->
  <script src="{{asset('/js/main.js')}}"></script>

</body>

</html>