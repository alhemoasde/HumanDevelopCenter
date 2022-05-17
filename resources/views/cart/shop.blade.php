{{-- @extends('layouts.app') --}}
@extends('index')


@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tienda</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <hr>
                <h2 class="text-center h2">:: Productos Disponibles ::</h2>
                <hr>
                <ul class="nav nav-tabs" id="tabProduct" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#dia1" type="button" role="tab" aria-controls="home" aria-selected="true">Día 1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#dia2" type="button" role="tab" aria-controls="profile" aria-selected="false">Día 2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#dia3" type="button" role="tab" aria-controls="contact" aria-selected="false">Día 3</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#dia4" type="button" role="tab" aria-controls="contact" aria-selected="false">Día 4</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#dia5" type="button" role="tab" aria-controls="contact" aria-selected="false">Día 5</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#dia5" type="button" role="tab" aria-controls="contact" aria-selected="false">Día 5</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dia1" role="tabpanel" aria-labelledby="dia1-tab">
                    <div class="col-lg-3">
                        @foreach ($products as $pro)
                            @if($pro->day === 'Dia_1')
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="{{ asset('/public/storage/'.$pro->poster) }}" class="card-img-top mx-auto" style="height: 150px; width: 150px;display: block;" alt="{{ $pro->name }}">
                                <div class="card-body">
                                    <a href=""><h4 class="card-title h5">{{ $pro->name }}</h4></a>
                                    <p class="text-left h2"> <strong>${{ number_format($pro->priceSell,2,'.',',') }} {{$ipInfo['currency_code']!=='COP'?'USD':'COP'}}</strong></p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                                                <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                                                <input type="hidden" value="{{ $pro->priceSell }}" id="price" name="price">
                                                                <input type="hidden" value="{{ asset('/public/storage/'.$pro->poster) }}" id="img" name="img">
                                                                {{-- <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug"> --}}
                                                                <input type="hidden" value="1" id="quantity" name="quantity">
                                                                <a class="btn btn-sm btn-info fw-bold" data-bs-toggle="collapse" href="#listVideo{{$pro->id}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                                                <i class="bi bi-eye-fill"></i> Ver Videos</a>
                                                                <div class="collapse card text-center" id="listVideo{{$pro->id}}">
                                                                    @foreach($pro->videos as $video)
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item d-flex justify-content-between align-items-center" style="height: 27px;">
                                                                            <b class="fw-light"><i class="bi bi-film"> {{$video->title}}</i></b>
                                                                        </li>
                                                                    </ul>
                                                                    @endforeach
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="card-footer" style="background-color: white;">
                                                                    <div class="row">
                                                                        <button class="btn btn-secondary btn-sm" class="tooltip-test"
                                                                            title="Agregar al Carrito">
                                                                            <i class="bi bi-cart-plus-fill"></i> Agregar al Carrito
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
