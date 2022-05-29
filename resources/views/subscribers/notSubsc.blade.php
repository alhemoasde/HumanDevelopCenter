@extends('index')

@section('content')
    <br>
    <br>
    <br>
    <section id="hero">
        <div class="container text-center">
            <div class="alert alert-danger" role="alert">
                <i class="bi bi-exclamation-octagon-fill"></i> No registras suscrito a nuestros servicios.
                <div class="content">
                    <a href="{{ route('subscribers.create') }}" class="about-btn scrollto">¡Suscribete Ahora!</a>
                </div>
            </div>
            
        </div>
    </section>
    <br>
    <br>
@endsection
