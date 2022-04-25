{{-- @extends('layouts.app') --}}
@extends('index')

@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/shop">Tienda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Carrito</li>
            </ol>
        </nav>
        @if (session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if (session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if (count($errors) > 0)
            @foreach ($errors0 > all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if (\Cart::getTotalQuantity() > 0)
                    {{-- <h4>{{ \Cart::getTotalQuantity() }} Producto(s) en el carrito</h4><br> --}}
                @else
                    <h4>No hay productos en su carrito!</h4><br>
                    <a href="/shop" class="btn btn-dark">Continuar Comprando</a>
                @endif

                @foreach ($cartCollection as $item)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-3">
                            <img src="{{ $item->attributes->image }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-6">
                            <b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b><br>
                                <b>Price: </b>${{ $item->price }} USD<br>
                                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }} USD<br>
                                {{-- <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }} --}}
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-3 mb-3">
                            <div class="btn-group" role="group" aria-label="Opciones">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    {{-- <div class="form-group row"> --}}
                                        
                                        <button class="btn btn-secondary btn-sm"><i class="bi bi-arrow-repeat"></i></button><br>
                                        <input type="hidden"  
                                            value="{{ $item->id }}" id="id" name="id">
                                        <input type="number" class="form-control text-center" style="width: 40%"
                                            value="{{ $item->quantity }}" id="quantity" name="quantity">
                                            
                                            
                                    {{-- </div> --}}
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-secondary btn-sm"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
         
                    <hr>
                @endforeach
                @if (count($cartCollection) > 0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">Borrar Carrito</button>
                    </form>
                @endif
            </div>
            @if (count($cartCollection) > 0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Artículo(s) </b>${{ \Cart::getTotal() }} USD</li>
                            <li class="list-group-item"><b>Transporte: </b>0 USD</li>
                            <li class="list-group-item"><b>Total Impuestos </b>0 USD</li>
                            <li class="list-group-item"><b>Total: </b>${{ \Cart::getTotal() }} USD</li>
                        </ul>
                    </div>
                    <br><a href="/shop" class="btn btn-dark"><i class="bi bi-basket-fill"> Continuar Comprando</i></a>
                    <a href="/checkout" class="btn btn-success"><i class="bi bi-paypal"> Procesar Pago</i></a>
                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection
