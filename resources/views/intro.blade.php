@extends('index')

@section('title', 'Inicio')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <h1 class="mb-4 pb-0">Explorando las<br><span>Raíces de una Sanación</span> Verdadera</h1>
        <p class="mb-4 pb-0">2 - 6 Mayo de 2022, Gran ciclo de conferencias. ¡Cinco días para encontrar lo mejor de tí!</p>
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
        <div class="row">
            <div class="col-lg-6">
                <h2>Un Algo Para Ti</h2>
                <p>Es momento de ampliar conceptos, y darle claridad a temas que hemos comprado como verdad absoluta. Salud Vs. enfermedad, mitos y realidades
                    Bienestar integral Vs. desarmonía, una opción de vida.</p>
            </div>
            <div class="col-lg-3">
                <h3>Donde</h3>
                <p>Eventos Virtuales, Desde la comodidad de tu casa o oficina.</p>
            </div>
            <div class="col-lg-3">
                <h3>Cuando</h3>
                <p>¡Valida tu agenda te esperamos!<br>2-6 Mayo 2022</p>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->
{{-- <script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pausar";
  } else {
    video.pause();
    btn.innerHTML = "Ver";
  }
}
</script> --}}
@endsection

