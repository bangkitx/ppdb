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


    //Dokumentasi

    //Perjanjian 1
    // Percaya dan taat sepenuhnya kepada kebijaksanaan SMPTQ

    //Perjanjian 2  
    // Mendukung sunnah dan disiplin yang berlaku di SMPTQ 
    
    //Perjanjian 3
    // Memenuhi segala kewajiban yang telah ditetapkan oleh SMPTQ
    
    //Perjanjian 4
    //Melunasi semua pembayaran uang sekolah dan uang makan sebelum Ujian  Ganjil dan Semester Genap.
    
    public function up()
    {
        Schema::create('policy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datapokok_id');
            $table->enum('perjanjian1',['ya','tidak','ragu']);
            $table->enum('perjanjian2',['ya','tidak','ragu']);
            $table->enum('perjanjian3',['ya','tidak','ragu']);
            $table->enum('perjanjian4',['ya','tidak','ragu']);
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
        Schema::dropIfExists('policy');
    }
};
