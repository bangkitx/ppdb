

<?php $__env->startSection('container'); ?>
    <h3 class="mb-3">Masukkan nilai <?php echo e($agen->nama_lengkap); ?></h3>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="container mb-5">
        <form action="<?php echo e(url('agen/nilai/update/' . $agen->user_id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Jenis Tes</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $nilaiAgen = $agen->nilai ?? new \App\Models\Nilai();
                    ?>
                    <tr>
                        <td>Observasi Akademik </td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="akademik"
                                    class="form-select form-control <?php $__errorArgs = ['akademik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="akademik"
                                    required <?php if($config->pengumuman == 1): ?> disabled <?php endif; ?>>
                                    <option value="" disabled <?php echo e($nilaiAgen->akademik == '' ? 'selected' : ''); ?>>Pilih
                                        nilai A-E</option>
                                    <?php $__currentLoopData = ['A', 'B', 'C', 'D', 'E']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($nilai); ?>"
                                            <?php echo e($nilaiAgen->akademik == $nilai ? 'selected' : ''); ?>><?php echo e($nilai); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['akademik'];
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
                        </td>
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td>
                            <div class="form-group form-outline">
                                <select id="test_membaca_al_quran"
                                    class="form-select form-control <?php $__errorArgs = ['test_membaca_al_quran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    name="test_membaca_al_quran" required <?php if($config->pengumuman == 1): ?> disabled <?php endif; ?>>
                                    <option value="" disabled
                                        <?php echo e($nilaiAgen->test_membaca_al_quran == '' ? 'selected' : ''); ?>>Pilih nilai A-E
                                    </option>
                                    <?php $__currentLoopData = ['A', 'B', 'C', 'D', 'E']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nilai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($nilai); ?>"
                                            <?php echo e($nilaiAgen->test_membaca_al_quran == $nilai ? 'selected' : ''); ?>>
                                            <?php echo e($nilai); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['test_membaca_al_quran'];
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
                        </td>
                    </tr>
                    <tr>
                        <td>Status Kelulusan</td>
                        <td>
                            <form name="status" class="form-select form-control" required disabled>
                                <option selected disabled value="<?php echo e($nilaiAgen->status); ?>">
                                    <?php echo e($nilaiAgen->status ?? 'Status belum ditentukan'); ?></option>
                                </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-success btn-block" type="submit"
                <?php if($config->pengumuman == 1): ?> disabled <?php endif; ?>>Submit nilai</button>
        </form>
    </div>

    <a href="/agen" class="btn btn-warning btn-block">Kembali</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ppdb\resources\views/agen/nilai.blade.php ENDPATH**/ ?>