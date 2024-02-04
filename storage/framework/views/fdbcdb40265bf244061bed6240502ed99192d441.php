

<?php $__env->startSection('container'); ?>
    <div class="card">
        <div class="card-header">Lihat Siswa <?php echo e($agen->nama_lengkap); ?></div>
        <div class="card-body">
            <!-- Section 1: Data Pribadi -->
            <div class="table-responsive">

                <h3>Data Pribadi</h3>

                <table class="table table-striped mb-5">
                    <tbody>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?php echo e($agen->nama_lengkap); ?></td>
                        </tr>
                        <tr>
                            <th>NISN</th>
                            <td><?php echo e($agen->nisn); ?></td>
                        </tr>
                        <tr>
                            <th>No. Peserta</th>
                            <td><?php echo e($agen->nomor_peserta); ?></td>
                        </tr>
                        <tr>.
                            <th>Email</th>
                            <td><?php echo e($agen->email); ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td><?php echo e($agen->jenis_kelamin); ?></td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td><?php echo e($agen->tempat_lahir); ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td><?php echo e($agen->tanggal_lahir); ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo e($agen->alamat); ?></td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td><?php echo e($agen->agama); ?></td>
                        </tr>
                        <tr>
                            <th>Asal Sekolah</th>
                            <td><?php echo e($agen->asal_sekolah); ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Sekolah</th>
                            <td><?php echo e($agen->alamat_sekolah); ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah Hafalan</th>
                            <td><?php echo e($agen->jumlah_hafalan); ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Section 2: Informasi Keluarga -->
                <h3>Informasi Keluarga</h3>
                <table class="table table-striped mb-5">
                    <tbody>
                        <tr>
                            <th>Nama Ayah</th>
                            <td><?php echo e($agen->nama_ayah); ?></td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ayah</th>
                            <td><?php echo e($agen->pekerjaan_ayah); ?></td>
                        </tr>
                        <tr>
                            <th>Penghasilan Ayah</th>
                            <td><?php echo e($agen->penghasilan_ayah); ?></td>
                        </tr>
                        <tr>
                            <th>Pendidikan Terakhir Ayah</th>
                            <td><?php echo e($agen->pendidikan_terakir_ayah); ?></td>
                        </tr>
                        <tr>
                            <th>No. WhatsApp Ayah</th>
                            <td><?php echo e($agen->no_wa_ayah); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Ibu</th>
                            <td><?php echo e($agen->nama_ibu); ?></td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ibu</th>
                            <td><?php echo e($agen->pekerjaan_ibu); ?></td>
                        </tr>
                        <tr>
                            <th>Penghasilan Ibu</th>
                            <td><?php echo e($agen->penghasilan_ibu); ?></td>
                        </tr>
                        <tr>
                            <th>Pendidikan Terakhir Ibu</th>
                            <td><?php echo e($agen->pendidikan_terakir_ibu); ?></td>
                        </tr>
                        <tr>
                            <th>No. WhatsApp Ibu</th>
                            <td><?php echo e($agen->no_wa_ibu); ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Section 3: Data Wali Siswa -->
                <h3>Data Wali Siswa</h3>
                <table class="table table-striped mb-5">
                    <tbody>
                        <tr>
                            <th>Nama Wali Siswa</th>
                            <td><?php echo e($agen->nama_wali_siswa); ?></td>
                        </tr>
                        <tr>
                            <th>Hubungan dengan Siswa</th>
                            <td><?php echo e($agen->hubungan_dengan_siswa); ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Wali Siswa</th>
                            <td><?php echo e($agen->alamat_wali_siswa); ?></td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Wali</th>
                            <td><?php echo e($agen->pekerjaan_wali); ?></td>
                        </tr>
                        <tr>
                            <th>Penghasilan Wali</th>
                            <td><?php echo e($agen->penghasilan_wali); ?></td>
                        </tr>
                        <tr>
                            <th>Pendidikan Terakhir Wali</th>
                            <td><?php echo e($agen->pendidikan_terakir_wali); ?></td>
                        </tr>
                        <tr>
                            <th>No. WhatsApp Wali Siswa</th>
                            <td><?php echo e($agen->no_wa_wali_siswa); ?></td>
                        </tr>
                    </tbody>
                </table>

                <h3>Policy</h3>
                <table class="table table-striped mb-5">
                    <tbody>
                        <tr>
                            <th>Policy (1)</th>
                            <td><?php echo e($agen->policy->perjanjian1); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Percaya dan taat sepenuhnya kepada kebijaksanaan SMPTQ</td>
                        </tr>
                        <tr>
                            <th>Policy (2)</th>
                            <td><?php echo e($agen->policy->perjanjian2); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Mendukung sunnah dan disiplin yang berlaku di SMPTQ</td>
                        </tr>
                        <tr>
                            <th>Policy (3)</th>
                            <td><?php echo e($agen->policy->perjanjian3); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Memenuhi segala kewajiban yang telah ditetapkan oleh SMPTQ</td>
                        </tr>
                        <tr>
                            <th>Policy (4)</th>
                            <td><?php echo e($agen->policy->perjanjian4); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Melunasi semua pembayaran uang sekolah dan uang makan sebelum Ujian Semester
                                Ganjil dan
                                Semester Genap</td>
                        </tr>
                        <!-- Add more rows for other policy information -->
                    </tbody>
                </table>

                <h3>Nilai</h3>
                <table class="table table-striped mb-5">
                    <tbody>
                        <tr>
                            <th>Akademik</th>
                            <td><?php echo e($agen->nilai->akademik); ?></td>
                        </tr>
                        <tr>
                            <th>Tes Baca Al-Qur'an</th>
                            <td><?php echo e($agen->nilai->test_membaca_al_quran); ?></td>
                        </tr>
                        <tr>
                            <th>Status Kelulusan</th>
                            <td><?php echo e($agen->nilai->status); ?></td>
                        </tr>
                    </tbody>
                </table>

                <!-- Section 4: Lainnya -->
                <h3>Lainnya</h3>
                <table class="table table-striped mb-5">
                    <tbody>
                        <tr>
                            <th>Motivasi</th>
                            <td><?php echo e($agen->motivasi); ?></td>
                        </tr>
                        <tr>
                            <th>Daftar Sekolah Lain</th>
                            <td>
                                <?php if($agen->daftar_sekolah_lain == 1): ?>
                                    Yes
                                <?php else: ?>
                                    No
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Sekolah Jika Daftar</th>
                            <td><?php echo e($agen->nama_sekolahnya_jika_daftar); ?></td>
                        </tr>
                        <tr>
                            <th>Informasi Didapatkan Dari</th>
                            <td><?php echo e($agen->informasi_didapatkan_dari); ?></td>
                        </tr>
                        <!-- Add more rows for other additional information -->
                    </tbody>
                </table>

                <h3>Registrasi Ulang File</h3>

                <?php if(is_null($user->registrasi_ulang)): ?>
                    <p>Belum melakukan registrasi ulang.</p>
                <?php else: ?>
                    <table class="table table-striped mb-5">
                        <tbody>
                            <tr>
                                <th>Ijazah</th>
                                <td><a href="../../storage/<?php echo e($user->registrasi_ulang->ijazah); ?>" download>Click to
                                        download</a></td>
                            </tr>
                            <tr>
                                <th>Surat Pernyataan Bermaterai</th>
                                <td>
                                    <a href="../../storage/<?php echo e($user->registrasi_ulang->surat_pernyataan_bermaterai); ?>"
                                        download>Click to download</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Surat Keterangan Siswa Aktif SD Asal</th>
                                <td>
                                    <a href="../../storage/<?php echo e($user->registrasi_ulang->surat_keterangan_siswa_aktif_sd_asal); ?>"
                                        download>Click to download</a>

                                </td>
                            </tr>
                            <tr>
                                <th>Pasfoto</th>
                                <td>
                                    <a href="../../storage/<?php echo e($user->registrasi_ulang->pasfoto); ?>" download>Click to
                                        download</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Akta Kelahiran</th>
                                <td>
                                    <a href="../../storage/<?php echo e($user->registrasi_ulang->akta_kelahiran); ?>" download>Click to
                                        download</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Kartu Keluarga</th>
                                <td>
                                    <a href="../../storage/<?php echo e($user->registrasi_ulang->kk); ?>" download>Click to
                                        download</a>
                                </td>
                            </tr>
                            <?php if(is_null($user->registrasi_ulang->sertifikat)): ?>
                                <tr>
                                    <th>Sertifikat</th>
                                    <td>
                                        <p>Tidak ada.</p>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <th>Sertifikat</th>
                                    <td>
                                        <a href="../../storage/<?php echo e($user->registrasi_ulang->sertifikat); ?>" download>Click to
                                            download</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <th>Nomor Kartu Keluarga</th>
                                <td>
                                    <p><?php echo e($user->registrasi_ulang->no_kk); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th>NIK Siswa</th>
                                <td>
                                    <p><?php echo e($user->registrasi_ulang->nik_siswa); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th>NIK Ayah</th>
                                <td>
                                    <p><?php echo e($user->registrasi_ulang->nik_ayah); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th>NIK IBU</th>
                                <td>
                                    <p><?php echo e($user->registrasi_ulang->nik_ibu); ?></p>
                                </td>
                            </tr>
                            <!-- Add more rows for other additional information -->
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            

            


            <br>
            <div class="row">
                <div class="col">
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-danger btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ppdb\resources\views/agen/show.blade.php ENDPATH**/ ?>