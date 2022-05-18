{{-- @extends('layouts.app') --}}
@extends('index')


@section('content')
<section  style="background-color: #eee;">
    <div class="container py-5" style="margin-top: 80px">
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
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="dia1" role="tabpanel" aria-labelledby="dia1-tab">
                        <div class="col-sm-12 col-md-6 col-lg-3 mb-3 mb-lg-0">
                            @foreach ($products as $pro)
                                @if($pro->day === 'Dia_1')
                                    <div class="card" style="margin-bottom: 20px; height: auto;">
                                        <img src="{{ asset('/public/storage/'.$pro->poster) }}" class="card-img-top mx-auto" style="height: 150px; width: 150px;display: block;" alt="{{ $pro->name }}">
                                        <div class="card-body">
                                            <p class="lead mb-0"><a href=""><h4 class="card-title h5">{{ $pro->name }}</h4></a></p>
                                            <!-- <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                            style="width: 35px; height: 35px;">
                                            <p class="text-white mb-0 small">{{ $pro->day }}</p>
                                            </div> -->
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
                                                        <button class="btn btn-secondary btn-sm" class="tooltip-test" title="Agregar al Carrito">
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
                    <!-- fin tab-dia1 -->
                    <div class="tab-pane fade" id="dia2" role="tabpanel" aria-labelledby="dia2-tab">
                    @foreach ($products as $pro)
                        @if($pro->day === 'Dia_1')
                        <div class="row">
                            <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
                                <div class="card">
                                    <div class="d-flex justify-content-between p-3">
                                        <p class="lead mb-0"> <strong> {{ $pro->name }} </strong></p>
                                        <div
                                        class="bg-danger rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                        style="width: 35px; height: 35px;">
                                        <p class="text-white mb-0 small">{{$pro->day}}</p>
                                        </div>
                                    </div>
                                    <img src="{{ asset('/public/storage/'.$pro->poster) }}"
                                        class="card-img-top" alt="{{ $pro->name }}" />
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-3">
                                            <p class="text-left h2"> <strong>${{ number_format($pro->priceSell,2,'.',',') }} {{$ipInfo['currency_code']!=='COP'?'USD':'COP'}}</strong></p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="small"><a data-bs-toggle="collapse" href="#listVideo{{$pro->id}}" class="btn btn-sm btn-info h4 text-white"><i class="bi bi-eye-fill"></i> Videos</a></p>
                                            <p><span class="small text-info fw-bold h4">{{$pro->videos->count()}}</span></p>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <div class="collapse card text-center" id="listVideo{{$pro->id}}">
                                                @foreach($pro->videos as $video)
                                                    <ul class="list-group">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center" style="height: 27px;">
                                                            <b class="fw-light"><i class="bi bi-film"> {{$video->title}}</i></b>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer" style="background-color: white;">
                                        <div class="row">
                                            <button class="btn btn-secondary btn-sm" class="tooltip-test" title="Agregar al Carrito">
                                                <i class="bi bi-cart-plus-fill"></i> Agregar al Carrito
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                       <!--  fila fin -->
                       @endif
                    @endforeach
                    </div>
                    <!-- fin tab-dia2 -->
                    <div class="tab-pane fade" id="dia3" role="tabpanel" aria-labelledby="dia3-tab">Contenido dia 3

                    </div>
                    <!-- fin tab-dia3 -->
                    <div class="tab-pane fade" id="dia4" role="tabpanel" aria-labelledby="dia4-tab">Contenido dia 4

                    </div>
                    <!-- fin tab-dia4 -->
                    <div class="tab-pane fade" id="dia5" role="tabpanel" aria-labelledby="dia5-tab">Contenido dia 5

                    </div>
                    <!-- fin tab-dia5 -->
                    <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">Todo el Contenido

                    </div>
                    <!-- fin tab-all -->
                    <div class="tab-pane fade" id="donation" role="tabpanel" aria-labelledby="donation-tab">Donaciones

                    </div>
                    <!-- fin tab-donation -->
                </div>

            </div>
        </div>
    </div>
</section>    
@endsection
