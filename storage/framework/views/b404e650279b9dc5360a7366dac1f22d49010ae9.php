

<?php $__env->startSection('container'); ?>
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
        <h6>Selamat datang, <?php echo e($user->name); ?></h6>
        
    </div>

    <!-- Content Row -->
    <div class="row">
        <?php if(Auth::user()->role == 0): ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Pengumuman Kelolosan</div>
                                <div class="h5 mb-2 font-weight-bold text-gray-800">
                                    <a href="/config" class="btn btn-primary">Atur</a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total peserta mendaftar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($count); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Siswa mendaftar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($siswaLaki); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-male fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Siswi mendaftar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($siswiPerempuan); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-female fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total peserta lulus</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($allLulus); ?> / <?php echo e($totalKuota = $config->kuotap + $config->kuotal); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Siswa lulus</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($lulusSiswaLaki); ?> / <?php echo e($config->kuotal); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-male fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Siswi lulus</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($lulusSiswiPerempuan); ?> / <?php echo e($config->kuotap); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-female fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total peserta mendaftar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($count); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Siswa mendaftar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($siswaLaki); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-male fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Siswi mendaftar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($siswiPerempuan); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-female fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total peserta lulus</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($allLulus); ?> / <?php echo e($totalKuota = $config->kuotap + $config->kuotal); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Siswa lulus</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($lulusSiswaLaki); ?> / <?php echo e($config->kuotal); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-male fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Siswi lulus</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <h2><?php echo e($lulusSiswiPerempuan); ?> / <?php echo e($config->kuotap); ?></h2>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-female fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ppdb\resources\views/welcome.blade.php ENDPATH**/ ?>