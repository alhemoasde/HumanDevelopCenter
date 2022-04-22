@extends('index')

@section('title', 'Evento')

@section('content')

    <!-- ======= Events-edit Section ======= -->
    <section id="login" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('EDITAR EVENTO') }}</div>

                        <div class="card-body">
                            <a class="btn btn-outline-success" href="{{ route('events.index') }}">
                                <i class="bi bi-arrow-left-square-fill"> Volver</i>
                            </a>
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
                            <form method="POST" action="{{ route('events.update', $event) }}">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="title"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Titulo: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ old('title', $event->title) }}" required autocomplete="title" autofocus>

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
                                            required>{{ old('descripion', $event->descripion) }}</textarea>

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
                                            value="{{ old('dateStart', $event->dateStart) }}" autocomplete="dateStart" autofocus>

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
                                            value="{{ old('hourStart', $event->hourStart) }}" autocomplete="hourStart" autofocus>

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
                                            value="{{ old('dateFinish', $event->dateFinish) }}" autocomplete="dateFinish" autofocus>

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
                                            value="{{ old('hourFinish', $event->hourFinish) }}" autocomplete="hourFinish" autofocus>

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
                                            <option value="Programado" {{ old('status', $event->status) == 'Programado' ? 'selected' : '' }}>Programado</option>
                                            <option value="En Desarrollo" {{ old('status', $event->status) == 'En Desarrollo' ? 'selected' : '' }}>En Desarrollo</option>
                                            <option value="Finalizado" {{ old('status', $event->status) == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                                            <option value="Aplazado" {{ old('status', $event->status) == 'Aplazado' ? 'selected' : '' }}>Aplazado</option>
                                            <option value="Cancelado" {{ old('status', $event->status) == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
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
    <!-- End Events-edit Section -->
@endsection
