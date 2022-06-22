@extends('index')

@section('content')
    <!-- ======= Activity-view Section ======= -->
    <section id="contact-view" class="section-bg">
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h1 class="display-4" style="text-align: center"> :: {{ $eventActivity->title }} ::</h1>
                    </div>
                    <a class="btn btn-outline-success" href="{{ route('activitys.index', $eventActivity->event) }}">
                        <i class="bi bi-arrow-left-square-fill"> Volver</i>
                    </a>
                </div>
            </div>
            <br>
            {{-- <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12"> --}}
            <ul class="list-group">
                <li class="list-group-item">
                    <label for="title"><strong>Titulo:</strong></label>
                    <p id="title">
                    <h1 class="display-6">{{ $eventActivity->title }}</h1>
                    </p>
                </li>
                <li class="list-group-item" style="text-align: justify;">
                    <label for="description"><strong>Descripción:</strong></label>
                    <p id="description">{{ $eventActivity->description }}</p>
                </li>

                <li class="list-group-item" style="text-align: justify;">
                    <label for="eventTitle"><strong>Evento:</strong></label>
                    <p id="eventTitle">{{ $eventActivity->event->title }}</p>
                </li>

                <li class="list-group-item" style="text-align: justify;">
                    <label for="speakerName"><strong>Ponente:</strong></label>
                    <p id="speakerName">{{ $eventActivity->user->name }}</p>
                </li>

                <li class="list-group-item">
                    <label for="dateStart"><strong>Fecha de Inicio:</strong></label>
                    <p id="dateStart">{{ date('d/m/Y', strtotime($eventActivity->dateStart)) }}</p>
                </li>
                <li class="list-group-item">
                    <label for="hourStart"><strong>Hora de Inicio:</strong></label>
                    <p id="hourStart">{{ date('g:i A', strtotime($eventActivity->hourStart)) }}</p>
                </li>
                <li class="list-group-item">
                    <label for="dateFinish"><strong>Fecha de Finalización:</strong></label>
                    <p id="dateFinish">{{ date('d/m/Y', strtotime($eventActivity->dateFinish)) }}</p>
                </li>
                <li class="list-group-item">
                    <label for="hourFinish"><strong>Hora de Finalización:</strong></label>
                    <p id="hourFinish">{{ date('g:i A', strtotime($eventActivity->hoursFinish)) }}</p>
                </li>

                <li class="list-group-item">
                    <label for="status"><strong>Estado:</strong></label>
                    <p id="status">
                    <h1 class="display-6">{{ $eventActivity->status == 1 ? 'Activo' : 'Inactivo' }}</h1>
                    </p>
                </li>
            </ul>
            {{-- </div>
        </div> --}}
        </div>
        <br>
        <br>
    </section>
    <!-- End Activity-view Section -->
@endsection
