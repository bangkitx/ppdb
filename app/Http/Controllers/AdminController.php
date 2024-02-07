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
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::withoutTrashed()->where('role', 'Admin');

        // Mencari berdasarkan nama
        if ($search = $request->input('cari')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // Pagination
        $dataadmin = $query->sortable()->paginate(5);
        $dataadmin->appends($request->all());

        return view('admin.index', [
            'admin' => $dataadmin,
        ]);

    }

    public function bin(Request $request)
    {
        $query = User::onlyTrashed()->where('role', 'Admin');

        // Mencari berdasarkan nama
        if ($search = $request->input('cari')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // Pagination
        $dataadmin = $query->sortable()->paginate(5);
        $dataadmin->appends($request->all());

        return view('admin.bin', [
            'admin' => $dataadmin,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gelombang = Config::where('gelombang', '!=', null)->first()->gelombang;
        $role = 'Admin';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
            'gelombang' => $gelombang,
        ]);
        return redirect('admin')->with('flash_message', 'Tambah Admin Berhasil!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $admin = User::where('id', $id)->first();

        $nama = $admin->name;
        User::destroy($id);

        return redirect('agen')->with('status', 'Admin ' . $nama . ' berhasil dihapus!');
    }

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

        return redirect('admin/bin')->with('status', 'Admin ' . $nama . ' berhasil dihapus!');
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);

        $user->restore();

        return redirect('admin/bin')->with('status', 'Admin ' . $user->name . ' berhasil dikembalikan!');
    }

}
