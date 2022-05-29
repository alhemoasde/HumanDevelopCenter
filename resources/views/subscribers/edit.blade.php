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
                        <div class="card-header text-center">{{ __('::: Editar Suscriptor :::') }}</div>

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
                            
                            <div class="card-text">
                                <form method="POST" action="{{ route('subscribers.update', $subscriber) }}">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="row">
                                        <label for="name"
                                            class="form-label">{{ __('Nombre: *') }}</label>
    
                                        <div class="col-md-12">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name', $subscriber->name) }}" required autocomplete="name" autofocus>
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
                                                value="{{ old('email',$subscriber->email) }}" required autocomplete="email" autofocus>
                                                <div id="emailHelp" class="form-text">Tu correo electrónico es el canal más idóneo para enviarte información de mucho valor.</div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row mb-3">
                                    <label for="status"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Estado: *') }}</label>

                                    <div class="col-md-6">

                                        <select id="status" name="status"
                                            class="form-select @error('status') is-invalid @enderror" required>
                                            <option value="1"
                                                {{ old('status', $subscriber->status) == 1 ? 'selected' : '' }}>Activo</option>
                                            <option value="0"
                                                {{ old('status', $subscriber->status) == 0 ? 'selected' : '' }}>Inactivo</option>
                                        </select>

                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-send-check-fill"> {{ __('Actualizar') }} </i>
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
