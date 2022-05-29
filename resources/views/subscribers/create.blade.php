<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- <title>Centro de Desarrollo Humano</title> -->
    <meta content="Centro de Desarrollo Humano, una luz en el camino hacia la sanación verdadera." name="description">
    <meta content="yoga, sanación, liberación emocional, universo, primera infancia" name="keywords">

    <!-- Favicons -->
    <link href="/img/logo.png" rel="icon">
    <link href="/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/css/subscriber/style.css') }}" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" style="width: 58% !important;">

      <h1>Evento Virtual Gratuito</h1>
      <h2>EXPLORANDO LAS RAICES PARA UNA SANACIÓN VERDADERA</h2>
      <div class="countdown d-flex justify-content-center" data-count="{{ date('Y/m/d', strtotime($event->dateStart)) }}">
        <div>
          <h3>%d</h3>
          <h4>Días</h4>
        </div>
        <div>
          <h3>%h</h3>
          <h4>Horas</h4>
        </div>
        <div>
          <h3>%m</h3>
          <h4>Minutos</h4>
        </div>
        <div>
          <h3>%s</h3>
          <h4>Segundos</h4>
        </div>
      </div>

      <div class="subscribe">
        <h4>¡Hola! para participar en el Evento Virtual, por favor escribe los siguientes datos:</h4>
        <form method="POST" action="{{ route('subscribers.store') }}" role="form" class="php-email-form">
			@csrf
			
          <div class="subscribe-form">
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nombre completo" autofocus required>
			<div id="nameHelp" class="form-text"><i class="bi bi-award"></i> Tu nombre es muy importante queremos dirigirnos a ti con mucho respeto.</div>
			
			@error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
          </div>
		  <div class="subscribe-form">
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" placeholder="Correo electrónico" required>
				<div id="emailHelp" class="form-text">Tu correo electrónico es el canal más idóneo para enviarte información de mucho valor.</div>
				
				@error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
          </div>
		  <br>
		  <div>
                                            <button type="submit" class="btn btn-outline-danger">
                                                <i class="bi bi-send-check-fill"> ¡Suscribirme Ahora! </i>
                                            </button>
                                        </div>
		  <br>
                                    <div class="countdown d-flex" style="text-aling:justify !important;">
                                        <h4> <i class="bi bi-envelope-exclamation-fill"></i> Cerciórate que nuestros correos lleguen a tu buzón en <strong style="color: green;"> bandeja de entrada</strong>; si no lo visualizas revisa tu bandeja de <strong style="color: red;"> spam (correo no deseado) </strong> y marca el correo como <strong class="btn btn-outline-success btn-sm"> No es spam</strong>.
                                        <br>
										<i class="bi bi-award-fill"> Tus datos estarán en la base del <strong> Centro de Desarrollo Humano </strong>, para poder direccionarte al Evento Virtual; por lo que no serán vendidos, ni canjeados. </i></h4>
                                    </div>
          <div class="mt-2">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your notification request was sent. Thank you!</div>
          </div>
        </form>
      </div>

      

    </div>
  </header>
  <!-- End #header -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/js/subscriber/main.js') }}"></script>

</body>

</html>