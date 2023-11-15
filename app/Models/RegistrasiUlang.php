<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiUlang extends Model
{
    use HasFactory;
    protected $table = 'reRegistration';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'ijazah',
        'surat_pernyataan_bermaterai',
        'surat_keterangan_siswa_aktif_sd_asal',
        'pasfoto',
        'akta_kelahiran',
        'kk',
        'no_kk',
        'nik_siswa',
        'nik_ayah',
        'nik_ibu',
        'sertifikat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
