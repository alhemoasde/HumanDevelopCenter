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
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h2 class="h2">:: Productos Disponibles ::</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach ($products as $pro)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="{{ asset('/storage/'.$pro->poster) }}" class="card-img-top mx-auto"
                                    style="height: 150px; width: 150px;display: block;" alt="{{ $pro->name }}">
                                <div class="card-body">
                                    <a href="">
                                        <h4 class="card-title h4">{{ $pro->name }}</h4>
                                    </a>
                                    <p> <strong>${{ $pro->priceSell }}</strong></p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->priceSell }}" id="price" name="price">
                                        <input type="hidden" value="{{ asset('/public/storage/'.$pro->poster) }}" id="img" name="img">
                                        {{-- <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug"> --}}
                                        <input type="hidden" value="1" id="quantity" name="quantity">
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
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
