@extends('index')

@section('title', 'Suscriptor')

@section('content')

    <!-- ======= Suscriptor-create Section ======= -->
    <section id="login" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">{{ __('¡Suscribirte a nuestro evento! Este es el primer paso...') }}</div>

                        <div class="card-body sm-3">
                            @auth
                                <div class="btn-group">
                                    <a class="btn btn-outline-success" href="{{ route('subscribers.index') }}">
                                        <i class="bi bi-arrow-left-square-fill"> Volver</i>
                                    </a>
                                </div>
                            @endauth
                            <br>
                            <div class="my-3">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li><strong>{{ $error }}</strong></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <div class="row text-center">
                                <div class="col-md-2">
                                    <img class="img-fluid" src="/img/arbol.png" width="150%" height="auto" alt="Arbol de raices.">
                                </div>
                                <div class="col-md-10">
                                    <h4>Evento Virtual Gratuito</h4>
                                    <h4>EXPLORANDO LAS RAICES PARA UNA SANACIÓN VERDADERA</h4>
                                </div>
                                <p style="color: black; !important">¡Hola! para participar en el Evento Virtual, por favor escribe los siguientes datos:</p>
                            </div>
                            <div class="card-text">
                                <form method="POST" action="{{ route('subscribers.store') }}">
                                    @csrf
                                    
                                    <div class="row">
                                        <label for="name"
                                            class="form-label">{{ __('Nombre: *') }}</label>
    
                                        <div class="col-md-12">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            <div id="nameHelp" class="form-text">Tu nombre es muy importante queremos dirigirnos a ti con mucho respeto.</div>
    
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row mb-3">
                                        <label for="email"
                                            class="form-label">{{ __('Correo Electrónico: *') }}</label>
    
                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                <div id="emailHelp" class="form-text">Tu correo electrónico es el canal más idóneo para enviarte información de mucho valor.</div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row" style="background: cornsilk;">
                                        <p class="text-center h6" style="color: black !important;"> <i class="bi bi-envelope-exclamation-fill"></i> Cerciórate que nuestros correos lleguen a tu buzón en <strong style="color: green;"> bandeja de entrada</strong>; si no lo visualizas revisa tu bandeja de <strong style="color: red;"> spam (correo no deseado) </strong> y marca el correo como <strong class="btn btn-outline-success btn-sm"> No es spam</strong>.</p>
                                        <p class="h6" style="color: black !important;"><i class="bi bi-award-fill"> Tus datos estarán en la base del <strong> Centro de Desarrollo Humano </strong>, para poder direccionarte al Evento Virtual; por lo que no serán vendidos, ni canjeados. </i></p>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-send-check-fill"> {{ __('Suscribirme Ahora') }} </i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <br>
        <br>
    </section>
    <!-- End Suscriptor-create Section -->
@endsection
