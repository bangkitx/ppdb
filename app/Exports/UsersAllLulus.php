<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class UsersAllLulus implements FromView
{
    protected $tahun;
    protected $gelombang;

    public function __construct($tahun = null, $gelombang = null)
    {
        $this->tahun = $tahun;
        $this->gelombang = $gelombang;
    }

    public function view(): View
    {
        $query = DB::table('users')
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->join('registration', 'users.id', '=', 'registration.user_id')
            // ->join('reRegistration', 'users.id', '=', 'reRegistration.user_id')
            ->join('testResult', 'registration.id', '=', 'testResult.datapokok_id')
            ->select('users.*', 'payments.*', 'registration.*','testResult.status')
            ->where('users.role', 1)
            ->where('payments.status_payment', 2)
            ->where('payments.status', 2)
            ->where('testResult.status', 'Lulus');

        if ($this->tahun) {
            $query->whereRaw('YEAR(users.created_at) = ?', [$this->tahun]);
        }
        if ($this->gelombang) {
            $query->where('users.gelombang', $this->gelombang);
        }

        $users = $query->get();
        $lulus = "Lulus";

        return view('agen.allsiswalulus', [
            'agen' => $users,
            'lulus' => $lulus,
        ]);
    }
}
