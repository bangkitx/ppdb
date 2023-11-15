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
    public function up()
    {
        Schema::create('reRegistration', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('ijazah');
            $table->string('surat_pernyataan_bermaterai');
            $table->string('surat_keterangan_siswa_aktif_sd_asal');
            $table->string('pasfoto');
            $table->string('akta_kelahiran');
            $table->string('kk');
            $table->string('no_kk');
            $table->string('nik_siswa');
            $table->string('nik_ayah');
            $table->string('nik_ibu');
            $table->string('sertifikat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reRegistration');
    }
};
