<!-- @extends('layouts.app') -->

@extends('index')

@section('title', 'Verificación Email')

@section('content')
<!-- ======= Verify Section ======= -->
<section id="login">
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique su dirección de correo electrónico') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                    </div>
                    @endif

                    {{ __('Antes de continuar, compruebe su correo electrónico para ver si hay un enlace de verificación.') }}
                    {{ __('Si no ha recibido el correo electrónico.') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Haga clic aquí para solicitar otro.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login Section -->
@endsection