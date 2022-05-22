@extends('index')

@section('content')
    <!-- ======= Dashboard Cliente Section ======= -->
    <section id="dashboard-cliente">
        <br>
        <br>
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center h1">{{ __(' :::') }} <i
                            class="bi bi-camera-reels">{{ __(' Videos Disponibles Para') }} {{ $subscriber->name }}
                            {{ __(' :::') }}</i>
                        <br>
                        <h3 class="h3">{{ $subscriber->email }}</h3>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Modal gallery -->
                        <section class="">
                            <!-- Section: Images -->
                            <section class="">
                                <div class="row">
                                    @foreach ($buyVideos as $video)
                                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded"
                                                data-ripple-color="light">

                                                <a href="#!" role="button" data-bs-toggle="modal"
                                                    data-bs-target="#Modal{{ $video->id }}">
                                                    <img src="/img/video1IntroCamilaMontes.png" class="w-100" />
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </section>
                            <!-- Section: Images -->

                            <!-- Section: Modals -->
                            <section class="">
                                <!-- Modal 1 -->

                                @foreach ($buyVideos as $video)
                                    <div class="modal fade" id="Modal{{ $video->id }}" tabindex="-1"
                                        aria-labelledby="Modal1Label" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $video->title }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="ratio ratio-16x9">
                                                    <video controls allowfullscreen class="lozad"
                                                        data-poster="/img/video1IntroCamilaMontes.png" width="100%"
                                                        height="50%">
                                                        <source data-src="{{ asset('/public/storage/' . $video->url) }}"
                                                            type="video/mp4">
                                                    </video>
                                                </div>

                                                <div class="text-center py-3">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-mdb-dismiss="modal">
                                                        Descargar
                                                    </button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-mdb-dismiss="modal">
                                                        Salir
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </section>
                            <!-- Section: Modals -->
                        </section>
                        <!-- Modal gallery -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script>
        const observer = lozad(); // lazy loads elements with default selector as '.lozad'
        observer.observe();
    </script>
@endsection
