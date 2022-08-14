@extends('index')

@section('css')
    <!-- Template Main CSS File -->
    <link href="{{ asset('/dayShop/shop.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section id="shop">
        <div class="container" style="margin-top: 80px">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Día {{substr($day, -1);}}</li>
                </ol>
            </nav>

        <!-- ======= Schedule Section ======= -->
        <section id="schedule" class="section-with-bg" style="height: 280px !important">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Actividades Día No.{{substr($day, -1);}}</h2>
                    <p >Esta es la guía de actividades que realizaremos en este día.</p>
                    <p >Recuerda que podras adquirir uno o todos nuestros videos.</p>
                    <br>
                    <h3 class="sub-heading">¡Por tiempo limitado accede a todo nuestro contenido de forma <b>Gratuita</b>!</h3>
                </div>
            </div>    
        </section>
        <!-- End Schedule Section -->
        <section id="speakers">
            <div class="container-fuid tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <!-- Schdule Day -->
                    <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="{{$day}}">
                        @foreach ($event->eventActivitys as $activity)
                            @if ($activity->day === $day)
                                <div class="row schedule-item">
                                    <div class="col-lg-4 col-md-2" style="text-align: center; word-wrap: break-word;">
                                        <h2 class="text-center text-wrap" style="font-weight:bold;">{{ date('d/m/Y', strtotime($activity->dateStart)) }} </h2>
                                        <br>
                                        <h2><time>{{ date('g:i A', strtotime($activity->hourStart)) }}</time></h2>
                                    </div>
                                    <div class="col-lg-8 col-md-10">
                                            <div class="speaker" data-aos="fade-up" data-aos-delay="100">
                                                <img src="{{ $activity->user->photography == '' ? asset('/img/user-perfil-not.jpg') : asset('/public/storage/' . $activity->user->photography) }}"
                                                    alt="{{ $activity->user->name }}" class="img-fluid" style="border-radius: 40px;">
                                                <div class="details">
                                                    <h3><a href="{{ route('users.show', $activity->user->id) }}">{{ $activity->user->name }}</a></h3>
                                                    <p>{{ $activity->user->famousPhrase }}</p>
                                                    <div class="social">
                                                        @if (isset($activity->user->telephone))
                                                            <a href="https://wa.me/{{ $str = ltrim($activity->user->telephone, '+') }}/?&text=%F0%9F%99%8B%E2%80%8D%E2%99%82%EF%B8%8F%C2%A1Hola!%20Me%20interesa%20conocer%20mas%20informaci%C3%B3n%20sobre%20su%20grandioso%20evento.%F0%9F%A4%9D"
                                                                target="_blank"><i class="bi bi-whatsapp"></i></a>
                                                            <a href="https://t.me/{{ $activity->user->telephone }}" target="_blank"><i
                                                                    class="bi bi-telegram"></i></a>
                                                        @endif
                                                        @if (isset($activity->user->accountTwitter))
                                                            <a href="https://www.twitter.com/{{ $activity->user->accountTwitter }}"
                                                                target="_blank"><i class="bi bi-twitter"></i></a>
                                                        @endif
                                                        @if (isset($activity->user->accountFacabook))
                                                            <a href="https://www.facebook.com/{{ $activity->user->accountFacabook }}"
                                                                target="_blank"><i class="bi bi-facebook"></i></a>
                                                        @endif
                                                        @if (isset($activity->user->accountInstagram))
                                                            <a href="https://www.instagram.com/{{ $activity->user->accountInstagram }}"
                                                                target="_blank"><i class="bi bi-instagram"></i></a>
                                                        @endif
                                                        @if (isset($activity->user->accountLinkedin))
                                                            <a href="https://www.linkedin.com/in/{{ $activity->user->accountLinkedin }}"
                                                                target="_blank"><i class="bi bi-linkedin"></i></a>
                                                        @endif
                                                        @if (isset($activity->user->accountTiktok))
                                                            <a href="https://www.tiktok.com/{{ '@' . $activity->user->accountTiktok }}"
                                                                target="_blank"><i class="bi bi-tiktok"></i></a>
                                                        @endif
                                                        @if (isset($activity->user->accountYouTube))
                                                            <a href="https://www.youtube.com/channel/{{ $activity->user->accountYouTube }}"
                                                                target="_blank"><i class="bi bi-youtube"></i></a>
                                                        @endif
                                                        @if (isset($activity->user->email))
                                                            <a href="mailto:{{ $activity->user->email }}" target="_blank"><i
                                                                    class="bi bi-envelope-check-fill"></i></a>
                                                        @endif
                                                        @if (isset($activity->user->web))
                                                            <a href="{{ $activity->user->web }}" target="_blank"><i
                                                                    class="bi bi-globe2"></i></a>
                                                        @endif
                                                        @if (isset($activity->user->accountOther))
                                                            <a href="{{ $activity->user->accountOther }}" target="_blank"><i
                                                                    class="bi bi-hand-index-thumb-fill"></i></a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        <h4><span>{{ $activity->title }}</span>
                                            <h5>{{ $activity->description }}</h5>
                                        </h4>
                                        @if (date('d/m/Y', strtotime($activity->dateStart)) === date('d/m/Y'))
                                            <a data-bs-toggle="collapse" href="#video{{ $activity->id }}" role="button"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                <i class="bi bi-play-btn-fill btn btn-danger"> ¡Ver Ahora!</i>
                                            </a>
                                            <br>
                                            <div class="collapse justify-content-center" id="video{{ $activity->id }}">
                                                <div class="card card-body">
                                                    <div class="ratio ratio-16x9">
                                                        <video controls allowfullscreen 
                                                            poster="/img/video1IntroCamilaMontes.png" width="100%"
                                                            height="50%">
                                                            <source
                                                                src="{{ asset('/public/storage/' . $activity->user->videos->first()->url) }}"
                                                                type="video/mp4">
                                                        </video>
                                                    </div>
                                                </div>
                                                <div class="card card-footer text-center">
                                                    <a class="bubbly-button" href="#dia1"> ¡Comprar Ahora! </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <br>
                            @endif
                        @endforeach
                    </div>
                    <!-- End Schdule Day 1 -->
                </div>
            </div>
        </section>    
    
    

        <!-- Product Day Section -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <hr>
                    <h2 class="text-center h2">:: Productos Disponibles Día {{substr($day, -1);}} ::</h2>
                    <hr>
                    <ul class="nav nav-tabs nav-pills mb-3" id="tabProduct" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="dia1-tab" data-bs-toggle="tab" data-bs-target="#dia1"
                                type="button" role="tab" aria-controls="dia_1" aria-selected="true"><i
                                    class="bi bi-tree-fill"></i> Día {{substr($day, -1);}}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="donation-tab" data-bs-toggle="tab" data-bs-target="#donation"
                                type="button" role="tab" aria-controls="donacion" aria-selected="false"><i
                                    class="bi bi-cash-coin"></i> Donación </button>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dia1" role="tabpanel" aria-labelledby="dia1-tab">
                            <div class="row d-flex justify-content-center">
                                @foreach ($products as $pro)
                                        <div class="col-sm-12 col-md-4 col-lg-3 ">
                                            <div class="card" 
                                                style="margin-bottom: 5px; height: auto; background: radial-gradient(#e9686880, rgb(239 230 230 / 0%));">
                                                <div class="d-flex justify-content-between p-3" style="height: 100px">
                                                    <p class="text-sm-start text-capitalize fs-5" title="{{$pro->name}}"> <strong> {{ \Str::limit($pro->name, 25) }} </strong></p>
                                                    <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                                        style="width: 45px; height: 45px;">
                                                        <p class="text-white mb-0 small">{{ $pro->day }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <img src="{{ asset('/public/storage/' . $pro->poster) }}"
                                                        class="card-img-top mx-autoimg-fluid img-thumbnail"
                                                        style="height: 180px; width: 180px; border-radius: 19px;"
                                                        alt="{{ $pro->name }}"/>
                                                </div>   
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between mb-3">
                                                        <p class="text-left h3">
                                                            <strong>
                                                                @if ($ipInfo['continent'] !== 'South America')
                                                                    ${{ number_format($pro->priceSellUSD, 2, '.', ',') }} USD
                                                                @else
                                                                    ${{ number_format($pro->priceSell, 2, '.', ',') }} COP
                                                                @endif
                                                            </strong>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between" style="height: 38px">
                                                        <p class="small"><a data-bs-toggle="collapse"
                                                                href="#listVideo{{ $pro->id }}"
                                                                class="btn btn-sm btn-danger h4 text-white"><i
                                                                    class="bi bi-eye-fill"></i> Videos</a></p>
                                                        <p><span
                                                                class="small text-danger fw-bold h4">{{ $pro->videos->count() }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <div class="collapse card text-center"
                                                            id="listVideo{{ $pro->id }}">
                                                            @foreach ($pro->videos as $video)
                                                                <ul class="list-group">
                                                                    <li class="list-group-item d-flex justify-content-between align-items-center"
                                                                        style="height: 27px;">
                                                                        <b class="fw-light"><i class="bi bi-film">
                                                                                {{ $video->title }}</i></b>
                                                                    </li>
                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{$day}}" id="idDay" name="idDay">
                                                    <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                                    <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                                    @if ($ipInfo['continent'] !== 'South America')
                                                        <input type="hidden" value="{{ $pro->priceSellUSD }}" id="price" name="price">
                                                    @else
                                                        <input type="hidden" value="{{ $pro->priceSell }}" id="price" name="price">
                                                    @endif
                                                    <input type="hidden"
                                                        value="{{ asset('/public/storage/' . $pro->poster) }}" id="img"
                                                        name="img">
                                                    {{-- <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug"> --}}
                                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                                    <div class="card-footer" style="background-color: white;">
                                                        <div class="row">
                                                            <button class="btn btn-dark btn-sm" class="tooltip-test"
                                                                title="Agregar al Carrito">
                                                                <i class="bi bi-cart-plus-fill"></i> Agregar al Carrito
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <br>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- fin tab-dia1 -->

                        <div class="tab-pane fade" id="donation" role="tabpanel" aria-labelledby="donation-tab">
                            <!-- =========================================================================
                                ////// Tome este código y cópielo en el código fuente de su sitio web ////
                                ========================================================================== -->
                            <div id="miepayco">
                                <script defer type="text/javascript" src="https://mi-epayco.s3.amazonaws.com/embed.js"
                                                                miepaycoUrl="https://cdhumano.epayco.me"></script>
                            </div>
                            <!-- ================================================================== -->
                            <br>
                            <div style="text-align: center">
                                <h2>Donar con Paypal</h2>
                                <form action="https://www.paypal.com/donate" method="post" target="_top">
                                    <input type="hidden" name="hosted_button_id" value="ZFEUQPM6MJBDQ" />
                                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - La forma más segura y fácil de pagar en línea." alt="Donar con el botón de PayPal" />
                                    <img alt="" border="1" src="https://www.paypal.com/en_CO/i/scr/pixel.gif" width="1" height="1" />
                                </form>
                            </div>
                            <br>
                        </div>
                        <!-- fin tab-donation -->
                    </div>
                </div>
            </div>
        <!-- End Product Day Section -->

        </div>
        
    </section>
@endsection

@section('js')
    <!-- Template Main JS File -->
    <script src="{{ asset('/dayShop/shop.js') }}"></script>
@endsection