@extends('index')

@section('content')
    <!-- ======= Video-edit Section ======= -->
    <section id="checkout" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container-fluid" data-aos="fade-up">
            <div class="row justify-content-center">
                <form class="row g-3">
                    <div class="col-auto">
                        <label for="staticEmail2" class="">Email:</label>
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail2"
                            value="email@example.com">
                    </div>
                    <div class="col-auto">
                        <label for="inputPassword2" class="visually-hidden">Password</label>
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Confirmar Email</button>
                    </div>
                    <script src="https://checkout.epayco.co/checkout.js" class="epayco-button"
                                        data-epayco-key="eda14fc53c7f3e9af3e97901a7f27d68" 
                                        data-epayco-amount="50"
                                        data-epayco-name="Vestido Mujer Primavera" 
                                        data-epayco-description="Vestido Mujer Primavera"
                                        data-epayco-currency="usd" 
                                        data-epayco-country="co" 
                                        data-epayco-test="true"
                                        data-epayco-invoice="ABC123"
                                        data-epayco-external="true" 
                                        data-epayco-response="https://ejemplo.com/respuesta.html"
                                        data-epayco-confirmation="https://ejemplo.com/confirmacion" 
                                        data-epayco-methodconfirmation="get">
                                        data-epayco-autoclick="true"
                    </script>
                </form>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </section>
    <!-- ======= Video-edit Section ======= -->
@endsection
