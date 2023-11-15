<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // Jumlah Hafalan
    // 0-10 Jumlah juznya

    //penghasilan
    // 1 = 1 Juta
    // 2 = 1-3 juta
    // 3 = 3-5 juta
    // 4 = 5-10 juta
    // 5 = 10 juta diatas

    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            // $table->foreignId('policy_id');
            $table->string('email');
            $table->string('upload_file');
            $table->string('nama_lengkap');
            $table->string('nisn');
            $table->string('nomor_peserta');
            $table->enum('jenis_kelamin', ['laki', 'perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('asal_sekolah');
            $table->string('alamat_sekolah');
            $table->enum('jumlah_hafalan', [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
            $table->string('nama_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->enum('penghasilan_ayah', ['<1Juta', '1Juta-3Juta', '3Juta-5Juta', '5Juta-10Juta', '>10Juta'])->nullable();
            $table->enum('pendidikan_terakir_ayah', ['sd', 'smp', 'sma', 'd1/2/3', 's1', 's2', 's3'])->nullable();
            $table->string('no_wa_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('penghasilan_ibu', ['<1Juta', '1Juta-3Juta', '3Juta-5Juta', '5Juta-10Juta', '>10Juta'])->nullable();
            $table->enum('pendidikan_terakir_ibu', ['sd', 'smp', 'sma', 'd1/2/3', 's1', 's2', 's3'])->nullable();
            $table->string('no_wa_ibu')->nullable();
            $table->string('nama_wali_siswa')->nullable();
            $table->string('hubungan_dengan_siswa')->nullable();
            $table->string('alamat_wali_siswa')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->enum('penghasilan_wali', ['<1Juta', '1Juta-3Juta', '3Juta-5Juta', '5Juta-10Juta', '>10Juta'])->nullable();
            $table->enum('pendidikan_terakir_wali', ['sd', 'smp', 'sma', 'd1/2/3', 's1', 's2', 's3'])->nullable();
            $table->string('no_wa_wali_siswa')->nullable();
            $table->string('motivasi');
            $table->boolean('daftar_sekolah_lain');
            $table->string('nama_sekolahnya_jika_daftar');
            $table->enum('informasi_didapatkan_dari', ['website', 'brosur', 'pamflet', 'kerabat', 'lain-lain']);
            $table->timestamps();
        });
    }

    // email -varchar
    // upload -file
    // nama_lengkap -varchar
    // NISN -varchar
    // jenis_kelamin -enum(laki-laki,Perempuan)
    // tempat_lahir -varchar
    // tanggal_lahir_siswa -date
    // agama -varchar
    // asal_sekolah -varchar
    // alamat_sekolah -varchar
    // jumlah hafalan -enum
    // nama_ayah -varchar
    // pekerjaan_ayah -varchar
    // penghasilan_ayah -enum
    // pendidikan_terakir_ayah -enum
    // no_wa_ayah -int
    // nama_ibu -varchar
    // pekerjaan_ibu -varchar
    // penghasilan_ibu -enum
    // pendidikan_terakir_ibu -enum
    // no_wa_ibu -int
    // nama_wali_siswa -varchar
    // hubungan_dengan_siswa -varchar

    // alamat_wali_siswa -varchar
    // penghasilan_wali_siswa -enum
    // pendidikan_tertinggi_wali_siswa -enum
    // no_wa_wali_siswa -enum
    // motivasi -varchar
    // daftar_sekolah_lain -boelan
    // nama_sekolahnya_jika_daftar -varchar
    // informasi_didapatkan_dari -enum

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration');
    }
};
