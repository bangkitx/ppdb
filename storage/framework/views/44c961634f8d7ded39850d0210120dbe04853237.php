

<?php $__env->startSection('container'); ?>
    
    <div class="card">

        <div class="card-header">

            <h3>Daftar Admin</h3>
        </div>
        <div class="card-body">
            <form method="GET" action="<?php echo e(url('/agen')); ?>" class="form-inline my-2 my-lg-0">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="cari"
                        placeholder="Cari Admin..." value="<?php echo e(request()->get('cari')); ?>">

                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <br><br>
            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $counter = 0;
                        ?>
                        <?php $__currentLoopData = $agen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$counter); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->email); ?></td>
                                <td><?php echo e($item->created_at); ?></td>
                                <td>
                                    <form method="POST" action="<?php echo e(url('/admin' . '/' . $item->id)); ?>"
                                        accept-charset="UTF-8"
                                        style="display:inline-block;
                                                        margin: 3px;">
                                        <?php echo e(method_field('DELETE')); ?>

                                        <?php echo e(csrf_field()); ?>

                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Admin"
                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data Admin <?php echo e($item->name); ?>?&quot;)"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="row mb-5">
                    <div class="col-md-8">
                        Showing <?php echo e($agen->firstItem()); ?> to <?php echo e($agen->lastItem()); ?> of <?php echo e($agen->total()); ?>

                    </div>
                    <div class="col-md-4">
                        <?php echo e($agen->links()); ?>

                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        $(document).ready(function() {
            $("#tahun").on("input", function() {
                if (!validateNumber(this)) {
                    this.value = this.value.replace(/[^0-9]/g, "");
                }
            });
        });

        function validateNumber(input) {
            if (input.value.match(/^[0-9]+$/)) {
                return true;
            } else {
                return false;
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ppdb\resources\views/agen/admin.blade.php ENDPATH**/ ?>