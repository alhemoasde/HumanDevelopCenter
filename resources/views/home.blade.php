<!-- @extends('layouts.app') -->
@extends('index')

@section('content')
<!-- ======= Dashboard Cliente Section ======= -->
<section id="login">
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Estamos trabajando para ofrecerte el mejor contenido.!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
