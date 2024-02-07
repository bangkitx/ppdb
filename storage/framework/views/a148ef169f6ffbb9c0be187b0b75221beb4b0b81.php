

<?php $__env->startSection('container'); ?>
    
    <div class="card">

        <div class="card-header">

            <h3>Restore Data</h3>
        </div>
        <div class="card-body">
            
            <form method="GET" class="form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search float-right">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" name="cari" id="cari"
                        placeholder="Cari siswa..." value=<?php echo e(request()->get('cari')); ?>>
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
                            <th>Status Bayar</th>
                            <th>Status Pendaftaran</th>
                            <th>Tanggal Dibuat</th>
                            
                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $agen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($agen->firstItem() + $key); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->email); ?></td>
                                <td>
                                    <?php if($item->payment == '[]'): ?>
                                        Belum
                                        
                                    <?php else: ?>
                                        Sudah
                                    <?php endif; ?>
                                    
                                </td>
                                <td>
                                    <?php if(empty($item->datapokok)): ?>
                                        Belum
                                    <?php elseif(is_null($item->datapokok)): ?>
                                        Belum
                                    <?php else: ?>
                                        Sudah
                                    <?php endif; ?>

                                </td>
                                <td><?php echo e($item->created_at); ?></td>

                                <td>
                                    <form method="POST" action="<?php echo e(route('agen.restore', $item->id)); ?>"
                                        accept-charset="UTF-8"
                                        style="display:inline-block;
                                                    margin: 5px;">
                                        <?php echo e(csrf_field()); ?>

                                        <button type="submit" class="btn btn-warning btn-sm" title="Restore Siswa"
                                            onclick="return confirm(&quot;Apakah anda ingin memulihkan data siswa <?php echo e($item->name); ?>?&quot;)"><i
                                                class="fa fa-trash-restore" aria-hidden="true"></i></button>
                                    </form>
                                    
                                    <form method="POST" action="<?php echo e(route('agen.forceDelete', $item->id)); ?>"
                                        accept-charset="UTF-8"
                                        style="display:inline-block;
                                                    margin: 5px;">
                                        <?php echo e(method_field('DELETE')); ?>

                                        <?php echo e(csrf_field()); ?>

                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Siswa"
                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa <?php echo e($item->name); ?>?&quot;)"><i
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
    <script></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ppdb\resources\views/agen/bin.blade.php ENDPATH**/ ?>