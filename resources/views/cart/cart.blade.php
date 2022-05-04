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
                        <div class="col-md-5">
                            <img src="{{ $item->attributes->image }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-md-5">
                            <b><a href="/shop/{{ $item->attributes->slug }}">{{ $item->name }}</a></b><br>
                                <b>Precio: </b>${{ $item->price }} USD<br>
                                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }} USD<br>
                                {{-- <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }} --}}
                        </div>
                        <div class="col-md-2">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">  
                                    <input type="number" class="form-control text-center" style="width: 70%;" value="{{ $item->quantity }}" id="quantity" name="quantity">
                                    <button class="btn btn-outline-secondary" style="width: 70%;"><i class="bi bi-arrow-repeat"></i></button>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-outline-secondary" style="width: 70%;"><i class="bi bi-trash-fill"></i></button>
                                </form>
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
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Artículo(s) </b>
                            <span class="badge bg-dark rounded-pill">{{ \Cart::getTotalQuantity() }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Transporte: </b>
                            <span class="badge bg-dark rounded-pill">0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Impuestos: </b>
                            <span class="badge bg-dark rounded-pill">0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <b>Total: </b>
                            <span class="badge bg-danger rounded-pill">$ {{ \Cart::getTotal() }} USD</span>
                        </li>
                    </ul>
                    <img class="img-fluid img-thumbnail" src="img/ePayco-Medios-de-Pago.png" alt="Medios de pago disponibles.">  
                    </div>
                    <br><a href="/shop" class="btn btn-dark"><i class="bi bi-basket-fill"> Continuar Comprando</i></a>
                    <!-- <a href="/checkout" class="btn btn-success"><i class="bi bi-paypal"> Procesar Pago</i></a> -->
                    <script src="https://checkout.epayco.co/checkout.js" class="epayco-button"
                        data-epayco-key="eda14fc53c7f3e9af3e97901a7f27d68" 
                        data-epayco-amount="{{ \Cart::getTotal() }}"
                        data-epayco-name="Centro de Desarrollo Humano" 
                        data-epayco-description="Compra Producto Digital"
                        data-epayco-currency="usd" 
                        data-epayco-country="co" 
                        data-epayco-test="true"
                        data-epayco-invoice="ABC123"
                        data-epayco-external="true" 
                        data-epayco-response="http://localhost:8000/checkout"
                        data-epayco-confirmation="http://localhost:8000/checkout" 
                        data-epayco-methodconfirmation="get">
                        data-epayco-autoclick="true"                           
                    </script>
                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection
