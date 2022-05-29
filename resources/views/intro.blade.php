@extends('index')

@section('title', 'Inicio')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <h1 class="mb-4 pb-0">Explorando las<br><span>Raíces de una Sanación</span> Verdadera</h1>
        <p class="mb-4 pb-0">Gran ciclo de conferencias. ¡Cinco días para encontrar lo mejor de tí!</p>
        {{-- <div  class="ratio ratio-4x3"> --}}
            <iframe id="myVideo" width="800" height="450" src="https://www.youtube-nocookie.com/embed/0pKWOWwgm2g?modestbranding=0&amp;showinfo=1&amp;rel=0&amp;controls=0&amp;autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        {{-- </div> --}}
            <!-- <video id="myVideo" width="800" preload="auto" poster="/img/video1IntroCamilaMontes.png" controls loop autoplay>
            <source src="https://youtu.be/0pKWOWwgm2g" type="video/mp4">
            Tu navegador no admite el elemento <code>video</code>.
        </video> -->
        <!-- Optional: some overlay text to describe the video -->
        <div class="content">
            <a href="{{ route('subscribers.create') }}" class="about-btn scrollto">¡Suscribete Ahora!</a>
        </div>
        <div class="content">
          <label for="email" style="color: white;"><i class="bi bi-envelope-check-fill"></i> Email:</label>
          <input class="about-btn" onchange="chargeEmail()" type="email" name="email" id="email" placeholder="Correo electrónico...">
          <a id="btView" name="btView" href="{{ route('player','') }}" class="about-btn scrollto"><i class="bi bi-play-circle-fill"> Ver Mis Videos</i></a>
        </div>
        <script>
          function chargeEmail(){
            btnViewVideo = document.getElementById('btView');
            inputEmail = document.getElementById('email');
            hrefRoute = '{{ route('player','') }}';
            console.log(inputEmail.value);
            btnViewVideo.setAttribute('href', hrefRoute+'/'+inputEmail.value);
          }
        </script>
    </div>
    <br>
<br>
<br>
<br>
<br>
</section>
<!-- End Hero Section -->

<!-- ======= About Section ======= -->
<section id="about">
    <div class="container" data-aos="fade-up">
      @foreach($events as $event)
        <div class="row">
            <div class="col-lg-6">
                <h2>Un Algo Para Ti</h2>
                <p>{{$event->description}}</p>
            </div>
            <div class="col-lg-3">
                <h3>Donde</h3>
                <p>Eventos Virtuales, Desde la comodidad de tu casa o oficina.</p>
            </div>
            <div class="col-lg-3">
                <h3>Cuando</h3>
                <p>¡Valida tu agenda te esperamos!<br>Del {{ date('d/m/Y', strtotime($event->dateStart)) }} al {{ date('d/m/Y', strtotime($event->dateFinish)) }}</p>
            </div>
        </div>
      @endforeach
    </div>
</section>
<!-- End About Section -->

<!-- ======= Speakers Section ======= -->
<section id="speakers">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Oradores del Evento</h2>
        <p><i class="bi bi-align-start"></i> Estos son algunos de nuestros ponentes <i class="bi bi-align-end"></i></p>
      </div>

      <div class="row">
      @foreach ($users as $user)
          
        <div class="col-lg-4 col-md-6">
          <div class="speaker" data-aos="fade-up" data-aos-delay="100">
            <img data-src="{{asset('/public/storage/'.$user->photography)}}" alt="{{$user->name}}" class="rounded img-fluid lozad">
            <div class="details">
              <h3><a href="{{route('users.show', $user->id)}}">{{ $user->name }}</a></h3>
              <p>{{ $user->famousPhrase }}</p>
              <div class="social">
                @if (isset($user->telephone))
                <a href="https://wa.me/{{ $str = ltrim ($user->telephone,'+') }}/?&text=%F0%9F%99%8B%E2%80%8D%E2%99%82%EF%B8%8F%C2%A1Hola!%20Me%20interesa%20conocer%20mas%20informaci%C3%B3n%20sobre%20su%20grandioso%20evento.%F0%9F%A4%9D" target="_blank"><i class="bi bi-whatsapp"></i></a>
                <a href="https://t.me/{{ $user->telephone }}" target="_blank"><i class="bi bi-telegram"></i></a>
                @endif
                @if (isset($user->accountTwitter))
                <a href="https://www.twitter.com/{{ $user->accountTwitter }}" target="_blank" ><i class="bi bi-twitter"></i></a>
                @endif
                @if (isset($user->accountFacabook))
                <a href="https://www.facebook.com/{{ $user->accountFacabook }}" target="_blank" ><i class="bi bi-facebook"></i></a>
                @endif
                @if (isset($user->accountInstagram))
                <a href="https://www.instagram.com/{{ $user->accountInstagram }}" target="_blank" ><i class="bi bi-instagram"></i></a>
                @endif
                @if (isset($user->accountLinkedin))
                <a href="https://www.linkedin.com/in/{{ $user->accountLinkedin }}" target="_blank" ><i class="bi bi-linkedin"></i></a>
                @endif
                @if (isset($user->accountTiktok))
                <a href="https://www.tiktok.com/{{ '@'.$user->accountTiktok }}" target="_blank" ><i class="bi bi-tiktok"></i></a>
                @endif
                @if (isset($user->accountYouTube))
                <a href="https://www.youtube.com/channel/{{ $user->accountYouTube }}" target="_blank" ><i class="bi bi-youtube"></i></a>
                @endif
                @if (isset($user->email))
                <a href="mailto:{{ $user->email }}" target="_blank" ><i class="bi bi-envelope-check-fill"></i></a>
                @endif
                @if (isset($user->web))
                <a href="{{ $user->web }}" target="_blank" ><i class="bi bi-globe2"></i></a>
                @endif
                @if (isset($user->accountOther))
                <a href="{{ $user->accountOther }}" target="_blank" ><i class="bi bi-hand-index-thumb-fill"></i></a>
                @endif
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </section>
  <!-- End Speakers Section -->
@endsection
@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script>
        const observer = lozad(); // lazy loads elements with default selector as '.lozad'
        observer.observe();
    </script>
@endsection

