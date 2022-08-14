@extends('index')

@section('css')
    {{-- <link href="{{ asset('/assets/vendor/data-tables/DataTables-1.11.5/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet"> --}}
@endsection

@section('content')
    <!-- ======= User-view Section ======= -->
    <section id="speakers-details" style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Inico</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Perfil de Usuario</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @auth
                <div class="btn-group">
                    <a class="btn btn-outline-success" href="{{ route('users.index') }}">
                        <i class="bi bi-arrow-left-square-fill"> Volver</i>
                    </a>
                </div>
            @endauth
            <div class="section-header">
                <h2>Detalles del {{$user->profile != 'Speaker' ? 'Usuario' : 'Orador'}}</h2>
                <p>{{ $user->famousPhrase }}</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ $user->photography == '' ? asset('/img/user-perfil-not.jpg') : asset('/public/storage/' . $user->photography) }}" alt="avatar" class="rounded img-fluid"
                                style="width: 100%;">
                            {{-- <h2 class="my-3">{{$user->name}}</h2> --}}
                            {{-- <p class="text-muted mb-1">{{$user->famousPhrase}}</p> --}}
                            {{-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> --}}
                            {{-- <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary">Follow</button>
                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
              </div> --}}
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                @if (isset($user->web))
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="bi bi-globe2 text-warning"></i>
                                    <p class="mb-0"> <a href="{{ $user->web }}" target="_blank"
                                            rel="Pagina web o blog del ponente.">{{ $user->web }}</a></p>
                                </li>
                                @endif
                                @if (isset($user->telephone))
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="bi bi-whatsapp text-success"></i>
                                    <p class="mb-0"><a style="word-wrap: break-word;"
                                            href="https://wa.me/{{ $str = ltrim ($user->telephone,'+') }}/?&text=%F0%9F%99%8B%E2%80%8D%E2%99%82%EF%B8%8F%C2%A1Hola!%20Me%20interesa%20conocer%20mas%20informaci%C3%B3n%20sobre%20su%20grandioso%20evento.%F0%9F%A4%9D" target="_blank"
                                            style="color: #1e941a;" class="facebook">¡Contactar Ahora!</a></p>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="bi bi-telegram" style="color: #3b5998;"></i>
                                    <p class="mb-0"><a style="word-wrap: break-word;"
                                            href="https://t.me/{{ $user->telephone }}" target="_blank" style="color: #3b5998;"
                                            class="facebook">¡Contactar Ahora!</a></p>
                                </li>
                                @endif
                                @if (isset($user->accountFacabook))
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="bi bi-facebook" style="color: #3b5998;"></i>
                                    <p class="mb-0"><a style="word-wrap: break-word;"
                                            href="https://www.facebook.com/{{ $user->accountFacabook }}" target="_blank"
                                            class="facebook">¡Contactar Ahora!</a></p>
                                </li>
                                @endif
                                @if (isset($user->accountInstagram))
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="bi bi-instagram" style="color: #ac2bac;"></i>
                                    <p class="mb-0"><a style="word-wrap: break-word;"
                                            href="https://www.instagram.com/{{ $user->accountInstagram }}" target="_blank"
                                            class="instagram">¡Contactar Ahora!</a></p>
                                </li>
                                @endif
                                @if (isset($user->accountTwitter))
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="bi bi-twitter" style="color: #55acee;"></i>
                                    <p class="mb-0"><a style="word-wrap: break-word;"
                                            href="https://twitter.com/{{ $user->accountTwitter }}"
                                            target="_blank" class="twitter">¡Contactar Ahora!</a></p>
                                </li>
                                @endif
                                @if (isset($user->accountLinkedin))
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="bi bi-linkedin" style="color: #333333;"></i>
                                    <p class="mb-0"><a style="word-wrap: break-word;"
                                            href="https://www.linkedin.com/in/{{ $user->accountLinkedin }}"
                                            class="linkedin">¡Contactar Ahora!</a></p>
                                </li>
                                @endif
                                @if (isset($user->accountTiktok))
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="bi bi-tiktok text-info"></i>
                                    <p class="mb-0"><a style="word-wrap: break-word;"
                                            href="https://www.tiktok.com/{{ '@'.$user->accountTiktok }}"
                                            class="linkedin">¡Contactar Ahora!</a></p>
                                </li>
                                @endif
                                @if (isset($user->accountYouTube))
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="bi bi-youtube text-danger"></i>
                                    <p class="mb-0"><a style="word-wrap: break-word;"
                                            href="https://www.youtube.com/channel/{{ $user->accountYouTube }}"
                                            class="linkedin">¡Contactar Ahora!</a></p>
                                </li>
                                @endif
                                @if (isset($user->accountOther))
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="bi bi-hand-index-thumb-fill"></i>
                                    <p class="mb-0"><a style="word-wrap: break-word;"
                                            href="{{ $user->accountOther }}"
                                            class="linkedin">¡Contactar Ahora!</a></p>
                                </li>
                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nombre</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 h1">{{ $user->name }}</p>
                                </div>
                            </div>
                            <hr>
                            @if (isset($user->email))
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><i class="bi bi-envelope-check-fill"></i> Email</p>
                                </div>
                                
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->email }}</p>
                                </div>
                            </div>
                            @endif
                            <hr>
                            @if (isset($user->telephone))
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><i class="bi bi-telephone-outbound-fill"></i> Teléfono</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->telephone }}</p>
                                </div>
                            </div>
                            @endif
                            <hr>
                            {{-- <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mobile</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">(098) 765-4321</p>
                </div>
              </div> --}}
                            {{-- <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                </div>
              </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4 text-center h3">Sobre el {{$user->profile != 'Speaker' ? 'Usuario' : 'Orador'}}</p>
                                    <p class="mb-1 text-justify" style="text-align: justify !important;">
                                        {{ $user->biografhy }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                  </p>
                  <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                  <div class="progress rounded mb-2" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Produc-view Section -->
@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            /* inicializando libreria requiere ID tabla */
            var t = $('#video-list').DataTable({
                "order": [
                    /* Ordenamiento predeterminado indice en base cero*/
                    [1, "desc"]
                ],
                "columnDefs": [{
                    /* columna no busqueda indice en base cero*/
                    "targets": [5],
                    "searchable": false,
                }],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }

            });
            /* Generar index de fila automaticamente */
            t.on('order.dt search.dt', function() {
                let i = 1;
                t.cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();
        });
    </script> --}}
@endsection
