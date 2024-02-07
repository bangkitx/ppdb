@extends('layouts.main')

@section('container')

    <body class="bg-gradient-primary">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <div class="card mb-5">
            <div class="card-header"><b>Tambah Admin</b></div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h3 class="mb-3">Data Login</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-outline">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" placeholder="Username"
                                    autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-outline">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-outline">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-outline">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Ulang Password" />
                            </div>
                        </div>
                    </div>

                    <div class="btn btn-success btn-sm mb-5"><i class="bi bi-eye-slash" id="togglePassword">
                            Toggle Password </i></div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Tambah') }}</button>
                    <a href="{{ url()->previous() }}" class="btn btn-danger btn-block">Back</a>
                </form>

            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <script>
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");
            const passwordConfirm = document.querySelector("#password-confirm");

            togglePassword.addEventListener("click", function(e) {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);

                // toggle the icon
                this.classList.toggle("bi-eye");
            });

            togglePassword.addEventListener("click", function(e) {
                // toggle the type attribute
                const type = passwordConfirm.getAttribute("type") === "password" ? "text" : "password";
                passwordConfirm.setAttribute("type", type);

            });
        </script>
    </body>

@stop
