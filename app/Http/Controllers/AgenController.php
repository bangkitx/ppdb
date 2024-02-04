<?php

namespace App\Http\Controllers;

use App\Exports\UsersAllLulus;
use App\Exports\UsersAllTidakLulus;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Agen;
use App\Models\Config;
use App\Models\Datapokok;
use App\Models\Nilai;
use App\Models\Payment;
use App\Models\Policy;
use App\Models\RegistrasiUlang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

date_default_timezone_set('Asia/Jakarta');

class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_user_with_all_paid()
    {
        $users = DB::table('users')
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->select('users.*', 'payments.*', 'registration.*')
            ->where('payments.status', 2)
            ->where('users.role', 1)
            ->get();
    }

    public function get_user_with_all_paid_and_datapokok()
    {
        $users = DB::table('users')
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->select('users.*', 'payments.*', 'registration.*')
            ->where('payments.status', 2)
            ->where('users.role', 1)
            ->where('registration.user_id', '!=', null)
            ->get();
        // dd($users);
    }

    public function get_user_with_all_registerd_account()
    {
        $users = DB::table('users')
            ->where('users.role', 1)
            ->get();
        dd($users);
    }

    public function index(Request $request)
    {
        $query = User::withoutTrashed()->whereNotIn('role', [0, 2]);

        // Mencari berdasarkan nama
        if ($search = $request->input('cari')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // Filter berdasarkan tahun
        if ($tahun = $request->input('tahun')) {
            $query->whereYear('created_at', $tahun);
        }

        // Filter berdasarkan gelombang
        if ($gelombang = $request->input('gelombang')) {
            $query->where('gelombang', $gelombang);
        }

        // Pagination
        $dataagen = $query->sortable()->paginate(5);
        $dataagen->appends($request->all());

        return view('agen.index', [
            'agen' => $dataagen,
        ]);
    }

    /**
     * Retrieves the data for the bin page.
     *
     * @param Request $request The HTTP request object.
     * @throws None
     * @return View The view for the bin page.
     */
    public function bin(Request $request)
    {
        $cari = $request->query('cari');

        $user = User::onlyTrashed();

        if (!empty($cari)) {
            $dataagen = $user->where('name', 'like', "%" . $cari . "%")
                ->sortable();
            //
        } else {
            $dataagen = $user->sortable();
        }

        $dataagen = $user->paginate(5);
        return view('agen.bin')->with([
            'agen' => $dataagen,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('agen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  ! TAMBAH USER
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $gelombang = Config::where('gelombang', '!=', null)->first()->gelombang;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gelombang' => $gelombang,
        ]);
        // $user = User::where('id', $userData)->first();

        $datapokok = $user->datapokok()->create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'upload_file' => "NULL",
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
            'motivasi' => 'motivasi',
            'daftar_sekolah_lain' => 1,
            'nama_sekolahnya_jika_daftar' => 'nama sekolah',
            'informasi_didapatkan_dari' => 'brosur',
        ]);

        $raw_data_policy = [
            'perjanjian1' => "ya",
            'perjanjian2' => "ya",
            'perjanjian3' => "ya",
            'perjanjian4' => "ya",
        ];

        $raw_data_nilai = [
            "akademik" => null,
            "test_membaca_al_quran" => null,
            "status" => "BELUM LULUS",
        ];

        $datapokok->nilai()->create($raw_data_nilai);
        $datapokok->policy()->create($raw_data_policy);

        if ($request->paid) {
            $user->payment()->create([
                'amount' => 100000,
                'status' => 2,
                'status_payment' => 2,
            ]);
        }

        // Agen::create($input);
        return redirect('agen')->with('flash_message', 'Isi datapokok selesai!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $agen = Registration::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();
        $agen = $user->datapokok;

        $registrasi_ulang = RegistrasiUlang::where('user_id', $id)->first();

        $data = [];
        return view('agen.show')->with(['agen' => $agen, 'user' => $user, 'data' => $data]);
    }

    public function cetak($id)
    {
        $agen = Datapokok::where('user_id', $id)->first();
        // return $agen;
        return view('agen.cetak')->with('agen', $agen);
    }

    public function cetak_kartu($id)
    {
        $user = User::where('id', $id)->first();
        $agen = $user->avatar;
        $data = Datapokok::where('user_id', $id)->first();
        return view('siswa.cetak-kartu', ['data' => $data, 'avatar' => $user->avatar]);
    }
    public function masukNilai($id)
    {

        $agen = Datapokok::where('user_id', $id)->first();

        // dd($agen->policy);// return $agen;
        return view('agen.nilai')->with('agen', $agen)->with('config', Config::where('id', 1)->first());
    }

    public function check_nilai(Nilai $nilai)
    {

        //cek nilai akademis
        $nilai_akademis = [];
        // $nilai_baca_quaran = $nilai->test_membaca_al_quran;
        $nilai_akir = '';
        array_push($nilai_akademis, $nilai->akademik, $nilai->test_membaca_al_quran);

        if (in_array("D", $nilai_akademis)) {
            $nilai_akir = "Tidak Lulus";
        } else if (in_array("E", $nilai_akademis)) {
            $nilai_akir = "Tidak Lulus";
        } else {
            $nilai_akir = "Lulus";
        }

        return $nilai_akir;
    }

    public function updateNilai(Request $request, $id)
    {
        // return $id;

        $agen = Datapokok::where('user_id', $id)->first();
        // return $id;

        $nilai = $agen->nilai;

        $validateData = [
            'akademik' => $request->akademik,
            'test_membaca_al_quran' => $request->test_membaca_al_quran,
        ];

        // Update the $nilai object with the new data
        $nilai->update($validateData);

        // Update the 'status' field based on the 'check_nilai' method
        $nilai->update([
            'status' => $this->check_nilai($nilai),
        ]);

        return redirect('/agen/nilai/' . $id)->with(['flash_message' => 'Nilai Updated!', 'agen' => $agen]);
    }

    // $nilai = Nilai::where('id', $nilaiId)->first();
    // $input = $request->all();
    // $nilai->update($input);

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agen = User::findOrFail($id);
        return view('agen.edit')->with('agen', $agen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $agen)
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

        $input = $request->all();
        $agen->datapokok->update($input);

        if ($request->paid) {
            $agen->payment()->create([
                'amount' => 100000,
                'status' => 2,
                'status_payment' => 2,
            ]);
        }
        return redirect('agen')->with('status', 'Siswa ' . $agen->name . ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $agen = User::where('id', $id)->first();

        // dd($agen->registrasi_ulang->id);

        // return $agen;
        $nama = $agen->name;
        User::destroy($id);

        return redirect('agen')->with('status', 'Siswa ' . $nama . ' berhasil dihapus!');
    }

    /**
     * Restores a user by their ID.
     *
     * @param int $id The ID of the user to restore.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the user is not found.
     * @return \Illuminate\Http\RedirectResponse The response redirecting to the specified page with a success message.
     */
    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect('agen/bin')->with('status', 'Siswa ' . $user->name . ' berhasil dikembalikan!');
    }

    /**
     * Delete a record from the database permanently.
     *
     * @param int $id The ID of the record to be deleted.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the record with the given ID is not found.
     * @return \Illuminate\Http\RedirectResponse Redirects to the 'agen/bin' page with a success message.
     */
    public function forceDelete($id)
    {

        $agen = User::onlyTrashed()->findOrFail($id);

        if (!empty($agen->payment)) {
            Payment::destroy($agen->id);
        }

        if (!empty($agen->datapokok)) {
            if (!empty($agen->datapokok->policy)) {
                Policy::destroy($agen->datapokok->policy->id);
            }
            if (!empty($agen->datapokok->nilai)) {;
                Nilai::destroy($agen->datapokok->nilai->id);
            }
            Datapokok::destroy($agen->datapokok->id);
        }

        if (!empty($agen->registrasi_ulang)) {
            RegistrasiUlang::destroy($agen->registrasi_ulang->id);
        }
        // return $agen;
        $nama = $agen->name;
        $agen->forceDelete();

        return redirect('agen/bin')->with('status', 'Siswa ' . $nama . ' berhasil dihapus!');
    }

    public function exportSiswaSudahBayar(Request $request)
    {
        $tahun = $request->input('tahun');
        $gelombang = $request->input('gelombang');

        return Excel::download(new UsersExport($tahun, $gelombang), 'siswa-sudah-bayar.xlsx');
    }
    public function export_sudah_lulus(Request $request)
    {
        $tahun = $request->input('tahun');
        $gelombang = $request->input('gelombang');

        return Excel::download(new UsersAllLulus($tahun, $gelombang), 'Siswa_Lulus.xlsx');
    }

    public function export_tidak_lulus(Request $request)
    {
        $tahun = $request->input('tahun');
        $gelombang = $request->input('gelombang');

        return Excel::download(new UsersAllTidakLulus($tahun, $gelombang), 'Siswa_Tidak_lulus.xlsx');
    }
}
