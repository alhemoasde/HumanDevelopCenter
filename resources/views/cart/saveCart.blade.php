@extends('index')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <div class="alert alert-success" role="alert">
        <i class="bi bi-cart-check-fill"></i> El Carrito de compras se guardado satisfactoriamente...
    </div>
    <br>
    <br>
    <script>
        function mensaje() {
            window.close()
        }
        setTimeout(mensaje, 1000);
    </script>
@endsection
