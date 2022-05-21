@extends('index')

@section('content')
    <!-- ======= checkout Section ======= -->
    <section id="checkout" class="section-bg">
        <br>
        <br>
        <br>
        <div class="container-fluid" data-aos="fade-up">
            <div class="row justify-content-center">
                <header id="main-header" style="margin-top:20px">
                    <div class="row">
                        <div class="col-lg-4 franja">
                            <img class="mx-autoimg-fluid img-thumbnail" src="{{ asset('/img/logo.png') }}"
                                style="height: 120px; width: 120px; border-radius: 19px;">
                        </div>
                        <div class="col-lg-8 text-left">
                            <h2>Centro de Desarrollo Humano</h2>
                        </div>
                    </div>
                </header>
                <div class="container">
                    <div class="row" style="margin-top:20px">
                        <div class="col-lg-8 col-lg-offset-2 ">
                            <h4 style="text-align:left h3"> :: Resumen de la Transacción ::</h4>
                            <hr>
                        </div>
                        <div class="col-lg-8 col-lg-offset-2 ">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Referencia CDH</td>
                                            <td id="referencia">{{$ref_payco['x_id_invoice']}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Fecha</td>
                                            <td id="fecha" class="">{{$ref_payco['x_transaction_date']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Respuesta</td>
                                            <td id="respuesta">{{$ref_payco['x_response']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Motivo</td>
                                            <td id="motivo">{{$ref_payco['x_response_reason_text']}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Banco</td>
                                            <td class="" id="banco">{{$ref_payco['x_bank_name']}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Recibo</td>
                                            <td id="recibo">{{$ref_payco['x_transaction_id']}}</td>
                                        </tr>
                                        <tr>
                                            <td class="bold">Total</td>
                                            <td class="" id="total">{{number_format($ref_payco['x_amount'], 2, '.', ',')}} {{$ref_payco['x_currency_code']}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-8 col-lg-offset-2 text-center">
                            <div class="alert-info">
                                <label for="email" style="color: rgb(238, 16, 16);"><i class="bi bi-envelope-check-fill"></i> Email:</label>
                                <input class="about-btn" onchange="chargeEmail()" type="email" name="email" id="email" placeholder="Correo electrónico...">
                                <a id="btView" name="btView" href="{{ route('player','') }}" class="about-btn scrollto"><i class="bi bi-play-circle-fill"> Ver Mis Videos</i></a>
                              </div>
                              <script>
                                function chargeEmail(){
                                  btnViewVideo = document.getElementById('btView');
                                  inputEmail = document.getElementById('email');
                                  hrefRoute = '{{ route('player','') }}';
                                  btnViewVideo.setAttribute('href', hrefRoute+'/'+inputEmail.value);
                                }
                              </script>
                              <br>
                            <a class="btn btn-danger" role="button" href="/"><i class="bi bi-door-closed-fill"></i> Finalizar</a>
                        </div>
                    </div>
                </div>
                <footer>
                    <div class="row">
                        <div class="container">
                            <div class="col-lg-8 col-lg-offset-2">
                                <img src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/pagos_procesados_por_epayco_260px.png"
                                    style="margin-top:10px; float:left"> <img
                                    src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/epayco/credibancologo.png"
                                    height="40px" style="margin-top:10px; float:right">
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <br>
        </div>
    </section>
    <!-- ======= checkout Section ======= -->
@endsection
