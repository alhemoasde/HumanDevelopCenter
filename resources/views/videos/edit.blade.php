@extends('index')

@section('title', 'Video')

@section('content')

    <!-- ======= Video-edit Section ======= -->
    <section id="login" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('EDITAR VIDEO') }}</div>

                        <div class="card-body">
                            <a class="btn btn-outline-success" href="{{ route('videos.index') }}">
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
                            <form method="POST" action="{{ route('videos.update', $video) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="title"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Titulo: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ old('title', $video->title) }}" required autocomplete="title" autofocus>

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
                                            required>{{ old('description', $video->description) }}</textarea>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                

                                @if ($video->url)
                                    <div class="row mb-3">
                                        <label for="videoOld"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Video Actual:') }}</label>

                                        <div class="col-md-6">
                                            <video id="myVideo" src="{{ asset('/public/storage/'.$video->url) }}" width="250px" height="250px" class="img-fluid" controls></video>
                                        </div>
                                    </div>
                                @endif

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
                                                <b> public\storage\videos </b> y registre en este campo el nombre del archivo con su extensión. <br>
                                                <hr>
                                                <p class="text-danger text-justify h4"><i class="bi bi-radioactive"> ¡Importante!</i> El video anterior será eliminado del disco con esta actualización.</p>
                                            </div>

                                        @error('urlText')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- @if ($product->poster)
                                    <div class="row mb-3">
                                        <label for="posterOld"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Poster Actual:') }}</label>

                                        <div class="col-md-6">
                                            <img src="{{ asset('/public/storage/'.$product->poster) }}" width="60px" height="60px" alt="poster Anterior" class="img-fluid">
                                        </div>
                                    </div>
                                @endif --}}

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
                                    <label for="users_id"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Reasignar Ponente: *') }}</label>

                                    <div class="col-md-6">

                                        <select id="users_id" name="users_id"
                                            class="form-select @error('users_id') is-invalid @enderror" required>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}"
                                                {{ old('user', $video->user->id) == $user->id ? 'selected' : '' }}>{{$user->id}} -> {{$user->name}}</option>
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
                                    <label for="status"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Estado: *') }}</label>

                                    <div class="col-md-6">

                                        <select id="status" name="status"
                                            class="form-select @error('status') is-invalid @enderror" required>
                                            <option value="1"
                                                {{ old('status') == $video->status ? 'selected' : '' }}>Activo</option>
                                            <option value="0"
                                                {{ old('status') == $video->status ? 'selected' : '' }}>Inactivo</option>
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
    <!-- End Video-edit Section -->
@endsection
