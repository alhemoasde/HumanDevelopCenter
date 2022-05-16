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
                <div class="card-header text-center h1">{{ __(' :::')}} <i class="bi bi-camera-reels">{{ __(' Videos Disponibles Para') }} {{$objeto->name}} {{ __(' :::')}}</i> 
                <br>
                <h3 class="h3">{{$objeto->email}}</h3>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="ratio ratio-4x3">
                                <video controls poster="/img/video1IntroCamilaMontes.png">
                                    <source src="/video-intro/0.InvitacionCamila.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <div class="col-sm-3 overflow-auto" style="height: 358px;">
                            <div class="ratio ratio-1x1">
                                <video class="lozad" data-poster="/img/video1IntroCamilaMontes.png" width="100%" height="50%">
                                    <source data-src="/video-intro/0.InvitacionCamila.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
    <script>
        const observer = lozad(); // lazy loads elements with default selector as '.lozad'
        observer.observe();
    </script>
@endsection
