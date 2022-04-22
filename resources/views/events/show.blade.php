@extends('index')

@section('content')
<!-- ======= Contact-view Section ======= -->
<section id="contact-view" class="section-bg">
    <br>
    <br>
    <br>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h1> {{ $event->title }} </h1>
                </div>
                <a class="btn btn-outline-success" href="{{ route('events.index') }}">
                    <i class="bi bi-arrow-left-square-fill"> Volver</i>
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="list-group row">
                    <li class="list-group-item">
                        <label for="name"><strong>Titulo:</strong></label>
                        <p id="name"><h1 class="display-6">{{ $event->title }}</h1></p>
                    </li>
                    <li class="list-group-item" style="text-align: justify;">
                        <label for="message"><strong>Descripción:</strong></label>
                        <p id="message">{{ $event->descripion }}</p>
                    </li>
                    <div class="row">
                        <li class="list-group-item col-sm-6">
                            <label for="dateStart"><strong>Fecha de Inicio:</strong></label>
                            <p id="dateStart">{{ $event->dateStart }}</p>
                        </li>
                        <li class="list-group-item col-sm-6">
                            <label for="hourStart"><strong>Hora de Inicio:</strong></label>
                            <p id="hourStart">{{ $event->hourStart }}</p>
                        </li>
                    </div>
                    <div class="row">
                        <li class="list-group-item col-sm-6">
                            <label for="dateFinish"><strong>Fecha de Finalización:</strong></label>
                            <p id="dateFinish">{{ $event->dateFinish }}</p>
                        </li>
                        <li class="list-group-item col-sm-6">
                            <label for="hourFinish"><strong>Hora de Finalización:</strong></label>
                            <p id="hourFinish">{{ $event->hourFinish }}</p>
                        </li>
                    </div>
                    <li class="list-group-item">
                        <label for="status"><strong>Estado:</strong></label>
                        <p id="status"><h1 class="display-6">{{ $event->status }}</h1></p>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <br>
    <br>
</section>
<!-- End Contact-view Section -->
@endsection