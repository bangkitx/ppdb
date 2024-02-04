

<?php $__env->startSection('container'); ?>

    <body class="bg-gradient-primary">
        

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

            <div class="card mb-5">
                <div class="card-header">
                    <b>Isi Data Pendaftaran</b>
                </div>
            <div class="card-body">
                
                            <form method="POST" action="<?php echo e(route('siswa.update')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <h3>Data Pribadi</h3>
                                <h6 class="mb-3" style="color:red;">*wajib diisi</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nama_lengkap" type="text"
                                                class="form-control <?php $__errorArgs = ['nama_lengkap'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="nama_lengkap" value="<?php echo e(old('nama_lengkap', $data->nama_lengkap)); ?>"
                                                required placeholder="Nama Lengkap">
                                            <?php $__errorArgs = ['nama_lengkap'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nisn" type="text"
                                                class="form-control <?php $__errorArgs = ['nisn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nisn"
                                                value="<?php echo e(old('nisn', $data->nisn)); ?>" required placeholder="NISN">
                                            <?php $__errorArgs = ['nisn'];
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
                                    </div>
                                </div>

                                <!-- Add the jenis_kelamin field -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="jenis_kelamin"
                                                class="form-select form-control <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="jenis_kelamin" required>
                                                <option value="laki" selected disabled>Pilih jenis kelamin
                                                </option>
                                                <option value="laki"
                                                    <?php echo e(old('jenis_kelamin', $data->jenis_kelamin) == 'laki' ? 'selected' : ''); ?>>
                                                    Laki-Laki
                                                </option>
                                                <option value="perempuan"
                                                    <?php echo e(old('jenis_kelamin', $data->jenis_kelamin) == 'perempuan' ? 'selected' : ''); ?>>
                                                    Perempuan
                                                </option>
                                            </select>
                                            <?php $__errorArgs = ['jenis_kelamin'];
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
                                    </div>
                                </div>


                                <!-- Add the tempat_lahir field -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="tempat_lahir" type="text"
                                                class="form-control <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="tempat_lahir" value="<?php echo e(old('tempat_lahir', $data->tempat_lahir)); ?>"
                                                required placeholder="Tempat Lahir">
                                            <?php $__errorArgs = ['tempat_lahir'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="tanggal_lahir" type="date"
                                                class="form-control <?php $__errorArgs = ['tanggal_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="tanggal_lahir"
                                                value="<?php echo e(old('tanggal_lahir', $data->tanggal_lahir)); ?>" required>
                                            <?php $__errorArgs = ['tanggal_lahir'];
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
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="jumlah_hafalan"
                                                class="form-select form-control <?php $__errorArgs = ['jumlah_hafalan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="jumlah_hafalan" required>
                                                <option value="0"
                                                    <?php echo e(old('jumlah_hafalan', '0') == '0' ? 'selected disabled' : ''); ?>>
                                                    Pilih Jumlah Hafalan Juz</option>
                                                <?php for($i = 1; $i <= 30; $i++): ?>
                                                    <option value="<?php echo e($i); ?>"
                                                        <?php echo e(old('jumlah_hafalan', $data->jumlah_hafalan) == $i ? 'selected' : ''); ?>>
                                                        <?php echo e($i); ?> Juz</option>
                                                <?php endfor; ?>
                                            </select>

                                            <?php $__errorArgs = ['jumlah_hafalan'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <?php
                                                $agamaList = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
                                            ?>
                                            <select id="agama"
                                                class="form-select form-control <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="agama" required>
                                                <option value="0"
                                                    <?php echo e(old('agama', '0') == '0' ? 'selected disabled' : ''); ?>>
                                                    Pilih Agama</option>
                                                <?php $__currentLoopData = $agamaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($agama); ?>"
                                                        <?php echo e(old('agama', $data->agama) == $agama ? 'selected' : ''); ?>>
                                                        <?php echo e($agama); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['agama'];
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
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                    <div class="form-group form-outline">
                                        <textarea id="alamat" class="form-control <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="alamat" required
                                            placeholder="Alamat Siswa"><?php echo e(old('alamat', $data->alamat)); ?></textarea>
                                        <?php $__errorArgs = ['alamat'];
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
                                </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="asal_sekolah" type="text"
                                                class="form-control <?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="asal_sekolah" value="<?php echo e(old('asal_sekolah', $data->asal_sekolah)); ?>"
                                                required placeholder="Asal Sekolah">
                                            <?php $__errorArgs = ['asal_sekolah'];
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
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                    <div class="form-group form-outline">
                                        <textarea id="alamat_sekolah" class="form-control <?php $__errorArgs = ['alamat_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="alamat_sekolah" required placeholder="Alamat Sekolah"><?php echo e(old('alamat_sekolah', $data->alamat_sekolah)); ?></textarea>
                                        <?php $__errorArgs = ['alamat_sekolah'];
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
                                </div>
                                </div>



                                <h3>Informasi Keluarga</h3>
                                <h6 class="mb-3" style="color:red;">*wajib diisi</h6>
                                <!-- Add the nama_ayah field -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline mb-3">
                                            <input id="nama_ayah" type="text"
                                                class="form-control <?php $__errorArgs = ['nama_ayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="nama_ayah" value="<?php echo e(old('nama_ayah', $data->nama_ayah)); ?>"
                                                placeholder="Nama Ayah">
                                            <?php $__errorArgs = ['nama_ayah'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="no_wa_ayah" type="text"
                                                class="form-control <?php $__errorArgs = ['no_wa_ayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="no_wa_ayah" value="<?php echo e(old('no_wa_ayah', $data->no_wa_ayah)); ?>"
                                                placeholder="No. WhatsApp Ayah">
                                            <?php $__errorArgs = ['no_wa_ayah'];
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
                                    </div>
                                </div>


                                <!-- Add the pekerjaan_ayah field -->


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="pendidikan_terakir_ayah"
                                                class="form-select form-control <?php $__errorArgs = ['pendidikan_terakir_ayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="pendidikan_terakir_ayah">
                                                <option value="" disabled selected>Pilih Pendidikan Terakhir
                                                    Ayah
                                                </option>
                                                <option value="sd"
                                                    <?php echo e(old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 'sd' ? 'selected' : ''); ?>>
                                                    SD
                                                </option>
                                                <option value="smp"
                                                    <?php echo e(old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 'smp' ? 'selected' : ''); ?>>
                                                    SMP
                                                </option>
                                                <option value="sma"
                                                    <?php echo e(old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 'sma' ? 'selected' : ''); ?>>
                                                    SMA
                                                </option>
                                                <option value="d1/2/3"
                                                    <?php echo e(old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 'd1/2/3' ? 'selected' : ''); ?>>
                                                    D1/D2/D3
                                                </option>
                                                <option value="s1"
                                                    <?php echo e(old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 's1' ? 'selected' : ''); ?>>
                                                    S1
                                                </option>
                                                <option value="s2"
                                                    <?php echo e(old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 's2' ? 'selected' : ''); ?>>
                                                    S2
                                                </option>
                                                <option value="s3"
                                                    <?php echo e(old('pendidikan_terakir_ayah', $data->pendidikan_terakir_ayah) == 's3' ? 'selected' : ''); ?>>
                                                    S3
                                                </option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            <?php $__errorArgs = ['pendidikan_terakir_ayah'];
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
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="pekerjaan_ayah" type="text"
                                                class="form-control <?php $__errorArgs = ['pekerjaan_ayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="pekerjaan_ayah"
                                                value="<?php echo e(old('pekerjaan_ayah', $data->pekerjaan_ayah)); ?>"
                                                placeholder="Pekerjaan Ayah">
                                            <?php $__errorArgs = ['pekerjaan_ayah'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Add the penghasilan_ayah field -->
                                        <div class="form-group form-outline">
                                            <select id="penghasilan_ayah"
                                                class="form-select form-control <?php $__errorArgs = ['penghasilan_ayah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="penghasilan_ayah">
                                                <option value="1" disabled selected>Pilih Kategori Penghasilan
                                                    Ayah
                                                </option>
                                                <option value="1"
                                                    <?php echo e(old('penghasilan_ayah', $data->penghasilan_ayah) == '<1Juta' ? 'selected' : ''); ?>>
                                                    Di bawah
                                                    Rp
                                                    1.000.000</option>
                                                <option value="2"
                                                    <?php echo e(old('penghasilan_ayah', $data->penghasilan_ayah) == '1Juta-3Juta' ? 'selected' : ''); ?>>
                                                    Rp
                                                    1.000.000 -
                                                    Rp 3.000.000</option>
                                                <option value="3"
                                                    <?php echo e(old('penghasilan_ayah', $data->penghasilan_ayah) == '3Juta-5Juta' ? 'selected' : ''); ?>>
                                                    Rp
                                                    3.000.000 -
                                                    Rp 5.000.000</option>
                                                <option value="4"
                                                    <?php echo e(old('penghasilan_ayah', $data->penghasilan_ayah) == '5Juta-10Juta' ? 'selected' : ''); ?>>
                                                    Rp
                                                    5.000.000 -
                                                    Rp 10.000.000</option>
                                                <option value="5"
                                                    <?php echo e(old('penghasilan_ayah', $data->penghasilan_ayah) == '>10Juta' ? 'selected' : ''); ?>>
                                                    Di atas
                                                    Rp
                                                    10.000.000</option>

                                                <!-- Add other options as needed -->
                                            </select>
                                            <?php $__errorArgs = ['penghasilan_ayah'];
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
                                    </div>
                                </div>


                                <!-- Add the pendidikan_terakir_ayah field -->


                                <!-- Add the no_wa_ayah field -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nama_ibu" type="text"
                                                class="form-control <?php $__errorArgs = ['nama_ibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="nama_ibu" value="<?php echo e(old('nama_ibu', $data->nama_ibu)); ?>"
                                                placeholder="Nama Ibu">
                                            <?php $__errorArgs = ['nama_ibu'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="no_wa_ibu" type="text"
                                                class="form-control <?php $__errorArgs = ['no_wa_ibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="no_wa_ibu" value="<?php echo e(old('no_wa_ibu', $data->no_wa_ibu)); ?>"
                                                placeholder="No. WhatsApp Ibu">
                                            <?php $__errorArgs = ['no_wa_ibu'];
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="pendidikan_terakir_ibu"
                                                class="form-select form-control <?php $__errorArgs = ['pendidikan_terakir_ibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="pendidikan_terakir_ibu">
                                                <option value="" disabled selected>Pilih Pendidikan Terakhir
                                                    Ibu
                                                </option>
                                                <option value="sd"
                                                    <?php echo e(old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 'sd' ? 'selected' : ''); ?>>
                                                    SD
                                                </option>
                                                <option value="smp"
                                                    <?php echo e(old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 'smp' ? 'selected' : ''); ?>>
                                                    SMP
                                                </option>
                                                <option value="sma"
                                                    <?php echo e(old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 'sma' ? 'selected' : ''); ?>>
                                                    SMA
                                                </option>
                                                <option value="d1/2/3"
                                                    <?php echo e(old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 'd1/2/3' ? 'selected' : ''); ?>>
                                                    D1/D2/D3
                                                </option>
                                                <option value="s1"
                                                    <?php echo e(old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 's1' ? 'selected' : ''); ?>>
                                                    S1
                                                </option>
                                                <option value="s2"
                                                    <?php echo e(old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 's2' ? 'selected' : ''); ?>>
                                                    S2
                                                </option>
                                                <option value="s3"
                                                    <?php echo e(old('pendidikan_terakhir_ibu', $data->pendidikan_terakhir_ibu) == 's3' ? 'selected' : ''); ?>>
                                                    S3
                                                </option>
                                            </select>
                                            <?php $__errorArgs = ['pendidikan_terakir_ibu'];
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
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="pekerjaan_ibu" type="text"
                                                class="form-control <?php $__errorArgs = ['pekerjaan_ibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="pekerjaan_ibu"
                                                value="<?php echo e(old('pekerjaan_ibu', $data->pekerjaan_ibu)); ?>"
                                                placeholder="Pekerjaan Ibu">
                                            <?php $__errorArgs = ['pekerjaan_ibu'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="penghasilan_ibu"
                                                class="form-select form-control <?php $__errorArgs = ['penghasilan_ibu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="penghasilan_ibu">
                                                <option value="1" disabled selected>Pilih Kategori Penghasilan
                                                    Ibu
                                                </option>
                                                <option value="1"
                                                    <?php echo e(old('penghasilan_ibu', $data->penghasilan_ibu) == '<1Juta' ? 'selected' : ''); ?>>
                                                    Di bawah
                                                    Rp
                                                    1.000.000</option>
                                                <option value="2"
                                                    <?php echo e(old('penghasilan_ibu', $data->penghasilan_ibu) == '1Juta-3Juta' ? 'selected' : ''); ?>>
                                                    Rp
                                                    1.000.000 - Rp
                                                    3.000.000</option>
                                                <option value="3"
                                                    <?php echo e(old('penghasilan_ibu', $data->penghasilan_ibu) == '3Juta-5Juta' ? 'selected' : ''); ?>>
                                                    Rp
                                                    3.000.000 - Rp
                                                    5.000.000</option>
                                                <option value="4"
                                                    <?php echo e(old('penghasilan_ibu', $data->penghasilan_ibu) == '5Juta-10Juta' ? 'selected' : ''); ?>>
                                                    Rp
                                                    5.000.000 - Rp
                                                    10.000.000</option>
                                                <option value="5"
                                                    <?php echo e(old('penghasilan_ibu', $data->penghasilan_ibu) == '>10Juta' ? 'selected' : ''); ?>>
                                                    Di atas
                                                    Rp
                                                    10.000.000</option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            <?php $__errorArgs = ['penghasilan_ibu'];
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
                                    </div>
                                </div>

                                <h3>Data Wali Siswa</h3>
                                <h6 class="mb-3" style="color:black;">*opsional</h6>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="nama_wali_siswa" type="text"
                                                class="form-control <?php $__errorArgs = ['nama_wali_siswa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="nama_wali_siswa"
                                                value="<?php echo e(old('nama_wali_siswa', $data->nama_wali_siswa)); ?>"
                                                placeholder="Nama Wali Siswa">
                                            <?php $__errorArgs = ['nama_wali_siswa'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="no_wa_wali_siswa" type="text"
                                                class="form-control <?php $__errorArgs = ['no_wa_wali_siswa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="no_wa_wali_siswa"
                                                value="<?php echo e(old('no_wa_wali_siswa', $data->no_wa_wali_siswa)); ?>"
                                                placeholder="No. WhatsApp Wali Siswa">
                                            <?php $__errorArgs = ['no_wa_wali_siswa'];
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
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="hubungan_dengan_siswa" type="text"
                                                class="form-control <?php $__errorArgs = ['hubungan_dengan_siswa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="hubungan_dengan_siswa"
                                                value="<?php echo e(old('hubungan_dengan_siswa', $data->hubungan_dengan_siswa)); ?>"
                                                placeholder="Hubungan dengan Siswa">
                                            <?php $__errorArgs = ['hubungan_dengan_siswa'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="alamat_wali_siswa" type="text"
                                                class="form-control <?php $__errorArgs = ['alamat_wali_siswa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="alamat_wali_siswa"
                                                value="<?php echo e(old('alamat_wali_siswa', $data->alamat_wali_siswa)); ?>"
                                                placeholder="Alamat Wali Siswa">
                                            <?php $__errorArgs = ['alamat_wali_siswa'];
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
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="pendidikan_terakir_wali"
                                                class="form-select form-control <?php $__errorArgs = ['pendidikan_terakir_wali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="pendidikan_terakir_wali">
                                                <option value="0" disabled selected>Pilih Pendidikan
                                                    Terakhir Wali
                                                </option>
                                                <option value="sd"
                                                    <?php echo e(old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 'sd' ? 'selected' : ''); ?>>
                                                    SD
                                                </option>
                                                <option value="smp"
                                                    <?php echo e(old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 'smp' ? 'selected' : ''); ?>>
                                                    SMP
                                                </option>
                                                </option>
                                                <option value="sma"
                                                    <?php echo e(old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 'sma' ? 'selected' : ''); ?>>
                                                    SMA
                                                </option>
                                                <option value="d1/2/3"
                                                    <?php echo e(old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 'd1/2/3' ? 'selected' : ''); ?>>
                                                    D1/D2/D3
                                                </option>
                                                <option value="s1"
                                                    <?php echo e(old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 's1' ? 'selected' : ''); ?>>
                                                    S1
                                                </option>
                                                <option value="s2"
                                                    <?php echo e(old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 's2' ? 'selected' : ''); ?>>
                                                    S2
                                                </option>
                                                <option value="s3"
                                                    <?php echo e(old('pendidikan_terakir_wali', $data->pendidikan_terakir_wali) == 's3' ? 'selected' : ''); ?>>
                                                    S3
                                                </option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            <?php $__errorArgs = ['pendidikan_terakir_wali'];
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
                                    </div>
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <input id="pekerjaan_wali" type="text"
                                                class="form-control <?php $__errorArgs = ['pekerjaan_wali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="pekerjaan_wali"
                                                value="<?php echo e(old('pekerjaan_wali', $data->pekerjaan_wali)); ?>"
                                                placeholder="Pekerjaan Wali">
                                            <?php $__errorArgs = ['pekerjaan_wali'];
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-outline">
                                            <select id="penghasilan_wali"
                                                class="form-select form-control <?php $__errorArgs = ['penghasilan_wali'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="penghasilan_wali">
                                                <option value="0" disabled selected>Pilih Kategori
                                                    Penghasilan Wali
                                                </option>
                                                <option value="1"
                                                    <?php echo e(old('penghasilan_wali', $data->penghasilan_wali) == '<1Juta' ? 'selected' : ''); ?>>
                                                    Di
                                                    bawah Rp
                                                    1.000.000</option>
                                                <option value="2"
                                                    <?php echo e(old('penghasilan_wali', $data->penghasilan_wali) == '1Juta-3Juta' ? 'selected' : ''); ?>>
                                                    Rp
                                                    1.000.000 -
                                                    Rp 3.000.000</option>
                                                <option value="3"
                                                    <?php echo e(old('penghasilan_wali', $data->penghasilan_wali) == '3Juta-5Juta' ? 'selected' : ''); ?>>
                                                    Rp
                                                    3.000.000 -
                                                    Rp 5.000.000</option>
                                                <option value="4"
                                                    <?php echo e(old('penghasilan_wali', $data->penghasilan_wali) == '5Juta-10Juta' ? 'selected' : ''); ?>>
                                                    Rp
                                                    5.000.000 -
                                                    Rp 10.000.000</option>
                                                <option value="5"
                                                    <?php echo e(old('penghasilan_wali', $data->penghasilan_wali) == '>10Juta' ? 'selected' : ''); ?>>
                                                    Di
                                                    atas Rp
                                                    10.000.000</option>
                                                <!-- Add other options as needed -->
                                            </select>
                                            <?php $__errorArgs = ['penghasilan_wali'];
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
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('Update')); ?></button>
                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger btn-block">Back</a>
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
    </body>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ppdb\resources\views/siswa/edit.blade.php ENDPATH**/ ?>