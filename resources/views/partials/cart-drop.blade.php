@section('css')
@endsection


@if (count(\Cart::getContent()) > 0)
    <li class="list-group-item scroll">
        <div class="card border-secondary mb-3" style="max-width: 18rem;">
            <div class="card-header">Productos Seleccionados</div>
            <div class="card-body text-secondary">
                @foreach (\Cart::getContent() as $item)
                    <p class="card-text">
                        <div class="col-xs-12 col-sm-12 col-lg-3 text-center">
                            <img class="img-fluid" src="{{ $item->attributes->image }}" >
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-6">
                            <b>{{ $item->name }}</b>
                            <br><small>Cantidad: {{ $item->quantity }}</small>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-3">
                            <p>${{ \Cart::get($item->id)->getPriceSum() }} USD</p>
                        </div>
                        <hr>
                    </p>
                @endforeach
        </div>
    </li>
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-10">
                <b>Total: </b>${{ \Cart::getTotal() }} USD
            </div>
            <div class="col-lg-2">
                <form action="{{ route('cart.clear') }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn-secondary btn-sm" style="float: right;"><i class="bi bi-trash3-fill"></i>Borrar</button>
                </form>
            </div>
        </div>
    </li>
    <br>
    <div class="row" class="d-grid" style="margin: 2px;">
        <a class="btn btn-secondary btn-sm" href="{{ route('cart.index') }}">
           <i class="bi bi-eye-fill"> Ver Carrito</i> <i class="bi bi-arrow-right-square-fill"></i>
        </a>
        <!-- <a class="btn btn-success btn-sm" href="{{route('cart.checkout')}}">
            <i class="bi bi-paypal"> Procesar Pago</i> <i class="bi bi-arrow-right-square-fill"></i>
        </a> -->
        <script src="https://checkout.epayco.co/checkout.js" class="epayco-button"
            data-epayco-key="eda14fc53c7f3e9af3e97901a7f27d68"
            data-epayco-amount="{{ \Cart::getTotal() }}"
            data-epayco-name="Centro de Desarrollo Humano"
            data-epayco-description="Compra Productos Digitales CDH"
            data-epayco-currency=""
            data-epayco-country="co" 
            data-epayco-test="true"
            data-epayco-invoice="" 
            data-epayco-external="false"
            data-epayco-response="http://127.0.0.1:8000/checkout"
            data-epayco-confirmation="" 
            data-epayco-autoclick="false"
            data-epayco-email-billing="" 
            data-epayco-name-billing="">                           
        </script>
    </div>
@else
    <li class="list-group-item"><i class="bi bi-arrow-repeat"> Carrito Vacio...</i></li>
@endif


@section('js')
@endsection
