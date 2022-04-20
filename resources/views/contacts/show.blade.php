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
                    <h1> Mensajes de {{ $contact->name }} </h1>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Volver</a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="list-group">
                    <li class="list-group-item">
                        <label for="name"><strong>Nombre:</strong></label>
                        <p id="name"><h1 class="display-6">{{ $contact->name }}</h1></p>
                    </li>
                    <li class="list-group-item">
                        <label for="email"><strong>Email:</strong></label>
                        <p id="email"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                    </li>
                    <li class="list-group-item">
                        <label for="subject"><strong>Asunto:</strong></label>
                        <p id="subject">{{ $contact->subject }}</p>
                    </li>
                    <li class="list-group-item" style="text-align: justify;">
                        <label for="message"><strong>Mensaje:</strong></label>
                        <p id="message">{{ $contact->message }}</p>
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