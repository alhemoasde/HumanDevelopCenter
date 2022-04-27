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
                <div class="pull-right">
                    <a class="btn btn-outline-success" href="{{ route('subscribers.index') }}"><i class="bi bi-arrow-left-square-fill"> Volver</i></a>
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
                    <td><h1 class="display-4">{{ $subscriber->status == 1 ? 'Activo' : 'Inactivo'}}</h1></td>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <br>
</section>
<!-- End Contact-view Section -->
@endsection