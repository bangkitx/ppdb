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
        // Count the number of users who have made a payment and filled in their data pokok
        $paidAndFilledDatapokok = DB::table('users')
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->where('payments.status', 2)
            ->count();
    
        return $paidAndFilledDatapokok;
    }
    
    public function countSiswaLaki()
    {
        // Count the number of male students
        $siswaLaki = DB::table('users')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->where('registration.jenis_kelamin', 'laki')
            ->where('users.role', 1)
            ->count();
    
        return $siswaLaki;
    }
    
    public function countSiswiPerempuan()
    {
        // Count the number of female students
        $siswiPerempuan = DB::table('users')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->where('registration.jenis_kelamin', 'perempuan')
            ->where('users.role', 1)
            ->count();
    
        return $siswiPerempuan;
    }
    
    public function allLulus()
    {
        // Count the number of all students who passed
        $allLulus = DB::table('users')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->join('testResult', 'registration.id', '=', 'testResult.datapokok_id')
            ->where('users.role', 1)
            ->where('testResult.status', 'Lulus')
            ->count();
    
        return $allLulus;
    }
    
    public function lulusSiswaLaki()
    {
        // Count the number of male students who passed
        $lulusSiswaLaki = DB::table('users')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->join('testResult', 'registration.id', '=', 'testResult.datapokok_id')
            ->where('registration.jenis_kelamin', 'laki')
            ->where('users.role', 1)
            ->where('testResult.status', 'Lulus')
            ->count();
    
        return $lulusSiswaLaki;
    }
    
    public function lulusSiswiPerempuan()
    {
        // Count the number of female students who passed
        $lulusSiswiPerempuan = DB::table('users')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            ->join('testResult', 'registration.id', '=', 'testResult.datapokok_id')
            ->where('registration.jenis_kelamin', 'perempuan')
            ->where('users.role', 1)
            ->where('testResult.status', 'Lulus')
            ->count();
    
        return $lulusSiswiPerempuan;
    }
    

    public function index()
    {

        $userData = auth()->user()->id;
        $config = Config::where('id', 1)->first();
        $date = Carbon::now();
        $bulan = $date->format('F');
        $tahun = $date->format('Y');

        return view('welcome', [
            'user' => User::find($userData),
            'config' => $config,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'count' => $this->count_paid_and_filled_datapokok(),
            'siswaLaki' => $this->countSiswaLaki(),
            'siswiPerempuan' => $this->countSiswiPerempuan(),
            'allLulus' => $this->allLulus(),
            'lulusSiswaLaki' => $this->lulusSiswaLaki(),
            'lulusSiswiPerempuan' => $this->lulusSiswiPerempuan(),
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
