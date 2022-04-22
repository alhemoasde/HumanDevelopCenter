@extends('index')

@section('title', 'Evento')

@section('content')

    <!-- ======= Events-create Section ======= -->
    <section id="login" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('CREANDO UN EVENTO') }}</div>

                        <div class="card-body">
                            <div class="btn-group">
                                <a class="btn btn-outline-success" href="{{ route('events.index') }}">
                                    <i class="bi bi-arrow-left-square-fill"> Volver</i>
                                </a>
                            </div>
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
                            <form method="POST" action="{{ route('events.store') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="title"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Titulo: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ old('title') }}" required autocomplete="title" autofocus>

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="descripion"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Descripción del Evento *:') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="descripion" rows="2" class="form-control @error('descripion') is-invalid @enderror" name="descripion"
                                            autocomplete="descripion" autofocus
                                            required>{{ old('descripion') }}</textarea>

                                        @error('descripion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="dateStart"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Inicio: ') }}</label>

                                    <div class="col-md-6">
                                        <input id="dateStart" type="date"
                                            class="form-control @error('dateStart') is-invalid @enderror" name="dateStart"
                                            value="{{ old('dateStart') }}" autocomplete="dateStart" autofocus>

                                        @error('dateStart')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="hourStart"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Hora de Inicio: ') }}</label>

                                    <div class="col-md-6">
                                        <input id="hourStart" type="time"
                                            class="form-control @error('hourStart') is-invalid @enderror" name="hourStart"
                                            value="{{ old('hourStart') }}" autocomplete="hourStart" autofocus>

                                        @error('hourStart')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="dateFinish"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Finalización: ') }}</label>

                                    <div class="col-md-6">
                                        <input id="dateFinish" type="date" 
                                            class="form-control @error('dateFinish') is-invalid @enderror" name="dateFinish"
                                            value="{{ old('dateFinish') }}" autocomplete="dateFinish" autofocus>

                                        @error('dateFinish')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="hourFinish"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Hora de Finalización: ') }}</label>

                                    <div class="col-md-6">
                                        <input id="hourFinish" type="time"
                                            class="form-control @error('hourFinish') is-invalid @enderror" name="hourFinish"
                                            value="{{ old('hourFinish') }}" autocomplete="hourFinish" autofocus>

                                        @error('hourFinish')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="status"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Estado: *') }}</label>

                                    <div class="col-md-6">

                                        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                                            <option value="Programado" {{ old('status') == 'Programado' ? 'selected' : '' }}>Programado</option>
                                            <option value="En Desarrollo" {{ old('status') == 'En Desarrollo' ? 'selected' : '' }}>En Desarrollo</option>
                                            <option value="Finalizado" {{ old('status') == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                                            <option value="Aplazado" {{ old('status') == 'Aplazado' ? 'selected' : '' }}>Aplazado</option>
                                            <option value="Cancelado" {{ old('status') == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
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
                                            <i class="bi bi-send-check-fill"> {{ __('Guardar Evento') }} </i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <br>
        <br>
    </section>
    <!-- End Events-create Section -->
@endsection
