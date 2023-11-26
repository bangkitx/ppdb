<?php $__env->startSection('container'); ?>
    
                <div class="card">
                    
                    <div class="card-header">

                        <h3>Daftar Siswa</h3>
                    </div>
                    <div class="card-body">
                        
                        <form method="GET" action="<?php echo e(url('/agen')); ?>" class="form-inline my-2 my-lg-0">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" name="cari"
                                    placeholder="Cari siswa..." value="<?php echo e(request()->get('cari')); ?>">
                                <input type="text" class="form-control bg-light border-0 small" name="tahun"
                                    placeholder="Tahun" value="<?php echo e(request()->get('tahun')); ?>" id="tahun" pattern="^[0-9]+$">
                                
                                <select class="form-control bg-light border-0 small" name="gelombang">
                                    <option value="">Pilih Gelombang...</option>
                                    <option
                                        value="Gelombang 1"<?php echo e(request()->get('gelombang') == 'Gelombang 1' ? ' selected' : ''); ?>>
                                        Gelombang 1</option>
                                    <option
                                        value="Gelombang 2"<?php echo e(request()->get('gelombang') == 'Gelombang 2' ? ' selected' : ''); ?>>
                                        Gelombang 2</option>
                                </select>

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
                                        <th>Gelombang Pendaftaran</th>
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
                                            <td><?php echo e($item->gelombang); ?></td>
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
                                                <?php if(empty($item->datapokok)): ?>
                                                    <form method="POST" action="<?php echo e(url('/agen' . '/' . $item->id)); ?>"
                                                        accept-charset="UTF-8" style="display:inline-block;
                                                        margin: 3px;">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Siswa"
                                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa <?php echo e($item->name); ?>?&quot;)"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                <?php elseif(is_null($item->datapokok)): ?>
                                                    <form method="POST" action="<?php echo e(url('/agen' . '/' . $item->id)); ?>"
                                                        accept-charset="UTF-8" style="display:inline-block;
                                                        margin: 3px;">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Siswa"
                                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa <?php echo e($item->name); ?>?&quot;)"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                <?php elseif($item->role == 0): ?>
                                                    Admin Account

                                                    
                                                <?php else: ?>
                                                    <a href="<?php echo e(url('/agen/nilai/' . $item->id)); ?>"
                                                        title="Tambah Kelulusan Siswa"><button
                                                            class="btn btn-success btn-sm "style="display:inline-block;
                                                            margin: 3px;"><i class="fa fa-plus-square"
                                                                aria-hidden="true"></i></button></a>
                                                        
                                                    <a target="_blank" href="<?php echo e(url('/agen/cetak-kartu/'.$item->id)); ?>"
                                                        title="Cetak Kartu Ujian">
                                                        <button class="btn btn-warning btn-sm" style="display:inline-block;
                                                        margin: 3px;"><i class="fa fa-print"
                                                                aria-hidden="true"></i></button>
                                                    </a>
                                                    <a href="<?php echo e(url('/agen/' . $item->id)); ?>" title="Lihat Siswa"><button
                                                            class="btn btn-info btn-sm"style="display:inline-block;
                                                            margin: 3px;"><i class="fa fa-eye"
                                                                aria-hidden="true"></i></button></a>
                                                    <a href="<?php echo e(url('/agen/' . $item->id . '/edit')); ?>"
                                                        title="Edit Data Pendaftar"><button class="btn btn-primary btn-sm"style="display:inline-block;
                                                        margin: 3px;"><i
                                                                class="fa fa-pen" aria-hidden="true"></i>
                                                        </button></a>
                                                    <form method="POST" action="<?php echo e(url('/agen' . '/' . $item->id)); ?>"
                                                        accept-charset="UTF-8" style="display:inline-block;
                                                        margin: 3px;">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Siswa"
                                                            onclick="return confirm(&quot;Apakah anda ingin menghapus data siswa <?php echo e($item->name); ?>?&quot;)"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                <?php endif; ?>
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
                            <div class="row">
                                <a href="/excel/sudah-bayar?tahun=<?php echo e(request()->get('tahun')); ?>&gelombang=<?php echo e(request()->get('gelombang')); ?>"
                                    class="btn btn-success btn-block">Daftar siswa Sudah bayar
                                    (Download XLSX)</a>
                                <a href="/excel/sudah-lulus?tahun=<?php echo e(request()->get('tahun')); ?>&gelombang=<?php echo e(request()->get('gelombang')); ?>"
                                    class="btn btn-success btn-block">Daftar siswa Sudah lulus
                                    (Download XLSX)</a>
                                <a href="/excel/tidak-lulus?tahun=<?php echo e(request()->get('tahun')); ?>&gelombang=<?php echo e(request()->get('gelombang')); ?>"
                                    class="btn btn-success btn-block">Daftar siswa Tidak lulus
                                    (Download XLSX)</a>
                        
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ppdb\resources\views/agen/index.blade.php ENDPATH**/ ?>