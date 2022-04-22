@extends('index')

@section('css')
@endsection

@section('content')
    <!-- ======= Contact-list Section ======= -->
    <section id="business-index" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">
            <h1 class="display-6 text-center">::: Datos de la Compañia :::</h1>
            <div class="my-3">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            @foreach ( $bussiness as $bussines)
            <div class="card col-md-12 border-success shadow-lg mb-3 ">
                <div class="card-header bg-transparent border-success">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('/public/storage/'.$bussines->logo) }}" alt="Logo" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h1 class="display-6"><strong>{{ strtoupper($bussines->name) }}</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="card-body text-success">
                    <p class="card-text">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label for="name"><strong>Nombre:</strong></label>
                            <p id="name">
                            <h1 class="display-6">{{ $bussines->name }}</h1>
                            </p>
                        </li>
                        <li class="list-group-item">
                            <label for="motto"><strong>Lema Corporativo:</strong></label>
                            <p id="motto"><h2>{{ $bussines->motto }}</h2></p>
                        </li>
                        <li class="list-group-item">
                            <label for="address"><strong>Dirección:</strong></label>
                            <p id="address">{{ $bussines->address }}</p>
                        </li>
                        <li class="list-group-item">
                            <label for="telephone"><strong>Telefóno:</strong></label>
                            <p id="telephone">{{ $bussines->telephone }}</p>
                        </li>
                        <li class="list-group-item">
                            <label for="email"><strong>Email:</strong></label>
                            <p id="email"><a href="mailto:{{ $bussines->email }}">{{ $bussines->email }}</a></p>
                        </li>
                        <li class="list-group-item" style="text-align: justify;">
                            <label for="aboutUs"><strong>Sobre Nosotros:</strong></label>
                            <p id="aboutUs">{{ $bussines->aboutUs }}</p>
                        </li>
                        <li class="list-group-item" style="text-align: justify;">
                            <label for="mission"><strong>Misión:</strong></label>
                            <p id="mission">{{ $bussines->mission }}</p>
                        </li>
                        <li class="list-group-item" style="text-align: justify;">
                            <label for="vision"><strong>Visión:</strong></label>
                            <p id="vision">{{ $bussines->vision }}</p>
                        </li>
                        <li class="list-group-item">
                            <label for="accountTwitter"><strong>Usuario Twitter:</strong></label>
                            <p id="accountTwitter"><a href="{{$bussines->accountTwitter}}" target="_blank">{{ $bussines->accountTwitter }}</a></p>
                        </li>
                        <li class="list-group-item">
                            <label for="accountFacabook"><strong>Fanpage Facabook:</strong></label>
                            <p id="accountFacabook"> <a href="{{$bussines->accountFacabook}}" target="_blank"> {{ $bussines->accountFacabook }}</a></p>
                        </li>
                        <li class="list-group-item">
                            <label for="accountInstagram"><strong>Usuario Instagram:</strong></label>
                            <p id="accountInstagram"><a href="{{$bussines->accountInstagram}}" target="_blank"> {{ $bussines->accountInstagram }}</a></p>
                        </li>
                        <li class="list-group-item">
                            <label for="accountLinkedin"><strong>Usuario Linkedin:</strong></label>
                            <p id="accountLinkedin"><a href="{{$bussines->accountLinkedin}}" target="_blank"> {{ $bussines->accountLinkedin }}</a></p>
                        </li>
                    </ul>
                    </p>
                </div>
                <div class="card-footer bg-transparent border-success text-center">
                    <div class="btn-group">
                        <a class="btn btn-outline-success" href="{{ route('bussiness.edit', $bussines) }}">
                            <i class="bi bi-vector-pen"> Editar Información Compañia</i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            

            @if (sizeof($bussiness)<1)
                <a class="btn btn-outline-success" href="{{ route('bussiness.create') }}">
                    <i class="bi bi-building"> Inicializar Datos de la Compañia</i>
                </a>
            @endif

            <br>
            <br>
    </section>
    <!-- End Contact-list Section -->
@endsection

@section('js')
@endsection
