<?php

namespace Database\Seeders;

use App\Models\Config;
use App\Models\Datapokok; // Import the User model
use App\Models\Nilai;
use App\Models\Policy;
use App\Models\User;
use Carbon\Carbon; // Import the Carbon class
use Illuminate\Database\Seeder;

// use PSpell\Config;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Kepala sekolah',
            'email' => 'ppdbsmptq@email.com',
            'role' => 0,
            'gelombang' => 'Gelombang 1',
            'password' => bcrypt('ppdb1212'),
        ]);

        Datapokok::create([
            'user_id' => 1,
            // 'policy_id' => 1,
            'nama_lengkap' => "Nama Lengkap",
            'email' => "Email",
            'upload_file' => "Upload file",
            'nisn' => "1234567",
            'jenis_kelamin' => "laki",
            'tempat_lahir' => "Tempat Lahir",
            'tanggal_lahir' => Carbon::now()->toDateTimeString(),
            'agama' => "Islam",
            'asal_sekolah' => "Asal Sekolah",
            'alamat_sekolah' => "Alamat Sekolah",
            'jumlah_hafalan' => 2,
            'alamat' => "Alamat",
            'nama_ayah' => "Nama Ayah",
            'pekerjaan_ayah' => "Pekerjaan Ayah",
            'penghasilan_ayah' => 3,
            'pendidikan_terakir_ayah' => "s1",
            'no_wa_ayah' => "0812345678",
            'nama_ibu' => "Nama Ibu",
            'pekerjaan_ibu' => "Pekerjaan Ibu",
            'penghasilan_ibu' => 3,
            'pendidikan_terakir_ibu' => "s1",
            'no_wa_ibu' => "087123456789",
            'nama_wali_siswa' => "Nama Wali",
            'hubungan_dengan_siswa' => "Hubungan Wali",
            'alamat_wali_siswa' => "Alamat",
            'pekerjaan_wali' => "Pekerjaan wali",
            'penghasilan_wali' => 4,
            'pendidikan_terakir_wali' => "s3",
            'no_wa_wali_siswa' => "00878328323",
            'motivasi' => 'Motivasi',
            'daftar_sekolah_lain' => 1,
            'nama_sekolahnya_jika_daftar' => 'Nama Sekolah',
            'informasi_didapatkan_dari' => 'brosur',
            'alamat' => 'alamat',
        ]);

        Policy::create([
            'datapokok_id' => 1,
            'perjanjian1' => "ya",
            'perjanjian2' => "ya",
            'perjanjian3' => "ya",
            'perjanjian4' => "ya",

        ]);

        Nilai::create([
            "datapokok_id" => 1,
            "akademik" => "50",
            "test_membaca_al_quran" => "50",
            "status" => "Lulus",
        ]);

        Config::create([
            'pendaftaran_akun_ppdb_start' => '2023-11-01 00:00:00',
            'pendaftaran_akun_ppdb_due' => '2023-11-28 23:59:59',
            'pengumpulan_berkas_start' => '2023-11-01 08:00:00',
            'pengumpulan_berkas_due' => '2023-11-28 23:59:59',
            'test_akademik_start' => '2023-11-26 08:00:00',
            'test_akademik_due' => '2023-11-26 23:59:59',
            'test_baca_al_quran_start' => '2023-11-26 08:00:00',
            'test_baca_al_quran_due' => '2023-11-26 23:59:59',
            'test_wawancara_start' => '2023-11-26 08:00:00',
            'test_wawancara_due' => '2023-11-26 23:59:59',
            'pendaftaran_ulang_start' => '2023-11-27 08:00:00',
            'pendaftaran_ulang_due' => '2023-11-27 23:59:59',
            'gelombang' => 'Gelombang 1',
            'pengumuman' => 0,
            'redirect_wa' => 'https://web.whatsapp.com',
            'nominal_pembayaran' => '250000',
            'midtrans_merchant_id' => 'G128217183',
            'midtrans_client_key' => 'SB-Mid-client-4etAajAoLwuUl9zu',
            'midtrans_server_key' => 'SB-Mid-server-SIOwZXDCN2fST0FmnHagFPyT',
            'order_id_midtrans' => 1,
        ]);

    }
}
