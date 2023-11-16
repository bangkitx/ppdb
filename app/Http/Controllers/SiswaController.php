<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Datapokok;
use App\Models\Nilai;
use App\Models\Payment;
use App\Models\Policy;
use App\Models\RegistrasiUlang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Jakarta');

class SiswaController extends Controller
{
    public function awal()
    {
        return redirect("/login");
    }

    public function index(Request $request)
    {
        $userData = auth()->user()->id;

        $user = User::where('id', $userData)->first();
        $config = Config::where('id', 1)->first();
        $agen = $user->datapokok;
        $date_now = date('Y-m-d H:i:s');
        $payment = Payment::where('user_id', $userData)->first();
        // dd($agen->nilai);

        // $payment = auth()->user()->payment;

        if (is_null($agen)) {
            $agen = 'NULL'; // Set a default value or any other value you want to use
        }

        return view('siswa.index')->with([
            'agen' => $agen,
            'user' => $user,
            'config' => $config,
            'date_now' => $date_now,
            'payment' => $payment,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function check_payment()
    {
        $userData = auth()->user();
        if (!is_null($userData->payment)) {
            $test = Payment::where('user_id', Auth::user()->id)
                ->where('status_payment', 2)
                ->where('status', 2)
                ->first();
            if (!$test) {
                return abort(403, 'Belom Bayar');
            }
        }
    }

    public function create()
    {
        $this->check_payment();
        $userData = auth()->user();

        if (!is_null($userData->datapokok)) {
            return abort(403, 'Belom Isi DataPokok');
        }
        $userData = auth()->user()->id;
        $payment = Payment::where('user_id', $userData)->first();

        $config = Config::where('id', 1)->first();

        return view('siswa.create')->with(['config' => $config, 'payment' => $payment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "nama_lengkap" => ["required", "string", "max:255"],
            "nisn" => ["required", "integer"],
            "jenis_kelamin" => ["required", "in:laki,perempuan"],
            "tempat_lahir" => ["required", "string", "max:255"],
            "tanggal_lahir" => ["required", "date:Y-m-d"],
            "jumlah_hafalan" => ["required", "integer"],
            "agama" => ["required", "in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu"],
            "alamat" => ["required", "string"],
            "asal_sekolah" => ["required", "string"],
            "alamat_sekolah" => ["required", "string"],
            "nama_ayah" => ["required"],
            "no_wa_ayah" => ["required", "regex:/^(\+62|62|0)[1-9][1-9][0-9]{6,9}$/"],
            "pendidikan_terakir_ayah" => ["required", "in:sd,smp,sma,d1/2/3,s1,s2,s3"],
            "pekerjaan_ayah" => ["required", "string"],
            "penghasilan_ayah" => ["required", "in:1,2,3,4,5"],
            "nama_ibu" => ["required"],
            "no_wa_ibu" => ["required", "regex:/^(\+62|62|0)[1-9][1-9][0-9]{6,9}$/"],
            "pendidikan_terakir_ibu" => ["required", "in:sd,smp,sma,d1/2/3,s1,s2,s3"],
            "pekerjaan_ibu" => ["required", "string"],
            "penghasilan_ibu" => ["required", "in:1,2,3,4,5"],
            "nama_wali_siswa" => ["nullable", "string"],
            "no_wa_wali_siswa" => ["nullable", "regex:/^(\+62|62|0)[1-9][1-9][0-9]{6,9}$/"],
            "hubungan_dengan_siswa" => ["nullable", "string"],
            "alamat_wali_siswa" => ["nullable", "string"],
            "pekerjaan_wali" => ["nullable", "string"],
        ]);

        $userData = auth()->user();
        $config = Config::where('id', 1)->first();

        if (!is_null($userData->datapokok)) {
            return abort(404, 'Not Found');
        }

        $daftarSekolahLain = $request->input('daftar_sekolah_lain');
        $namaSekolahJikaDaftar = $request->input('nama_sekolahnya_jika_daftar');

        // If the checkbox is not checked and the field is not filled, set a default value
        if (!$daftarSekolahLain || empty($namaSekolahJikaDaftar)) {
            $namaSekolahJikaDaftar = 'None';
            $daftarSekolahLain = 0;
        }

        Datapokok::create([
            'user_id' => $userData->id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $userData->email,
            'upload_file' => 'NULL',
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'jumlah_hafalan' => 2,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'pendidikan_terakir_ayah' => $request->pendidikan_terakir_ayah,
            'no_wa_ayah' => $request->no_wa_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'pendidikan_terakir_ibu' => $request->pendidikan_terakir_ibu,
            'no_wa_ibu' => $request->no_wa_ibu,
            'nama_wali_siswa' => $request->nama_wali_siswa,
            'hubungan_dengan_siswa' => $request->hubungan_dengan_siswa,
            'alamat_wali_siswa' => $request->alamat_wali_siswa,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'pendidikan_terakir_wali' => $request->pendidikan_terakir_wali,
            'no_wa_wali_siswa' => $request->no_wa_wali_siswa,
            'motivasi' => $request->motivasi,
            'daftar_sekolah_lain' => $daftarSekolahLain,
            'nama_sekolahnya_jika_daftar' => $namaSekolahJikaDaftar,
            'informasi_didapatkan_dari' => $request->informasi_didapatkan_dari,
        ]);

        $idBaruDatapokok = Datapokok::latest('id')->first();

        $raw_data_policy = [
            'datapokok_id' => $idBaruDatapokok->id,
            'perjanjian1' => $request->perjanjian1,
            'perjanjian2' => $request->perjanjian2,
            'perjanjian3' => $request->perjanjian3,
            'perjanjian4' => $request->perjanjian4,
        ];

        $raw_data_nilai = [
            'datapokok_id' => $idBaruDatapokok->id,
            'akademik' => null,
            'test_membaca_al_quran' => null,
            'status' => 'BELUM LULUS',
        ];

        Nilai::create($raw_data_nilai);
        Policy::create($raw_data_policy);

        // Agen::create($input);
        return redirect('siswa')->with(['flash_message' => 'Isi datapokok selesai!', 'config' => $config]);
    }

    public function edit()
    {
        $siswa = auth()->user();

        if (is_null($siswa->datapokok)) {
            return redirect('siswa/create');
        }

        return view('siswa.edit', ['data' => $siswa->datapokok]);
    }

    public function update(Request $request)
    {

        $request->validate([
            "nama_lengkap" => ["required", "string", "max:255"],
            "nisn" => ["required", "integer"],
            "jenis_kelamin" => ["required", "in:laki,perempuan"],
            "tempat_lahir" => ["required", "string", "max:255"],
            "tanggal_lahir" => ["required", "date:Y-m-d"],
            "jumlah_hafalan" => ["required", "integer"],
            "agama" => ["required", "in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu"],
            "alamat" => ["required", "string"],
            "asal_sekolah" => ["required", "string"],
            "alamat_sekolah" => ["required", "string"],
            "nama_ayah" => ["required"],
            "no_wa_ayah" => ["required", "regex:/^(\+62|62|0)[1-9][1-9][0-9]{6,9}$/"],
            "pendidikan_terakir_ayah" => ["required", "in:sd,smp,sma,d1/2/3,s1,s2,s3"],
            "pekerjaan_ayah" => ["required", "string"],
            "penghasilan_ayah" => ["required", "in:1,2,3,4,5"],
            "nama_ibu" => ["required"],
            "no_wa_ibu" => ["required", "regex:/^(\+62|62|0)[1-9][1-9][0-9]{6,9}$/"],
            "pendidikan_terakir_ibu" => ["required", "in:sd,smp,sma,d1/2/3,s1,s2,s3"],
            "pekerjaan_ibu" => ["required", "string"],
            "penghasilan_ibu" => ["required", "in:1,2,3,4,5"],
            "nama_wali_siswa" => ["nullable", "string"],
            "no_wa_wali_siswa" => ["nullable", "regex:/^(\+62|62|0)[1-9][1-9][0-9]{6,9}$/"],
            "hubungan_dengan_siswa" => ["nullable", "string"],
            "alamat_wali_siswa" => ["nullable", "string"],
            "pekerjaan_wali" => ["nullable", "string"],
        ]);

        $siswa = auth()->user();

        Datapokok::where('user_id', $siswa->id)->first()->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $siswa->email,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'jumlah_hafalan' => $request->jumlah_hafalan,
            'nama_ayah' => $request->nama_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'penghasilan_ayah' => $request->penghasilan_ayah,
            'pendidikan_terakir_ayah' => $request->pendidikan_terakir_ayah,
            'no_wa_ayah' => $request->no_wa_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'pendidikan_terakir_ibu' => $request->pendidikan_terakir_ibu,
            'no_wa_ibu' => $request->no_wa_ibu,
            'nama_wali_siswa' => $request->nama_wali_siswa,
            'hubungan_dengan_siswa' => $request->hubungan_dengan_siswa,
            'alamat_wali_siswa' => $request->alamat_wali_siswa,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'pendidikan_terakir_wali' => $request->pendidikan_terakir_wali,
            'no_wa_wali_siswa' => $request->no_wa_wali_siswa,
        ]);

        return redirect('siswa')->with('flash_message', 'Datapokok berhasil diperbaharui!');
    }

    public function cetak_kartu()
    {
        $user = auth()->user();
        $data = Datapokok::where('user_id', $user->id)->first();
        return view('siswa.cetak-kartu', ['data' => $data, 'avatar' => $user->avatar]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function pengumuman($id)
    {

        $config = Config::where('id', 1)->first();
        $siswa = Datapokok::where('user_id', $id)->first();
        $nilai = Nilai::where('datapokok_id', $siswa->id)->first();
        $userData = auth()->user()->id;
        $payment = Payment::where('user_id', $userData)->first();

        if ($config->pengumuman != true) {
            return abort(403, "Config Pengumuman Belum dibuka");
        };
        if (!$siswa) {
            return abort(403, "Data Pokok Tidak Ditemukan");
        }
        if ($nilai->akademik === "Isi nilai A-E") {
            return abort(403, "Belom Mempunyai Nilai");
        };

        $userData = auth()->user()->id;
        $user = User::where('id', $userData)->first();
        // dd($user->datapokok->nilai->status);

        $agen = $user->datapokok;
        // dd($agen);
        $date_now = date('Y-m-d H:i:s');

        if (is_null($agen)) {
            $agen = 'NULL'; // Set a default value or any other value you want to use
        }

        // $user = User::where('id', $userData)->first();

        return view('siswa.pengumuman')->with(['siswa' => $siswa, 'agen' => $agen, 'config' => $config, 'user' => $user, 'payment' => $payment]);
    }
    public function cetak($id)
    {
        $agen = Datapokok::where('id', $id)->first();
        return view('agen.cetak')->with('agen', $agen);
    }

    public function cetakpokok($id)
    {
        $agen = Datapokok::where('id', $id)->first();
        return view('siswa.cetakpokok')->with('agen', $agen);
    }

    public function registrasiUlang($id)
    {
        // return $id;
        $siswa = Datapokok::where('id', $id)->first();
        $nilai = Nilai::where('datapokok_id', $id)->first();
        $registrasi_ulang = RegistrasiUlang::where('user_id', Auth::user()->id)->first();
        $userData = auth()->user()->id;
        $payment = Payment::where('user_id', $userData)->first();

        $config = Config::where('id', 1)->first();
        if ($config->pengumuman != true) {
            return abort(403, "Config Pengumuman Masih Mati");
        };

        if ($nilai->status != "Lulus") {
            return abort(403, "Tidak Lulus");
        }

        if ($registrasi_ulang) {
            return abort(403, "Sudah Pernah Mengisi Dokumen");
        }

        //   $siswa->nilai;
        // return $agen;
        $userData = auth()->user()->id;
        $user = User::where('id', $userData)->first();

        // dd($user->nilai);
        $agen = $user->datapokok;
        // $date_now = date('Y-m-d H:i:s');

        if (is_null($agen)) {
            $agen = 'NULL'; // Set a default value or any other value you want to use
        }

        return view('siswa.registrasi')->with(['siswa' => $siswa, 'agen' => $agen, 'config' => $config, 'payment' => $payment]);
    }

}
