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
                            <b><a href="/shop/{{ $item->attributes->slug }}" class="itemsName">{{ $item->id }} -
                                    {{ $item->name }}</a></b><br>
                            <b>Precio: </b>${{ number_format($item->price, 2, '.', ',') }}
                            {{ $ipInfo['continent'] !== 'South America' ? 'USD' : 'COP' }}<br>
                            <b>Sub Total: </b>${{ number_format(\Cart::get($item->id)->getPriceSum(), 2, '.', ',') }}
                            {{ $ipInfo['continent'] !== 'South America' ? 'USD' : 'COP' }}<br>
                            {{-- <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }} --}}
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('cart.update') }}" method="POST">
                                {{ csrf_field() }}

                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                <input type="number" class="form-control text-center" style="width: 70%;"
                                    value="{{ $item->quantity }}" id="quantity" name="quantity">
                                <button class="btn btn-outline-secondary" style="width: 70%;"><i
                                        class="bi bi-arrow-repeat"></i></button>
                            </form>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                <button class="btn btn-outline-secondary" style="width: 70%;"><i
                                        class="bi bi-trash-fill"></i></button>
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
                                <span
                                    class="badge bg-dark rounded-pill">{{ number_format(\Cart::getTotalQuantity(), 2, '.', ',') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Transporte: </b>
                                <span class="badge bg-dark rounded-pill">0 {{ $ipInfo['continent'] !== 'South America' ? 'USD' : 'COP' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Impuestos: </b>
                                <span class="badge bg-dark rounded-pill">0 {{ $ipInfo['continent'] !== 'South America' ? 'USD' : 'COP' }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Total: </b>
                                <span class="badge bg-danger rounded-pill">$
                                    {{ number_format(\Cart::getTotal(), 2, '.', ',') }}
                                    {{ $ipInfo['continent'] !== 'South America' ? 'USD' : 'COP' }}</span>
                            </li>
                        </ul>
                        <img class="img-fluid img-thumbnail" src="img/ePayco-Medios-de-Pago.png"
                            alt="Medios de pago disponibles.">
                    </div>
                    <br><a href="/shop" class="btn btn-dark"><i class="bi bi-basket-fill"> Continuar Comprando</i></a>
                    <!-- <a href="/checkout" class="btn btn-success"><i class="bi bi-paypal"> Procesar Pago</i></a> -->
                    <!-- Vertically centered Modal -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#verticalycentered">
                        <i class="bi bi-paypal"> Procesar Pago</i>
                    </button>
                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <form id="saveCart" method="POST" action="{{ route('saveCart') }}" target="/shop">
                                @csrf
                                @method('post')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Datos del Suscriptor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <!-- Name input -->
                                                <div class="form-outline">
                                                    <label class="form-label" for="checkoutName">Nombre:</label>
                                                    <input type="text" id="checkoutName" name="checkoutName"
                                                        class="form-control" value="{{ old('checkoutName') }}"
                                                        required />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <!-- Email input -->
                                                <div class="form-outline">
                                                    <label class="form-label" for="checkoutEmail">Correo Electrónico:
                                                        *</label>
                                                    <input type="email" id="checkoutEmail" name="checkoutEmail"
                                                        value="{{ old('checkoutEmail') }}" class="form-control"
                                                        required />
                                                </div>
                                            </div>
                                            <input type="hidden" id="invoice_cart" name="invoice_cart"
                                                value="{{ $invoice }}">
                                            <input type="hidden" id="amountTotalCart" name="amountTotalCart"
                                                value="{{ Cart::getTotal() }}">
                                            <input type="hidden" id="product_cart" name="cartCollection"
                                                value="{{ $cartCollection }}">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="collapse text-center" id="bottonEpayco">
                                            <script src="https://checkout.epayco.co/checkout.js" class="epayco-button"
                                                data-epayco-key="913a0e8d59c3bfecc380c4ea114bc1ee" data-epayco-amount="{{ \Cart::getTotal() }}"
                                                data-epayco-name="Centro de Desarrollo Humano" data-epayco-description="Compra Productos Digitales CDH"
                                                data-epayco-currency="{{ $ipInfo['continent'] !== 'South America' ? 'USD' : 'COP' }}" data-epayco-country="{{$ipInfo['country_code']}}"
                                                data-epayco-test="false" data-epayco-invoice="{{ $invoice }}" data-epayco-external="false"
                                                data-epayco-response="https://laboratorioparaelconocimiento.com/checkout" data-epayco-confirmation=""
                                                data-epayco-autoclick="false" data-epayco-email-billing="" data-epayco-name-billing=""></script>
                                        </div>
                                        <div class="bottonCheckout">
                                            <button type="submit" id="bottonCheckout" data-bs-toggle="collapse"
                                                href="#bottonEpayco" onclick="deleteButton(); checkout();" class="btn btn-primary">
                                                Continuar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Vertically centered Modal-->
                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection
@section('js')
    <script>
        let inputName = document.getElementById("checkoutName");
        let inputEmail = document.getElementById("checkoutEmail");
        let button = document.getElementById("bottonCheckout");
        button.disabled = true;
        inputName.addEventListener("change", stateHandle);
        inputEmail.addEventListener("change", stateHandle);

        function deleteButton(){
            inputName.removeAttribute('required');
            inputEmail.removeAttribute('required');
            inputName.readOnly = true;
            inputEmail.readOnly = true;
            button.style.visibility = "hidden";
        }

        function stateHandle() {
            if (document.getElementById("checkoutName").value === "" || document.getElementById("checkoutEmail").value ===
                "") {
                button.disabled = true;
            } else {
                button.disabled = false;
            }
        }

        function checkout() {
            var x = document.getElementsByClassName('epayco-button');
            const email = document.getElementById("checkoutEmail").value;
            const name = document.getElementById("checkoutName").value;
            for (var i = 0; i < x.length; i++) {
                x[i].setAttribute("data-epayco-email-billing", email);
                x[i].setAttribute("data-epayco-name-billing", name);
                x[i + 1].setAttribute("data-epayco-email-billing", email);
                x[i + 1].setAttribute("data-epayco-name-billing", name);
            }
        }
    </script>
@endsection

@section('js')
@endsection
