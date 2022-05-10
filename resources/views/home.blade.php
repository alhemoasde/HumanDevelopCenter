<!-- @extends('layouts.app') -->
@extends('index')

@section('content')
<!-- ======= Dashboard Cliente Section ======= -->
<section id="login">
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Estamos trabajando para ofrecerte el mejor contenido.!') }}

                    <p>Dasboard los Clientes vista tipo youtube para la reproducción de videos.</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
