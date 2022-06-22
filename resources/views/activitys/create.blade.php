@extends('index')

@section('title', 'Actividad')

@section('content')

    <!-- ======= Activity-create Section ======= -->
    <section id="login" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Crear Actividad para el') }} <strong> {{$event->title}} </strong></div>

                        <div class="card-body">
                            <div class="btn-group">
                                <a class="btn btn-outline-success" href="{{ route('activitys.index', $event) }}">
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
                            <form method="POST" action="{{ route('eventActivitys.store') }}">
                                @csrf
                                <input type="hidden" name="events_id" id="events_id" value="{{$event->id}}">
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
                                        class="col-md-4 col-form-label text-md-end">{{ __('Descripción de la Actividad *:') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="description" rows="2" class="form-control @error('description') is-invalid @enderror" name="description"
                                            autocomplete="description" autofocus
                                            required>{{ old('description') }}</textarea>

                                        @error('description')
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
                                    <label for="hoursFinish"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Hora de Finalización: ') }}</label>

                                    <div class="col-md-6">
                                        <input id="hoursFinish" type="time"
                                            class="form-control @error('hoursFinish') is-invalid @enderror" name="hoursFinish"
                                            value="{{ old('hoursFinish') }}" autocomplete="hoursFinish" autofocus>

                                        @error('hoursFinish')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="users_id"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Asignar Ponente: *') }}</label>

                                    <div class="col-md-6">

                                        <select id="users_id" name="users_id"
                                            class="form-select @error('users_id') is-invalid @enderror" required>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}"
                                                {{ old('user') == $user->id ? 'selected' : '' }}>{{$user->id}} -> {{$user->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('users_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="day"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Asignar Día: ') }}</label>

                                    <div class="col-md-6">

                                        <select id="day" name="day"
                                            class="form-select @error('day') is-invalid @enderror">
                                            <option value=""
                                                {{ old('day') == '' ? 'selected' : '' }}>Seleccione un Día...</option>
                                            <option value="Dia_1"
                                                {{ old('day') == 'Dia_1' ? 'selected' : '' }}>Día 1</option>
                                            <option value="Dia_2"
                                                {{ old('day') == 'Dia_2' ? 'selected' : '' }}>Día 2</option>
                                            <option value="Dia_3"
                                                {{ old('day') == 'Dia_3' ? 'selected' : '' }}>Día 3</option>
                                            <option value="Dia_4"
                                                {{ old('day') == 'Dia_4' ? 'selected' : '' }}>Día 4</option>
                                            <option value="Dia_5"
                                                {{ old('day') == 'Dia_5' ? 'selected' : '' }}>Día 5</option>
                                            <option value="Dia_6"
                                                {{ old('day') == 'Dia_6' ? 'selected' : '' }}>Día 6</option>
                                            <option value="Dia_7"
                                                {{ old('day') == 'Dia_7' ? 'selected' : '' }}>Día 7</option>
                                            <option value="Dia_8"
                                                {{ old('day') == 'Dia_8' ? 'selected' : '' }}>Día 8</option>
                                            <option value="Dia_9"
                                                {{ old('day') == 'Dia_9' ? 'selected' : '' }}>Día 9</option>
                                            <option value="Dia_10"
                                                {{ old('day') == 'Dia_10' ? 'selected' : '' }}>Día 10</option>    
                                        </select>

                                        @error('day')
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

                                        <select id="status" name="status"
                                            class="form-select @error('status') is-invalid @enderror" required>
                                            <option value="1"
                                                {{ old('status') == '1' ? 'selected' : '' }}>Activo</option>
                                            <option value="0"
                                                {{ old('status') == '0' ? 'selected' : '' }}>Inactivo</option>
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
                                            <i class="bi bi-send-check-fill"> {{ __('Guardar Actividad') }} </i>
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
    <!-- End Activity-create Section -->
@endsection
