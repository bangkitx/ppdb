

<?php $__env->startSection('container'); ?>
    <h2 class="mb-3">Konfigurasi Tanggal PPDB</h2>
    <?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <div class="container mb-5">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Jenis Aktivitas</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pendaftaran Akun PPDB</td>
                        <td><?php echo e($config->pendaftaran_akun_ppdb_start); ?></td>
                        <td><?php echo e($config->pendaftaran_akun_ppdb_due); ?></td>
                    </tr>
                    <tr>
                        <td>Pendaftaran Sekolah</td>
                        <td><?php echo e($config->pengumpulan_berkas_start); ?></td>
                        <td><?php echo e($config->pengumpulan_berkas_due); ?></td>
                    </tr>
                    <tr>
                        <td>Tes Akademik</td>
                        <td><?php echo e($config->test_akademik_start); ?></td>
                        <td><?php echo e($config->test_akademik_due); ?></td>
                    </tr>
                    <tr>
                        <td>Tes Baca Al-Qur'an</td>
                        <td><?php echo e($config->test_baca_al_quran_start); ?></td>
                        <td><?php echo e($config->test_baca_al_quran_due); ?></td>
                    </tr>
                    
                    <tr>
                        <td>Pendaftaran Ulang</td>
                        <td><?php echo e($config->pendaftaran_ulang_start); ?></td>
                        <td><?php echo e($config->pendaftaran_ulang_due); ?></td>
                    </tr>
                    <tr>
                        <td>Gelombang Pendaftaran</td>
                        <td><?php echo e($config->gelombang); ?></td>
                    </tr>
                    <tr>
                        <td>Link WhatsApp</td>
                        <td colspan="2"><a href="<?php echo e($config->redirect_wa); ?>"><?php echo e($config->redirect_wa); ?></a></td>
                        
                    </tr>
                    
                    <tr>
                        <td>Kelulusan</td>
                        <td colspan="2">
                            <?php if($config->pengumuman == 0): ?>
                                Ditutup
                            <?php else: ?>
                                Dibuka
                            <?php endif; ?>
                        </td>
                        
                    </tr>

                    <tr>
                        <td>Biaya registrasi</td>
                        <td colspan="2"><?php echo e($config->nominal_pembayaran); ?></td>
                        
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="3">Midtrans Config</th>
                        
                    </tr>
                </thead>
                <tr>
                    <td>Merchant ID</td>
                    <td colspan="2"><?php echo e($config->midtrans_merchant_id); ?></td>
                    
                </tr>
                <tr>
                    <td>Midtrans Client Key</td>
                    <td colspan="2"><?php echo e($config->midtrans_client_key); ?></td>
                    
                </tr>
                <tr>
                    <td>Midtrans Server Key</td>
                    <td colspan="2"><?php echo e($config->midtrans_server_key); ?></td>
                    
                </tr>
                <tr>
                    <td>Midtrans Order ID</td>
                    <td colspan="2"><?php echo e($config->order_id_midtrans); ?></td>
                    
                </tr>
            </table>
        </div>
    </div>
    <a href="/config/edit" class="btn btn-warning btn-block">Update konfigurasi</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ppdb\resources\views/config/index.blade.php ENDPATH**/ ?>