@extends('index')

@section('content')
    <!-- ======= checkout Section ======= -->
    <section id="checkout" class="section-bg">
        <br>
        <div class="container-fluid" data-aos="fade-up">
            <div class="row justify-content-center">
                <form class="row g-3">
                    <div class="col-auto">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: *</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Por favor indique su correo electronico.</div>
                    </div>
                    </div>
                    
                </form>
            </div>
            <br>
        </div>
    </section>
    <!-- ======= checkout Section ======= -->
@endsection
