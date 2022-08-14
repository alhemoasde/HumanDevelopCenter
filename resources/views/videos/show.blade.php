@extends('index')

@section('content')
<!-- ======= Video-view Section ======= -->
<section id="videos-view" class="section-bg">
    <br>
    <br>
    <br>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h1 class="display-4" style="text-align: center"> :: {{ $video->title }} :: </h1>
                </div>
                <a class="btn btn-outline-success" href="{{ route('videos.index') }}">
                    <i class="bi bi-arrow-left-square-fill"> Volver</i>
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="list-group row">

                    <li class="list-group-item">
                        <label for="title"><strong>Titulo:</strong></label>
                        <p id="title"><h1 class="display-6">{{ $video->title }}</h1></p>
                    </li>

                    <li class="list-group-item" style="text-align: justify;">
                        <label for="description"><strong>Descripción:</strong></label>
                        <p id="description" class="display-6">{{ $video->description }}</p>
                    </li>

                    <li class="list-group-item" style="text-align: justify;">
                        <label for="description"><strong>Orador:</strong></label>
                        <p id="description" class="display-6">{{ $video->user->name }}</p>
                    </li>

                    <li class="list-group-item">
                        <label for="myVideo"><strong>Video:</strong></label>
                        <video class="ratio ratio-4x3" id="myVideo" width="800" preload="auto" poster="/img/video1IntroCamilaMontes.png" controls>
                            <source src="{{ asset('/public/storage/'.$video->url) }}" type="video/mp4">
                            Tu navegador no admite el elemento <code>video</code>.
                        </video>
                    </li>

                    <li class="list-group-item">
                        <label for="status"><strong>Estado:</strong></label>
                        <p id="status"><h1 class="display-6">{{ $video->status == 1 ? 'Activo' : 'Inactivo'}}</h1></p>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <br>
    <br>
</section>
<!-- End Video-view Section -->
@endsection