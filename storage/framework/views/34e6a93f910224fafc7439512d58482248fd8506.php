

<?php $__env->startSection('container'); ?>
    <h4 class="mb-3">Hasil Pengumuman <?php echo e($siswa->nama_lengkap); ?></h4>
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <div class="container mb-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Jenis Tes</th>
                    <th>Hasil Nilai</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Akademik</td>
                    <td> <?php echo e($siswa->nilai->akademik); ?></td>
                    
                </tr>
                <tr>
                    <td>Tes Baca Al-Qur'an</td>
                    <td><?php echo e($siswa->nilai->test_membaca_al_quran); ?></td>
                    
                </tr>
                
                <tr>
                    <td>Hasil tes</td>
                    <td><?php echo e($siswa->nilai->status); ?></td>
                    

                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <?php if($user->datapokok->nilai->status == 'Tidak Lulus'): ?>
        <span href="#" class="d-block text-center mb-3 font-bold rounded py-2 text-lg "
            disabled>Jangan putus asa dan tetep semangat!</span>
    <?php elseif(is_null(Auth::user()->registrasi_ulang)): ?>
        <?php if($user->datapokok->nilai->status != 'BELUM LULUS'): ?>
            <a href="<?php echo e(url('/siswa/registrasi/' . $siswa->id)); ?>" class="btn btn-primary btn-block">Registrasi Ulang</a>
        <?php endif; ?>
        <hr>
        <a target="_blank" a href="<?php echo e(url('/siswa/cetak/' . $siswa->id)); ?>" title="Cetak Riwayat Siswa" class="btn btn-success btn-block">Cetak Surat Pernyataan (PDF)</a>
    <?php else: ?>
        <button onclick="alert('Kamu sudah melakukan registrasi ulang!')" class="btn btn-primary btn-block mb-3"
            disabled>Registrasi Ulang</button>
        <div class="alert alert-success mb-3">
            Kamu sudah melakukan registrasi ulang!
        </div>
        <hr>
        <a target="_blank" a href="<?php echo e(url('/siswa/cetak/' . $siswa->id)); ?>" title="Cetak Riwayat Siswa"
            class="btn btn-success btn-block">Cetak Surat Pernyataan (PDF)</a>
    <?php endif; ?>
    
    <a target="_blank" a href="<?php echo e(url('/siswa/cetakpokok/' . $siswa->id)); ?>" title="Cetak Datapokok Siswa"
        class="btn btn-success btn-block">Cetak Riwayat (PDF)</a>
    <hr>
    <a href="/siswa" class="btn btn-warning btn-block">Kembali</a>

   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ppdb\resources\views/siswa/pengumuman.blade.php ENDPATH**/ ?>