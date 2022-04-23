@extends('index')

@section('title', 'Product')

@section('content')

    <!-- ======= Product-create Section ======= -->
    <section id="login" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('CREANDO UN PRODUCTO') }}</div>

                        <div class="card-body">
                            <div class="btn-group">
                                <a class="btn btn-outline-success" href="{{ route('products.index') }}">
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
                            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nombre: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="description"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Descripción del Producto *:') }}</label>

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
                                    <label for="codec"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Codigo: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="codec" type="text"
                                            class="form-control @error('codec') is-invalid @enderror" name="codec"
                                            value="{{ old('codec') }}" required autocomplete="codec" autofocus>

                                        @error('codec')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3" >
                                    <div class="row mb-3">
                                        <label for="priceBuy"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Precio de Compra: ') }}</label>

                                        <div class="col-md-6">
                                            <input id="priceBuy" type="number" min="1" step="any"
                                                class="form-control @error('priceBuy') is-invalid @enderror" name="priceBuy"
                                                value="{{ old('priceBuy') }}" autocomplete="priceBuy" autofocus>

                                            @error('priceBuy')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="priceSell"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Precio de Venta: *') }}</label>

                                        <div class="col-md-6">
                                            <input id="priceSell" type="number" min="1" step="any"
                                                class="form-control @error('priceSell') is-invalid @enderror"
                                                name="priceSell" value="{{ old('priceSell') }}" required
                                                autocomplete="priceSell" autofocus>

                                            @error('priceSell')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="paymentLink"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Enlace Único Pago: ') }}</label>

                                    <div class="col-md-6">
                                        <input id="paymentLink" type="url"
                                            class="form-control @error('paymentLink') is-invalid @enderror" name="paymentLink"
                                            value="{{ old('paymentLink') }}" autocomplete="paymentLink" autofocus>

                                        @error('paymentLink')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="video"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Video:') }}</label>

                                    <div class="col-md-6">
                                        <input id="video" type="file"
                                            class="form-control @error('video') is-invalid @enderror" name="video">

                                        @error('video')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
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

                                <div class="row mb-3">
                                    <label for="type"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Tipo: *') }}</label>

                                    <div class="col-md-6">

                                        <select id="type" name="type"
                                            class="form-select @error('type') is-invalid @enderror" required>
                                            <option value="Digital"
                                                {{ old('type') == 'Digital' ? 'selected' : '' }}>Digital</option>
                                            <option value="Fisico"
                                                {{ old('type') == 'Fisico' ? 'selected' : '' }}>Físico</option>
                                        </select>

                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="event"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Asignar Evento: *') }}</label>

                                    <div class="col-md-6">

                                        <select id="event" name="event"
                                            class="form-select @error('event') is-invalid @enderror" required>
                                            @foreach ($events as $event)
                                                <option value="{{$event->id}}"
                                                {{ old('event') == $event->id ? 'selected' : '' }}>{{$event->id}} - {{ date('d/m/Y', strtotime($event->dateStart)) }} -> {{$event->title}}</option>
                                            @endforeach
                                        </select>

                                        @error('event')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-send-check-fill"> {{ __('Guardar Producto') }} </i>
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
