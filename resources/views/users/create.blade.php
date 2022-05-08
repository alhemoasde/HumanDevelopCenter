@extends('index')

@section('title', 'Usuario')

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/vendor/intl-tel-input/css/intlTelInput.css') }}" />
@endsection

@section('content')

    <!-- ======= User-create Section ======= -->
    <section id="login" class="section-bg">
        <br>
        <br>
        <br>
        <br>
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('CREANDO UN USUARIO') }}</div>

                        <div class="card-body">
                            <div class="btn-group">
                                <a class="btn btn-outline-success" href="{{ route('users.index') }}">
                                    <i class="bi bi-arrow-left-square-fill"> Volver</i>
                                </a>
                            </div>
                            <br>
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
                            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="profile"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Asignar Perfil: *') }}</label>
                                    <div class="col-md-6">

                                        <select id="profile" name="profile"
                                            class="form-select @error('profile') is-invalid @enderror">
                                            <option value="" {{ old('profile') == '' ? 'selected' : '' }}>Seleccione un
                                                Perfil...</option>
                                            <option value="Admin" {{ old('profile') == 'Admin' ? 'selected' : '' }}>
                                                Administrador
                                            </option>
                                            <option value="Speaker" {{ old('profile') == 'Speaker' ? 'selected' : '' }}>
                                                Ponente</option>
                                            <option value="Cliente" {{ old('profile') == 'Cliente' ? 'selected' : '' }}>
                                                Cliente
                                            </option>
                                        </select>

                                        @error('profile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Nombre Completo: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Correo Electronico: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
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
                                        <input style="text-align: center; !important" id="telephone" type="tel"
                                            class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                                            value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

                                        @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Contraseña: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="{{ old('password') }}" required autocomplete="password" autofocus>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirmar Contraseña: *') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-3 speaker">
                                    <label for="famousPhrase"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Frese Celebre del Ponente:') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="famousPhrase" rows="2" class="form-control @error('famousPhrase') is-invalid @enderror"
                                            name="famousPhrase" autocomplete="famousPhrase"
                                            autofocus>{{ old('famousPhrase') }}</textarea>

                                        @error('famousPhrase')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 speaker">
                                    <label for="biografhy"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Biografía del Ponente:') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="biografhy" rows="2" class="form-control @error('biografhy') is-invalid @enderror" name="biografhy"
                                            autocomplete="biografhy" autofocus>{{ old('biografhy') }}</textarea>

                                        @error('biografhy')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 speaker">
                                    <label for="web"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Sitio Web:') }}</label>

                                    <div class="col-md-6">
                                        <input id="web" type="url" class="form-control @error('web') is-invalid @enderror"
                                            name="web" value="{{ old('web') }}" autocomplete="web" autofocus>

                                        @error('web')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 speaker">
                                    <label for="accountTwitter"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Usuario de Twitter:') }}</label>

                                    <div class="col-md-6">
                                        <input id="accountTwitter" type="text"
                                            class="form-control @error('accountTwitter') is-invalid @enderror"
                                            name="accountTwitter" value="{{ old('accountTwitter') }}"
                                            autocomplete="accountTwitter" autofocus>

                                        @error('accountTwitter')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 speaker">
                                    <label for="accountFacabook"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Fanpage en Facabook:') }}</label>

                                    <div class="col-md-6">
                                        <input id="accountFacabook" type="text"
                                            class="form-control @error('accountFacabook') is-invalid @enderror"
                                            name="accountFacabook" value="{{ old('accountFacabook') }}"
                                            autocomplete="accountFacabook" autofocus>

                                        @error('accountFacabook')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 speaker">
                                    <label for="accountInstagram"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Usuario de Instagram:') }}</label>

                                    <div class="col-md-6">
                                        <input id="accountInstagram" type="text"
                                            class="form-control @error('accountInstagram') is-invalid @enderror"
                                            name="accountInstagram" value="{{ old('accountInstagram') }}"
                                            autocomplete="accountInstagram" autofocus>

                                        @error('accountInstagram')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 speaker">
                                    <label for="accountLinkedin"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Usuario de Linkedin:') }}</label>

                                    <div class="col-md-6">
                                        <input id="accountLinkedin" type="text"
                                            class="form-control @error('accountLinkedin') is-invalid @enderror"
                                            name="accountLinkedin" value="{{ old('accountLinkedin') }}"
                                            autocomplete="accountLinkedin" autofocus>

                                        @error('accountLinkedin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3 speaker">
                                    <label for="photography"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Fotografía: ') }}</label>

                                    <div class="col-md-6">
                                        <input id="photography" type="file"
                                            class="form-control @error('photography') is-invalid @enderror"
                                            name="photography">

                                        @error('photography')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label for="status"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Estado: *') }}</label>

                                    <div class="col-md-6">

                                        <select id="status" name="status"
                                            class="form-select @error('status') is-invalid @enderror" required>
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Activo
                                            </option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactivo
                                            </option>
                                        </select>

                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary submint-cdh">
                                            <i class="bi bi-send-check-fill"> {{ __('Guardar Usuario') }} </i>
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
    <!-- End User-create Section -->
@endsection

@section('js')
    <script>
        const selectElement = document.querySelector('#profile');
        var x = document.getElementsByClassName('speaker');
        for (var i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        selectElement.addEventListener('change', (event) => {
            if (selectElement.value == 'Speaker') {
                var x = document.getElementsByClassName('speaker');
                for (var i = 0; i < x.length; i++) {
                    x[i].style.display = '';
                }
            } else {
                var x = document.getElementsByClassName('speaker');
                for (var i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
            }
        });
    </script>
    {{-- Validador de numeros telefonicos --}}
    <script src="{{ asset('/assets/vendor/intl-tel-input/js/intlTelInput.min.js') }}"></script>
    <script>
        const phoneInputField = document.querySelector("#telephone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "co",
            preferredCountries: ["co", "us", "es"],
            utilsScript: "{{ asset('/assets/vendor/intl-tel-input/js/utils.js') }}",
        });
        const inputElement = document.querySelector('#telephone');
        inputElement.addEventListener('change', (event) => {
            inputElement.value = phoneInput.getNumber();
        });
    </script>
@endsection
