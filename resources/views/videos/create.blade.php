@extends('index')

@section('title', 'Video')

@section('content')

    <!-- ======= Video-create Section ======= -->
    <section id="login" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('CREANDO UN VIDEO') }}</div>

                        <div class="card-body">
                            <div class="btn-group">
                                <a class="btn btn-outline-success" href="{{ route('videos.index') }}">
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
                            <form method="POST" action="{{ route('videos.store') }}" enctype="multipart/form-data">
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
                                    <label for="description"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Descripción *:') }}</label>

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
                                    <label for="url"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Video:') }}</label>

                                    <div class="col-md-6">
                                        <input id="url" type="file"
                                            class="form-control @error('url') is-invalid @enderror" name="url">

                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="urlText"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nombre del Archivo en Disco: ') }}</label>

                                    <div class="col-md-6">
                                        <input id="urlText" type="text"
                                            class="form-control @error('urlText') is-invalid @enderror" name="urlText"
                                            value="{{ old('urlText') }}" autocomplete="urlText" autofocus>
                                            <div id="urlTextHelp" class="form-text alert alert-warning" role="alert">
                                                Si el tamaño del archivo supera las <strong> 500MB </strong>, por favor carguelo utilizando el servicio de FTP del hosting en: <br>
                                                <b> public\storage\videos </b> y registre en este campo el nombre del archivo con su extensión.
                                            </div>

                                        @error('urlText')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label for="poster"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Poster: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="poster" type="file"
                                            class="form-control @error('poster') is-invalid @enderror" name="poster" required>

                                        @error('poster')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}


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
                                            <i class="bi bi-send-check-fill"> {{ __('Guardar Video') }} </i>
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
    <!-- End Videos-create Section -->
@endsection
