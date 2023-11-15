<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// use PSpell\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function alur_config(Request $request)
    {
        // update config
        $config_data = Config::find(1);
        $config_data->update([
            'pendaftaran_akun_ppdb_start' => $request->pendaftaran_akun_ppdb_start,
            'pendaftaran_akun_ppdb_due' => $request->pendaftaran_akun_ppdb_due,
            'pengumpulan_berkas_start' => $request->pengumpulan_berkas_start,
            'pengumpulan_berkas_due' => $request->pengumpulan_berkas_due,
            'test_akademik_start' => $request->test_akademik_start,
            'test_akademik_due' => $request->test_akademik_due,
            'test_baca_al_quran_start' => $request->test_baca_al_quran_start,
            'test_baca_al_quran_due' => $request->test_baca_al_quran_due,
            'test_wawancara_start' => $request->test_wawancara_start,
            'test_wawancara_due' => $request->test_wawancara_due,
            'pendaftaran_ulang_start' => $request->pendaftaran_ulang_start,
            'pendaftaran_ulang_due' => $request->pendaftaran_ulang_due,
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function count_paid_and_filled_datapokok()
    {
        return $users = DB::table('users')
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->select('users.*', 'payments.*', 'registration.*')
            ->where('payments.status', 2)
            ->count();
    }

    public function countSiswaLaki()
    {
        $siswaLaki = DB::table('users')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->where('registration.jenis_kelamin', 'laki')
            ->where('users.role', 1)
            ->count();

        return $siswaLaki;
    }

    public function countSiswiPerempuan()
    {
        $siswiPerempuan = DB::table('users')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->where('registration.jenis_kelamin', 'perempuan')
            ->where('users.role', 1)
            ->count();

        return $siswiPerempuan;
    }

    public function index()
    {

        $userData = auth()->user()->id;

        $date = Carbon::now();
        $bulan = $date->format('F');
        $tahun = $date->format('Y');

        return view('welcome', [
            'user' => User::find($userData),
            'bulan' => $bulan,
            'tahun' => $tahun,
            'count' => $this->count_paid_and_filled_datapokok(),
            'siswaLaki' => $this->countSiswaLaki(),
            'siswiPerempuan' => $this->countSiswiPerempuan(),
        ]);

    }

    public function indexsiswa()
    {

        $userData = auth()->user()->id;

        $user = User::where('id', $userData)->first();
        $config = Config::where('id', 1)->first();
        $agen = $user->datapokok;

        return view('siswahome')->with(['agen' => $agen, 'config' => $config]);

    }

    #create count users in table registration with jenis_kelamin = laki-laki

}
