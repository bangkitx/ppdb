

<?php $__env->startSection('container'); ?>
    <script>
        function fixAspect(img) {
            var $img = $(img),
                width = $img.width(),
                height = $img.height(),
                tallAndNarrow = width / height < 1;
            if (tallAndNarrow) {
                $img.addClass('tallAndNarrow');
            }
            $img.addClass('loaded');
        }
    </script>
    <style>
        .input-group-text {
            width: 8rem !important;
        }
    </style>
    <div class="card  mb-5">
        <div class="card ">
            <div class="card-header">
                <h2>Profil</h2>
            </div>

            <?php if(session('flash_message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('flash_message')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('flash_message_error')): ?>
                <div class="alert alert-danger">
                    <?php echo e(session('flash_message_error')); ?>

                </div>
            <?php endif; ?>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col d-flex justify-content-center">
                        <div class="rounded-circle" style="width: 150px; height: 150px; overflow: hidden;">
                            <img class="img-fluid" src="<?php echo e(asset(Auth::user()->avatar)); ?>"
                                style="object-fit: cover; width: 100%; height: 100%;" alt="User Avatar">
                        </div>
                    </div>
                </div>

            <div class="cold-mb-5">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td><?php echo e($agen->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo e($agen->email); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            <a href="<?php echo e(url('/profile/' . $agen->id . '/edit')); ?>" class="btn btn-success btn-block">Sunting Profil
            </a>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ppdb\resources\views/profile/index.blade.php ENDPATH**/ ?>