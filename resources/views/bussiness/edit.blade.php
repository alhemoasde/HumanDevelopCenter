@extends('index')

@section('title', 'Contacto')

@section('content')

    <!-- ======= Business-edit Section ======= -->
    <section id="login" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('ACTUALIZAR DATOS DE LA COMPAÑIA') }}</div>

                        <div class="card-body">
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('bussiness.index') }}"> Volver</a>
                            </div>
                            <div class="my-3">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li><strong>{{ $error }}</strong></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('bussiness.update', $bussiness) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nombre: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $bussiness->name) }}" required autocomplete="name"
                                            autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Dirección: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address', $bussiness->address) }}" required
                                            autocomplete="address" autofocus>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="telephone"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Teléfono: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                            value="{{ old('telephone', $bussiness->telephone) }}" required
                                            autocomplete="telephone" autofocus>

                                        @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email', $bussiness->email) }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="aboutUs"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Sobre Nosotros:') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="aboutUs" rows="2" class="form-control @error('aboutUs') is-invalid @enderror" name="aboutUs"
                                            autocomplete="aboutUs" autofocus>
                                            {{ old('aboutUs', $bussiness->aboutUs) }}
                                        </textarea>

                                        @error('aboutUs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="mission"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nuestra Misión:') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="mission" rows="2" class="form-control @error('mission') is-invalid @enderror" name="mission"
                                            autocomplete="mission" autofocus>
                                            {{ old('mission', $bussiness->mission) }}
                                        </textarea>

                                        @error('mission')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="vision"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nuestra Visión:') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="vision" rows="2" class="form-control @error('vision') is-invalid @enderror" name="vision"
                                            autocomplete="vision" autofocus >
                                            {{ old('vision', $bussiness->vision) }}
                                        </textarea>

                                        @error('vision')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="accountTwitter"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Usuario de Twitter:') }}</label>

                                    <div class="col-md-6">
                                        <input id="accountTwitter" type="text"
                                            class="form-control @error('accountTwitter') is-invalid @enderror"
                                            name="accountTwitter"
                                            value="{{ old('accountTwitter', $bussiness->accountTwitter) }}"
                                            autocomplete="accountTwitter" autofocus>

                                        @error('accountTwitter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="accountFacabook"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Fanpage en Facabook:') }}</label>

                                    <div class="col-md-6">
                                        <input id="accountFacabook" type="text"
                                            class="form-control @error('accountFacabook') is-invalid @enderror"
                                            name="accountFacabook"
                                            value="{{ old('accountFacabook', $bussiness->accountFacabook) }}"
                                            autocomplete="accountFacabook" autofocus>

                                        @error('accountFacabook')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="accountInstagram"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Usuario de Instagram:') }}</label>

                                    <div class="col-md-6">
                                        <input id="accountInstagram" type="text"
                                            class="form-control @error('accountInstagram') is-invalid @enderror"
                                            name="accountInstagram"
                                            value="{{ old('accountInstagram', $bussiness->accountInstagram) }}"
                                            autocomplete="accountInstagram" autofocus>

                                        @error('accountInstagram')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="accountLinkedin"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Usuario de Linkedin:') }}</label>

                                    <div class="col-md-6">
                                        <input id="accountLinkedin" type="text"
                                            class="form-control @error('accountLinkedin') is-invalid @enderror"
                                            name="accountLinkedin"
                                            value="{{ old('accountLinkedin', $bussiness->accountLinkedin) }}"
                                            autocomplete="accountLinkedin" autofocus>

                                        @error('accountLinkedin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="motto"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Lema Corporativo:') }}</label>

                                    <div class="col-md-6">
                                        <input id="motto" type="text"
                                            class="form-control @error('motto') is-invalid @enderror" name="motto"
                                            value="{{ old('motto', $bussiness->motto) }}" autocomplete="motto"
                                            autofocus>

                                        @error('motto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                @if ($bussiness->logo)
                                    <div class="row mb-3">
                                        <label for="logoOld"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Logo Antiguo Corporativo:') }}</label>

                                        <div class="col-md-6">
                                            <img src="{{ asset('/public/storage/'.$bussiness->logo) }}" alt="Logo Anterior" class="img-fluid">
                                        </div>
                                    </div>
                                @endif


                                <div class="row mb-3">
                                    <label for="logo"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Logo Corporativo:') }}</label>

                                    <div class="col-md-6">
                                        <input id="logo" type="file"
                                            class="form-control @error('logo') is-invalid @enderror" name="logo">

                                        @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-send-check-fill"> {{ __('Actualizar Datos') }} </i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <br>
        <br>
    </section>
    <!-- End Business-edit Section -->
@endsection
