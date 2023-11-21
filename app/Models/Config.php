<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table = 'config';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pendaftaran_akun_ppdb_start',
        'pendaftaran_akun_ppdb_due',
        'pengumpulan_berkas_start',
        'pengumpulan_berkas_due',
        'test_akademik_start',
        'test_akademik_due',
        'test_baca_al_quran_start',
        'test_baca_al_quran_due',
        'test_wawancara_start',
        'test_wawancara_due',
        'pendaftaran_ulang_start',
        'pendaftaran_ulang_due',
        'gelombang',
        'pengumuman',
        'redirect_wa',
        'pesan',
        'kuotap',
        'kuotal',
        'nominal_pembayaran',
        'midtrans_merchant_id',
        'midtrans_client_key',
        'midtrans_server_key',
        'order_id_midtrans',
    ];
}
