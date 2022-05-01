@extends('index')

@section('title', 'Producto')

@section('css')
<link href="{{ asset('/assets/vendor/bootstrap-select/css/bootstrap-select.min.css') }}"
        rel="stylesheet">
@endsection

@section('content')

    <!-- ======= Producto-edit Section ======= -->
    <section id="product" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('EDITAR PRODUCTO') }}</div>

                        <div class="card-body">
                            <a class="btn btn-outline-success" href="{{ route('products.index') }}">
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
                            <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nombre: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $product->name) }}" required autocomplete="name" autofocus>

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
                                            required>{{ old('description', $product->description) }}</textarea>

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
                                            value="{{ old('codec', $product->codec) }}" required autocomplete="codec" autofocus>

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
                                                value="{{ old('priceBuy', $product->priceBuy) }}" autocomplete="priceBuy" autofocus>

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
                                                name="priceSell" value="{{ old('priceSell', $product->priceSell) }}" required
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
                                            value="{{ old('paymentLink', $product->paymentLink) }}" autocomplete="paymentLink" autofocus>

                                        @error('paymentLink')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- @if ($product->video)
                                    <div class="row mb-3">
                                        <label for="videoOld"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Video Actual:') }}</label>

                                        <div class="col-md-6">
                                            <img src="{{ asset('/public/storage/'.$product->video) }}" width="60px" height="60px" class="img-fluid">
                                        </div>
                                    </div>
                                @endif --}}

                                {{-- <div class="row mb-3">
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
                                </div> --}}

                                @if ($product->poster)
                                    <div class="row mb-3">
                                        <label for="posterOld"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Poster Actual:') }}</label>

                                        <div class="col-md-6">
                                            <img src="{{ asset('/public/storage/'.$product->poster) }}" width="60px" height="60px" alt="poster Anterior" class="img-fluid">
                                        </div>
                                    </div>
                                @endif

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
                                                {{ old('status') == $product->status ? 'selected' : '' }}>Activo</option>
                                            <option value="0"
                                                {{ old('status') == $product->status ? 'selected' : '' }}>Inactivo</option>
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
                                                {{ old('type') == $product->type ? 'selected' : '' }}>Digital</option>
                                            <option value="Fisico"
                                                {{ old('type') == $product->type ? 'selected' : '' }}>Físico</option>
                                        </select>

                                        @error('type')
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
                                                {{ old('day',$product->day) == '' ? 'selected' : '' }}>Seleccione un Día...</option>
                                            <option value="Dia 1"
                                                {{ old('day',$product->day) == 'Dia 1' ? 'selected' : '' }}>Día 1</option>
                                            <option value="Dia 2"
                                                {{ old('day',$product->day) == 'Dia 2' ? 'selected' : '' }}>Día 2</option>
                                            <option value="Dia 3"
                                                {{ old('day',$product->day) == 'Dia 3' ? 'selected' : '' }}>Día 3</option>
                                            <option value="Dia 4"
                                                {{ old('day',$product->day) == 'Dia 4' ? 'selected' : '' }}>Día 4</option>
                                            <option value="Dia 5"
                                                {{ old('day',$product->day) == 'Dia 5' ? 'selected' : '' }}>Día 5</option>
                                            <option value="Dia 6"
                                                {{ old('day',$product->day) == 'Dia 6' ? 'selected' : '' }}>Día 6</option>
                                            <option value="Dia 7"
                                                {{ old('day',$product->day) == 'Dia 7' ? 'selected' : '' }}>Día 7</option>
                                            <option value="Dia 8"
                                                {{ old('day',$product->day) == 'Dia 8' ? 'selected' : '' }}>Día 8</option>
                                            <option value="Dia 9"
                                                {{ old('day',$product->day) == 'Dia 9' ? 'selected' : '' }}>Día 9</option>
                                            <option value="Dia 10"
                                                {{ old('day',$product->day) == 'Dia 10' ? 'selected' : '' }}>Día 10</option>
                                                    
                                        </select>

                                        @error('day')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="category"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Asignar Categoría: ') }}</label>

                                    <div class="col-md-6">

                                        <select id="category" name="category"
                                            class="form-select @error('category') is-invalid @enderror">
                                            <option value=""
                                                {{ old('category',$product->category) == '' ? 'selected' : '' }}>Seleccione una Categoria...</option>
                                            <option value="Algo Para Ti"
                                                {{ old('category',$product->category) == 'Algo Para Ti' ? 'selected' : '' }}>Algo Para Ti</option>
                                            <option value="Ponencia"
                                                {{ old('category',$product->category) == 'Ponencia' ? 'selected' : '' }}>Ponencia</option>
                                            <option value="Historia De Vida"
                                                {{ old('category',$product->category) == 'Historia De Vida' ? 'selected' : '' }}>Historia De Vida</option>
                                            
                                        </select>

                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="events_id"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Asignar Evento: *') }}</label>

                                    <div class="col-md-6">

                                        <select id="events_id" name="events_id"
                                            class="form-select @error('events_id') is-invalid @enderror" required>
                                            @foreach ($events as $event)
                                                <option value="{{$event->id}}"
                                                {{ old('events_id',$product->events_id) == $event->id ? 'selected' : '' }}>{{$event->id}} - {{ date('d/m/Y', strtotime($event->dateStart)) }} -> {{$event->title}}</option>
                                            @endforeach
                                        </select>

                                        @error('events_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <label for="videosActual"
                                        class="col-md-4 col-form-label text-md-end"><h6>Videos Asignados Actualmente:</h6></label>
                                    <div class="col-md-6">
                                        <ul>
                                            @foreach ($product->videos as $vide)
                                                <li>{{$vide->title}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="videos"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Actualizar Videos del Producto: ') }}</label>
                                        
                                    <div class="col-md-6">
                                        <select id="videos" data-style="btn-secondary" name="videos[]" size="6" class="selectpicker form-select-lg mb-3 @error('videos') is-invalid @enderror" 
                                        data-live-search="true" aria-label="Selector de videos" multiple title="Seleccione uno o mas videos." required>
                                            
                                            @foreach ( $videos as $video )
                                            <option value="{{$video->id}}" data-tokens="{{$video->id}}"
                                                {{ $product->videos->contains($video) ? 'selected' : '' }}>{{$video->id}} {{$video->title}}</option>    
                                            @endforeach
                                        </select>
                                        @error('videos')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>

                                

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary submint-cdh">
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
    <!-- End Producto-edit Section -->
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="{{ asset('/assets/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"> </script>
<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
@endsection