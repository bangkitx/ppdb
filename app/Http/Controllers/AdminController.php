<?php

namespace App\Http\Controllers;

use App\Models\Config;
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
        $query = User::where('role', 2);

// Mencari berdasarkan nama
        if ($search = $request->input('cari')) {
            $query->where('name', 'like', "%{$search}%");
        }

// Pagination
        $dataagen = $query->sortable()->paginate(5);
        $dataagen->appends($request->all());

        return view('agen.admin', [
            'agen' => $dataagen,
        ]);

    }

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
        return view('agen.binadmin')->with([
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
        return view('agen.createadmin');

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
        $role = 2;

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

    public function restore($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return redirect('admin/bin')->with('status', 'Admin ' . $user->name . ' berhasil dikembalikan!');
    }

    public function forceDelete($id)
    {

        $agen = User::onlyTrashed()->findOrFail($id);

        $nama = $agen->name;
        $agen->forceDelete();

        return redirect('admin/bin')->with('status', 'Admin ' . $nama . ' berhasil dihapus!');
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

        $nama = $agen->name;
        User::destroy($id);

        return redirect('admin')->with('status', 'Admin ' . $nama . ' berhasil dihapus!');

    }
}
