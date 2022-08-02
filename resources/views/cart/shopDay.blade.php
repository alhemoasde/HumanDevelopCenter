{{-- @extends('layouts.app') --}}
@extends('index')


@section('content')
    <section id="shop">
        <div class="container" style="margin-top: 80px">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tienda</li>
                </ol>
            </nav>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <hr>
                    <h2 class="text-center h2">:: Productos Disponibles ::</h2>
                    <hr>
                    <ul class="nav nav-tabs nav-pills mb-3" id="tabProduct" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="dia1-tab" data-bs-toggle="tab" data-bs-target="#dia1"
                                type="button" role="tab" aria-controls="dia_1" aria-selected="true"><i
                                    class="bi bi-tree-fill"></i> Día 1</button>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dia1" role="tabpanel" aria-labelledby="dia1-tab">
                            <div class="row">
                                @foreach ($products as $pro)
                                    @if ($pro->day === 'Dia_1')
                                        <div class="col-sm-12 col-md-4 col-lg-3 ">
                                            <div class="card" 
                                                style="margin-bottom: 5px; height: auto; background: radial-gradient(#e9686880, rgb(239 230 230 / 0%));">
                                                <div class="d-flex justify-content-between p-3" style="height: 100px">
                                                    <p class="text-sm-start text-capitalize fs-5" title="{{$pro->name}}"> <strong> {{ \Str::limit($pro->name, 25) }} </strong></p>
                                                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                        style="width: 45px; height: 45px;">
                                                        <p class="text-white mb-0 small">{{ $pro->day }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <img src="{{ asset('/public/storage/' . $pro->poster) }}"
                                                        class="card-img-top mx-autoimg-fluid img-thumbnail"
                                                        style="height: 180px; width: 180px; border-radius: 19px;"
                                                        alt="{{ $pro->name }}"/>
                                                </div>   
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <p class="text-left h3">
                                                            <strong>${{ number_format($pro->priceSell, 2, '.', ',') }}
                                                                {{ $ipInfo['currency_code'] !== 'COP' ? 'USD' : 'COP' }}</strong>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between" style="height: 38px">
                                                        <p class="small"><a data-bs-toggle="collapse"
                                                                href="#listVideo{{ $pro->id }}"
                                                                class="btn btn-sm btn-danger h4 text-white"><i
                                                                    class="bi bi-eye-fill"></i> Videos</a></p>
                                                        <p><span
                                                                class="small text-danger fw-bold h4">{{ $pro->videos->count() }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <div class="collapse card text-center"
                                                            id="listVideo{{ $pro->id }}">
                                                            @foreach ($pro->videos as $video)
                                                                <ul class="list-group">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                                                        style="height: 27px;">
                                                                        <b class="fw-light"><i class="bi bi-film">
                                                                                {{ $video->title }}</i></b>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                                    <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                                    <input type="hidden" value="{{ $pro->priceSell }}" id="price"
                                                        name="price">
                                                    <input type="hidden"
                                                        value="{{ asset('/public/storage/' . $pro->poster) }}" id="img"
                                                        name="img">
                                                    {{-- <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug"> --}}
                                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                                    <div class="card-footer" style="background-color: white;">
                                                        <div class="row">
                                                            <button class="btn btn-dark btn-sm" class="tooltip-test"
                                                                title="Agregar al Carrito">
                                                                <i class="bi bi-cart-plus-fill"></i> Agregar al Carrito
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <br>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- fin tab-dia1 -->
                        <div class="tab-pane fade" id="dia2" role="tabpanel" aria-labelledby="dia2-tab">
                            <div class="row">
                                @foreach ($products as $pro)
                                    @if ($pro->day === 'Dia_2')
                                        <div class="col-sm-12 col-md-4 col-lg-3 ">
                                            <div class="card" 
                                                style="margin-bottom: 5px; height: auto; background: radial-gradient(#e9686880, rgb(239 230 230 / 0%));">
                                                <div class="d-flex justify-content-between p-3" style="height: 100px">
                                                    <p class="text-sm-start text-capitalize fs-5" title="{{$pro->name}}"> <strong> {{ \Str::limit($pro->name, 25) }} </strong></p>
                                                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                        style="width: 45px; height: 45px;">
                                                        <p class="text-white mb-0 small">{{ $pro->day }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <img src="{{ asset('/public/storage/' . $pro->poster) }}"
                                                        class="card-img-top mx-autoimg-fluid img-thumbnail"
                                                        style="height: 180px; width: 180px; border-radius: 19px;"
                                                        alt="{{ $pro->name }}"/>
                                                </div>   
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <p class="text-left h3">
                                                            <strong>${{ number_format($pro->priceSell, 2, '.', ',') }}
                                                                {{ $ipInfo['currency_code'] !== 'COP' ? 'USD' : 'COP' }}</strong>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between" style="height: 38px">
                                                        <p class="small"><a data-bs-toggle="collapse"
                                                                href="#listVideo{{ $pro->id }}"
                                                                class="btn btn-sm btn-danger h4 text-white"><i
                                                                    class="bi bi-eye-fill"></i> Videos</a></p>
                                                        <p><span
                                                                class="small text-danger fw-bold h4">{{ $pro->videos->count() }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <div class="collapse card text-center"
                                                            id="listVideo{{ $pro->id }}">
                                                            @foreach ($pro->videos as $video)
                                                                <ul class="list-group">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                                                        style="height: 27px;">
                                                                        <b class="fw-light"><i class="bi bi-film">
                                                                                {{ $video->title }}</i></b>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                                    <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                                    <input type="hidden" value="{{ $pro->priceSell }}" id="price"
                                                        name="price">
                                                    <input type="hidden"
                                                        value="{{ asset('/public/storage/' . $pro->poster) }}" id="img"
                                                        name="img">
                                                    {{-- <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug"> --}}
                                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                                    <div class="card-footer" style="background-color: white;">
                                                        <div class="row">
                                                            <button class="btn btn-dark btn-sm" class="tooltip-test"
                                                                title="Agregar al Carrito">
                                                                <i class="bi bi-cart-plus-fill"></i> Agregar al Carrito
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <br>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!--  fila fin -->
                        </div>
                        <!-- fin tab-dia2 -->
                        <div class="tab-pane fade" id="dia3" role="tabpanel" aria-labelledby="dia3-tab">
                            <div class="row">
                                @foreach ($products as $pro)
                                    @if ($pro->day === 'Dia_3')
                                        <div class="col-sm-12 col-md-4 col-lg-3 ">
                                            <div class="card" 
                                                style="margin-bottom: 5px; height: auto; background: radial-gradient(#e9686880, rgb(239 230 230 / 0%));">
                                                <div class="d-flex justify-content-between p-3" style="height: 100px">
                                                    <p class="text-sm-start text-capitalize fs-5" title="{{$pro->name}}"> <strong> {{ \Str::limit($pro->name, 25) }} </strong></p>
                                                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                        style="width: 45px; height: 45px;">
                                                        <p class="text-white mb-0 small">{{ $pro->day }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <img src="{{ asset('/public/storage/' . $pro->poster) }}"
                                                        class="card-img-top mx-autoimg-fluid img-thumbnail"
                                                        style="height: 180px; width: 180px; border-radius: 19px;"
                                                        alt="{{ $pro->name }}"/>
                                                </div>   
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <p class="text-left h3">
                                                            <strong>${{ number_format($pro->priceSell, 2, '.', ',') }}
                                                                {{ $ipInfo['currency_code'] !== 'COP' ? 'USD' : 'COP' }}</strong>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between" style="height: 38px">
                                                        <p class="small"><a data-bs-toggle="collapse"
                                                                href="#listVideo{{ $pro->id }}"
                                                                class="btn btn-sm btn-danger h4 text-white"><i
                                                                    class="bi bi-eye-fill"></i> Videos</a></p>
                                                        <p><span
                                                                class="small text-danger fw-bold h4">{{ $pro->videos->count() }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <div class="collapse card text-center"
                                                            id="listVideo{{ $pro->id }}">
                                                            @foreach ($pro->videos as $video)
                                                                <ul class="list-group">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                                                        style="height: 27px;">
                                                                        <b class="fw-light"><i class="bi bi-film">
                                                                                {{ $video->title }}</i></b>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                                    <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                                    <input type="hidden" value="{{ $pro->priceSell }}" id="price"
                                                        name="price">
                                                    <input type="hidden"
                                                        value="{{ asset('/public/storage/' . $pro->poster) }}" id="img"
                                                        name="img">
                                                    {{-- <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug"> --}}
                                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                                    <div class="card-footer" style="background-color: white;">
                                                        <div class="row">
                                                            <button class="btn btn-dark btn-sm" class="tooltip-test"
                                                                title="Agregar al Carrito">
                                                                <i class="bi bi-cart-plus-fill"></i> Agregar al Carrito
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <br>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!--  fila fin -->
                        </div>
                        <!-- fin tab-dia3 -->
                        <div class="tab-pane fade" id="dia4" role="tabpanel" aria-labelledby="dia4-tab">
                            <div class="row">
                                @foreach ($products as $pro)
                                    @if ($pro->day === 'Dia_4')
                                        <div class="col-sm-12 col-md-4 col-lg-3 ">
                                            <div class="card" 
                                                style="margin-bottom: 5px; height: auto; background: radial-gradient(#e9686880, rgb(239 230 230 / 0%));">
                                                <div class="d-flex justify-content-between p-3" style="height: 100px">
                                                    <p class="text-sm-start text-capitalize fs-5" title="{{$pro->name}}"> <strong> {{ \Str::limit($pro->name, 25) }} </strong></p>
                                                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                        style="width: 45px; height: 45px;">
                                                        <p class="text-white mb-0 small">{{ $pro->day }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <img src="{{ asset('/public/storage/' . $pro->poster) }}"
                                                        class="card-img-top mx-autoimg-fluid img-thumbnail"
                                                        style="height: 180px; width: 180px; border-radius: 19px;"
                                                        alt="{{ $pro->name }}"/>
                                                </div>   
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <p class="text-left h3">
                                                            <strong>${{ number_format($pro->priceSell, 2, '.', ',') }}
                                                                {{ $ipInfo['currency_code'] !== 'COP' ? 'USD' : 'COP' }}</strong>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between" style="height: 38px">
                                                        <p class="small"><a data-bs-toggle="collapse"
                                                                href="#listVideo{{ $pro->id }}"
                                                                class="btn btn-sm btn-danger h4 text-white"><i
                                                                    class="bi bi-eye-fill"></i> Videos</a></p>
                                                        <p><span
                                                                class="small text-danger fw-bold h4">{{ $pro->videos->count() }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <div class="collapse card text-center"
                                                            id="listVideo{{ $pro->id }}">
                                                            @foreach ($pro->videos as $video)
                                                                <ul class="list-group">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                                                        style="height: 27px;">
                                                                        <b class="fw-light"><i class="bi bi-film">
                                                                                {{ $video->title }}</i></b>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                                    <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                                    <input type="hidden" value="{{ $pro->priceSell }}" id="price"
                                                        name="price">
                                                    <input type="hidden"
                                                        value="{{ asset('/public/storage/' . $pro->poster) }}" id="img"
                                                        name="img">
                                                    {{-- <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug"> --}}
                                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                                    <div class="card-footer" style="background-color: white;">
                                                        <div class="row">
                                                            <button class="btn btn-dark btn-sm" class="tooltip-test"
                                                                title="Agregar al Carrito">
                                                                <i class="bi bi-cart-plus-fill"></i> Agregar al Carrito
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <br>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!--  fila fin -->
                        </div>
                        <!-- fin tab-dia4 -->
                        <div class="tab-pane fade" id="dia5" role="tabpanel" aria-labelledby="dia5-tab">
                            <div class="row">
                                @foreach ($products as $pro)
                                    @if ($pro->day === 'Dia_5')
                                        <div class="col-sm-12 col-md-4 col-lg-3 ">
                                            <div class="card" 
                                                style="margin-bottom: 5px; height: auto; background: radial-gradient(#e9686880, rgb(239 230 230 / 0%));">
                                                <div class="d-flex justify-content-between p-3" style="height: 100px">
                                                    <p class="text-sm-start text-capitalize fs-5" title="{{$pro->name}}"> <strong> {{ \Str::limit($pro->name, 25) }} </strong></p>
                                                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                        style="width: 45px; height: 45px;">
                                                        <p class="text-white mb-0 small">{{ $pro->day }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <img src="{{ asset('/public/storage/' . $pro->poster) }}"
                                                        class="card-img-top mx-autoimg-fluid img-thumbnail"
                                                        style="height: 180px; width: 180px; border-radius: 19px;"
                                                        alt="{{ $pro->name }}"/>
                                                </div>   
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <p class="text-left h3">
                                                            <strong>${{ number_format($pro->priceSell, 2, '.', ',') }}
                                                                {{ $ipInfo['currency_code'] !== 'COP' ? 'USD' : 'COP' }}</strong>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between" style="height: 38px">
                                                        <p class="small"><a data-bs-toggle="collapse"
                                                                href="#listVideo{{ $pro->id }}"
                                                                class="btn btn-sm btn-danger h4 text-white"><i
                                                                    class="bi bi-eye-fill"></i> Videos</a></p>
                                                        <p><span
                                                                class="small text-danger fw-bold h4">{{ $pro->videos->count() }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <div class="collapse card text-center"
                                                            id="listVideo{{ $pro->id }}">
                                                            @foreach ($pro->videos as $video)
                                                                <ul class="list-group">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                                                        style="height: 27px;">
                                                                        <b class="fw-light"><i class="bi bi-film">
                                                                                {{ $video->title }}</i></b>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                                    <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                                    <input type="hidden" value="{{ $pro->priceSell }}" id="price"
                                                        name="price">
                                                    <input type="hidden"
                                                        value="{{ asset('/public/storage/' . $pro->poster) }}" id="img"
                                                        name="img">
                                                    {{-- <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug"> --}}
                                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                                    <div class="card-footer" style="background-color: white;">
                                                        <div class="row">
                                                            <button class="btn btn-dark btn-sm" class="tooltip-test"
                                                                title="Agregar al Carrito">
                                                                <i class="bi bi-cart-plus-fill"></i> Agregar al Carrito
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <br>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!--  fila fin -->
                        </div>
                        <!-- fin tab-dia5 -->
                        <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="row">
                                @foreach ($products as $pro)
                                        <div class="col-sm-12 col-md-4 col-lg-3 ">
                                            <div class="card" 
                                                style="margin-bottom: 5px; height: auto; background: radial-gradient(#e9686880, rgb(239 230 230 / 0%));">
                                                <div class="d-flex justify-content-between p-3" style="height: 100px">
                                                    <p class="text-sm-start text-capitalize fs-5" title="{{$pro->name}}"> <strong> {{ \Str::limit($pro->name, 25) }} </strong></p>
                                                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                        style="width: 45px; height: 45px;">
                                                        <p class="text-white mb-0 small">{{ $pro->day }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <img src="{{ asset('/public/storage/' . $pro->poster) }}"
                                                        class="card-img-top mx-autoimg-fluid img-thumbnail"
                                                        style="height: 180px; width: 180px; border-radius: 19px;"
                                                        alt="{{ $pro->name }}"/>
                                                </div>   
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <p class="text-left h3">
                                                            <strong>${{ number_format($pro->priceSell, 2, '.', ',') }}
                                                                {{ $ipInfo['currency_code'] !== 'COP' ? 'USD' : 'COP' }}</strong>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between" style="height: 38px">
                                                        <p class="small"><a data-bs-toggle="collapse"
                                                                href="#listVideo{{ $pro->id }}"
                                                                class="btn btn-sm btn-danger h4 text-white"><i
                                                                    class="bi bi-eye-fill"></i> Videos</a></p>
                                                        <p><span
                                                                class="small text-danger fw-bold h4">{{ $pro->videos->count() }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <div class="collapse card text-center"
                                                            id="listVideo{{ $pro->id }}">
                                                            @foreach ($pro->videos as $video)
                                                                <ul class="list-group">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                                                        style="height: 27px;">
                                                                        <b class="fw-light"><i class="bi bi-film">
                                                                                {{ $video->title }}</i></b>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                                    <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                                    <input type="hidden" value="{{ $pro->priceSell }}" id="price"
                                                        name="price">
                                                    <input type="hidden"
                                                        value="{{ asset('/public/storage/' . $pro->poster) }}" id="img"
                                                        name="img">
                                                    {{-- <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug"> --}}
                                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                                    <div class="card-footer" style="background-color: white;">
                                                        <div class="row">
                                                            <button class="btn btn-dark btn-sm" class="tooltip-test"
                                                                title="Agregar al Carrito">
                                                                <i class="bi bi-cart-plus-fill"></i> Agregar al Carrito
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <br>
                                        </div>
                                @endforeach
                            </div>
                            <!--  fila fin -->
                        </div>
                        <!-- fin tab-all -->
                        <div class="tab-pane fade" id="donation" role="tabpanel" aria-labelledby="donation-tab">
                            <!-- =========================================================================
                                ////// Tome este código y cópielo en el código fuente de su sitio web ////
                                ========================================================================== -->
                            <div id="miepayco">
                                <script defer type="text/javascript" src="https://mi-epayco.s3.amazonaws.com/embed.js"
                                                                miepaycoUrl="https://cdhumano.epayco.me"></script>
                            </div>
                            <!-- ================================================================== -->
                            <br>
                            <div style="text-align: center">
                                <h2>Donar con Paypal</h2>
                                <form action="https://www.paypal.com/donate" method="post" target="_top">
                                    <input type="hidden" name="hosted_button_id" value="ZFEUQPM6MJBDQ" />
                                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - La forma más segura y fácil de pagar en línea." alt="Donar con el botón de PayPal" />
                                    <img alt="" border="1" src="https://www.paypal.com/en_CO/i/scr/pixel.gif" width="1" height="1" />
                                </form>
                            </div>
                            <br>
                        </div>
                        <!-- fin tab-donation -->
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
