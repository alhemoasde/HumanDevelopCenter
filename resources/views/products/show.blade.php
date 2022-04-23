@extends('index')

@section('content')
<!-- ======= Product-view Section ======= -->
<section id="product-view" class="section-bg">
    <br>
    <br>
    <br>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h1> {{ $product->name }} </h1>
                </div>
                <a class="btn btn-outline-success" href="{{ route('products.index') }}">
                    <i class="bi bi-arrow-left-square-fill"> Volver</i>
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <ul class="list-group row">

                    <li class="list-group-item">
                        <label for="name"><strong>Nombre:</strong></label>
                        <p id="name"><h1 class="display-6">{{ $product->name }}</h1></p>
                    </li>

                    <li class="list-group-item" style="text-align: justify;">
                        <label for="description"><strong>Descripción:</strong></label>
                        <p id="description">{{ $product->description }}</p>
                    </li>
                    
                    <li class="list-group-item col-sm-6">
                        <label for="codec"><strong>Codigo:</strong></label>
                        <p id="codec">{{ $product->codec }}</p>
                    </li>

                    <div class="row">
                        <li class="list-group-item col-sm-6">
                            <label for="priceBuy"><strong>Precio de Compra:</strong></label>
                            <p id="priceBuy">{{ $product->priceBuy }}</p>
                        </li>

                        <li class="list-group-item col-sm-6">
                            <label for="priceSell"><strong>Precio de Venta:</strong></label>
                            <p id="priceSell">{{ $product->priceSell }}</p>
                        </li>
                    </div>

                    <li class="list-group-item col-sm-6">
                        <label for="paymentLink"><strong>Enlace Unico de Pago:</strong></label>
                        <p id="paymentLink"> <a href="{{ $product->paymentLink }}">{{ $product->paymentLink }}</a></p>
                    </li>

                    <div class="row">
                        <li class="list-group-item col-sm-6">
                            <label for="video"><strong>Video:</strong></label>
                            <video id="video" src="{{ asset('/public/storage/'.$product->video) }}" width="60px" height="60px"></video>
                        </li>
                        <li class="list-group-item col-sm-6">
                            <label for="poster"><strong>Poster:</strong></label>
                            <img id="poster" src="{{ asset('/public/storage/'.$product->poster)}}" width="60px" height="60px" alt="Portada del Producto">
                        </li>
                    </div>
                    <li class="list-group-item col-sm-6">
                        <label for="event"><strong>Evento:</strong></label>
                        <p id="event">{{ $product->event }}</p>
                    </li>
                    <li class="list-group-item col-sm-6">
                        <label for="type"><strong>Tipo:</strong></label>
                        <p id="type">{{ $product->type }}</p>
                    </li>
                    <li class="list-group-item">
                        <label for="status"><strong>Estado:</strong></label>
                        <p id="status"><h1 class="display-6">{{ $product->status == 1 ? 'Activo' : 'Inactivo'}}</h1></p>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <br>
    <br>
</section>
<!-- End Produc-view Section -->
@endsection