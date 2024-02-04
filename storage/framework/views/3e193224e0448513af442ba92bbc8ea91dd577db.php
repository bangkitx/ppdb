<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Login - <?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Siswa PPDB SMPTQ Pangeran Diponegoro
                                        </h1>
                                    </div>
                                    <?php if(session('flash_message')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session('flash_message')); ?>

                                        </div>
                                    <?php elseif(session('flash_message_danger')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session('flash_message_danger')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <form method="POST" action="<?php echo e(route('login')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <input id="email" type="email"
                                                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required
                                                autocomplete="email" autofocus>

                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="password" class="form-control form-control-user"
                                                placeholder="Password" name="password" required
                                                autocomplete="current-password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input class="form-check-input" type="checkbox" name="togglePassword"
                                                    id="togglePassword">

                                                <label class="form-check-label" for="remember" >
                                                    <?php echo e(__('Lihat sandi')); ?>

                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            <?php echo e(__('Login')); ?>

                                        </button>
                                    </form>

                                    <hr>
                                  
                                    <div class="text-center">
                                        <a class="btn btn-link" 
                                            href="<?php echo e(route('register')); ?>" style="color: #000;"><?php echo e(__('Belum punya akun? Buat akun sekarang!')); ?></a>
                                    </div>
                        
                                    <div class="text-center">

                                    <?php if(Route::has('password.request')): ?>
                                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>" style="color: #000;">
                                            <?php echo e(__('Lupa Password?')); ?>

                                        </a>
                                    <?php endif; ?>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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
        // const passwordConfirm = document.querySelector("#password-confirm");

        togglePassword.addEventListener("click", function(e) {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

        });

    </script>

</body>

</html>
<?php /**PATH C:\laragon\www\ppdb\resources\views/auth/login.blade.php ENDPATH**/ ?>