<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapokok extends Model
{
    use HasFactory;

    protected $table = 'registration';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'email', 'upload_file', 'nama_lengkap', 'gelombang', 'nisn', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir',
        'agama', 'asal_sekolah', 'alamat_sekolah', 'jumlah_hafalan', 'nama_ayah', 'pekerjaan_ayah', 'penghasilan_ayah',
        'pendidikan_terakir_ayah', 'no_wa_ayah', 'nama_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'pendidikan_terakir_ibu',
        'no_wa_ibu', 'nama_wali_siswa', 'hubungan_dengan_siswa', 'alamat_wali_siswa', 'pekerjaan_wali', 'penghasilan_wali',
        'pendidikan_terakir_wali', 'no_wa_wali_siswa', 'motivasi', 'daftar_sekolah_lain', 'nama_sekolahnya_jika_daftar',
        'informasi_didapatkan_dari', 'alamat',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->isDirty('nomor_peserta')) {
                $model->nomor_peserta = $model->generateNomorPeserta();
            }
        });
    }

    public function generateNomorPeserta()
    {
        // Format Nomor Peserta : PPDB-SMPTQ-0001

        $formatPrefix = 'PPDB-SMPTQ-';
        $last = Datapokok::orderBy('nomor_peserta', 'desc')->first();
        if ($last) {
            // Get the last number
            $nomor = (int) substr($last->nomor_peserta, strrpos($last->nomor_peserta, "-") + 1);

            // Increment the number
            $nomor_peserta = (int) $nomor + 1;
        } else {
            $nomor_peserta = 1;
        }

        return $formatPrefix . str_pad($nomor_peserta, 4, '0', STR_PAD_LEFT);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agen()
    {
        return $this->belongsTo(Agen::class, 'user_id');
    }

    public function policy()
    {
        return $this->hasOne(Policy::class);
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }
}
