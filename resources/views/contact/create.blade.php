@extends('index')

@section('title', 'Contacto')

@section('content')

<!-- ======= Contact Section ======= -->
<section id="contact" class="section-bg">
    <br>
    <br>
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Contactanos</h2>
            <p>¡Déjanos tu mensaje! A vuelta de correo recibirás la información solicitada o te llamaremos para hacerlo de forma personalizada.</p>
        </div>

        <div class="row contact-info">

            <div class="col-md-4">
                <div class="contact-address">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Dirección</h3>
                    <address>Carrera 77B #72A-42, CP. 111051 <br>Bogotá D.C. <br> Colombia</address>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-phone">
                    <i class="bi bi-phone"></i>
                    <h3>Teléfono</h3>
                    <p><a href="tel:+573208887662">(+57) 320 888 76 62</a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-email">
                    <i class="bi bi-envelope"></i>
                    <h3>Email</h3>
                    <p><a href="mailto:info@laboratorioparaelconocimiento.com">info@laboratorioparaelconocimiento.com</a></p>
                </div>
            </div>

        </div>
        <div class="my-3">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{session('status')}}
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
        <div class="form">
            <form action="{{ route('contact.store') }}" method="post" role="form" class="php-email-form">

                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label >Nombre: *</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Su Nombre" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mt-3 mt-md-0">
                        <label >Correo Electrónico: *</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Su Email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label >Asunto: *</label>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" value="{{ old('subject') }}" required>
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label >Mensaje: *</label>
                    <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" value="{{ old('message') }}" required></textarea>
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <br>
                <div class="text-center"><button type="submit">Enviar</button></div>
            </form>
        </div>

    </div>
</section>
<!-- End Contact Section -->
@endsection