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

            <div class="card col-md-12 border-success shadow-lg mb-3 ">
                <div class="card-header bg-transparent border-success">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('/storage/'.$bussiness->logo) }}" alt="Logo" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h1 class="display-6"><strong>{{ strtoupper($bussiness->name) }}</strong></h1>
                        </div>
                    </div>
                </div>
                <div class="card-body text-success">
                    <p class="card-text">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label for="name"><strong>Nombre:</strong></label>
                            <p id="name">
                            <h1 class="display-6">{{ $bussiness->name }}</h1>
                            </p>
                        </li>
                        <li class="list-group-item">
                            <label for="motto"><strong>Lema Corporativo:</strong></label>
                            <p id="motto"><h2>{{ $bussiness->motto }}</h2></p>
                        </li>
                        <li class="list-group-item">
                            <label for="address"><strong>Dirección:</strong></label>
                            <p id="address">{{ $bussiness->address }}</p>
                        </li>
                        <li class="list-group-item">
                            <label for="telephone"><strong>Telefóno:</strong></label>
                            <p id="telephone">{{ $bussiness->telephone }}</p>
                        </li>
                        <li class="list-group-item">
                            <label for="email"><strong>Email:</strong></label>
                            <p id="email"><a href="mailto:{{ $bussiness->email }}">{{ $bussiness->email }}</a></p>
                        </li>
                        <li class="list-group-item" style="text-align: justify;">
                            <label for="aboutUs"><strong>Sobre Nosotros:</strong></label>
                            <p id="aboutUs">{{ $bussiness->aboutUs }}</p>
                        </li>
                        <li class="list-group-item" style="text-align: justify;">
                            <label for="mission"><strong>Misión:</strong></label>
                            <p id="mission">{{ $bussiness->mission }}</p>
                        </li>
                        <li class="list-group-item" style="text-align: justify;">
                            <label for="vision"><strong>Visión:</strong></label>
                            <p id="vision">{{ $bussiness->vision }}</p>
                        </li>
                        <li class="list-group-item">
                            <label for="accountTwitter"><strong>Usuario Twitter:</strong></label>
                            <p id="accountTwitter"><a href="{{$bussiness->accountTwitter}}" target="_blank">{{ $bussiness->accountTwitter }}</a></p>
                        </li>
                        <li class="list-group-item">
                            <label for="accountFacabook"><strong>Fanpage Facabook:</strong></label>
                            <p id="accountFacabook"> <a href="{{$bussiness->accountFacabook}}" target="_blank"> {{ $bussiness->accountFacabook }}</a></p>
                        </li>
                        <li class="list-group-item">
                            <label for="accountInstagram"><strong>Usuario Instagram:</strong></label>
                            <p id="accountInstagram"><a href="{{$bussiness->accountInstagram}}" target="_blank"> {{ $bussiness->accountInstagram }}</a></p>
                        </li>
                        <li class="list-group-item">
                            <label for="accountLinkedin"><strong>Usuario Linkedin:</strong></label>
                            <p id="accountLinkedin"><a href="{{$bussiness->accountLinkedin}}" target="_blank"> {{ $bussiness->accountLinkedin }}</a></p>
                        </li>
                    </ul>
                    </p>
                </div>
                <div class="card-footer bg-transparent border-success text-center">
                    <div class="btn-group">
                        <a class="btn btn-outline-success" href="{{ route('bussiness.edit', $bussiness) }}">
                            <i class="bi bi-vector-pen"> Editar Información Compañia</i>
                        </a>
                    </div>
                </div>
            </div>

            @if (!$bussiness)
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
