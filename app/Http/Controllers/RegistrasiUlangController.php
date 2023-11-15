<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Storage;
use App\Models\Config;
use App\Models\Datapokok;

// use App\Models\RegistrasiUlang;
use App\Models\RegistrasiUlang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Models\RegistrasiUlang;
use Illuminate\Support\Facades\Storage;

class RegistrasiUlangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // return $request;

        $user = auth()->user()->id;
        $auth = auth()->user();
        $config = Config::where('id', 1)->first();

        if (!is_null($auth->registrasi_ulang)) {
            return abort(403, 'Unauthorized');

        }

        $user = auth()->user()->id;
        $siswa = Datapokok::where('user_id', $user)->first();

        $usess = User::find(Auth::user()->id);
        // dd($usess->datapokok);
        $request->validate([
            'ijazah' => 'required|mimes:pdf,docx',
            'surat_pernyataan_bermaterai' => 'required|mimes:pdf,docx',
            'surat_keterangan_siswa_aktif_sd_asal' => 'required|mimes:pdf,docx',
            'pasfoto' => 'required|image|mimes:jpg,jpeg,png',
            'akta_kelahiran' => 'required|mimes:pdf,docx',
            'kk' => 'required|mimes:pdf,docx',
            "no_kk" => 'required',
            "nik_siswa" => 'required',
            "nik_ayah" => 'required',
            "nik_ibu" => 'required',
        ]);

        // return $siswa;

        // Store the uploaded files
        $uploadedFiles = [];
        // return $user->datapokok;
        // $agen = $user->datapokok;
        // return $agen;'
        $agen = '';
        $date_now = date('Y-m-d H:i:s');

        if (is_null($siswa)) {
            $agen = 'NULL'; // Set a default value or any other value you want to use
        }

        foreach ($request->allFiles() as $key => $file) {
            $path = $file->store('/public/uploads'); // Store files in the 'uploads' directory

            $uploadedFiles[$key] = $path;
        }

        $the_data = [
            'user_id' => auth()->user()->id,
            'ijazah' => $uploadedFiles['ijazah'],
            'surat_pernyataan_bermaterai' => $uploadedFiles['surat_pernyataan_bermaterai'],
            'surat_keterangan_siswa_aktif_sd_asal' => $uploadedFiles['surat_keterangan_siswa_aktif_sd_asal'],
            'pasfoto' => $uploadedFiles['pasfoto'],
            'akta_kelahiran' => $uploadedFiles['akta_kelahiran'],
            'kk' => $uploadedFiles['kk'],
            'no_kk' => $request->no_kk,
            'nik_siswa' => $request->nik_siswa,
            'nik_ayah' => $request->nik_ayah,
            'nik_ibu' => $request->nik_ibu,
        ];

        // dd($the_data);

        if ($request->file('sertifikat')) {
            $the_data['sertifikat'] = $uploadedFiles['sertifikat'];
        }

        // Create a record in the database with the file paths
        RegistrasiUlang::create($the_data);

        // Redirect with a success message
        return redirect('/siswa/pengumuman/' . $siswa->user_id)
            ->with(['siswa' => $siswa,
                'agen' => $agen,
                'success' => 'Files uploaded successfully.',
                'config' => $config]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistrasiUlang  $registrasiUlang
     * @return \Illuminate\Http\Response
     */
    public function show(RegistrasiUlang $registrasiUlang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistrasiUlang  $registrasiUlang
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistrasiUlang $registrasiUlang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistrasiUlang  $registrasiUlang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistrasiUlang $registrasiUlang)
    {
        $check_data = RegistrasiUlang::find('user_id', Auth::user()->id);
        if ($check_data) {
            return abort(403, 'Unauthorized');
        }
        $validatedData = $request->validate([
            'ijazah' => 'mimes:pdf',
            'surat_pernyataan_bermaterai' => 'mimes:pdf',
            'surat_keterangan_siswa_aktif_sd_asal' => 'mimes:pdf',
            'pasfoto' => 'mimes:pdf',
            'akta_kelahiran' => 'mimes:pdf',
            'kk' => 'mimes:pdf',
            "no_kk" => 'required',
            "nik_siswa" => 'required',
            "nik_ayah" => 'required',
            "nik_ibu" => 'required',
        ]);

        if ($request->file('ijazah')) {
            if ($request->old_ijazah) {
                Storage::delete($request->old_ijazah);
            }
            $validatedData['ijazah'] = $request->file('ijazah')->store('/public/registrasi_ulang/ijazah');
        }

        if ($request->file('surat_pernyataan_bermaterai')) {
            if ($request->old_surat_pernyataan) {
                Storage::delete($request->old_surat_pernyataan);
            }
            $validatedData['surat_pernyataan_bermaterai'] = $request->file('surat_pernyataan_bermaterai')->store('/public/registrasi_ulang/surat_pernyataan_bermaterai');
        }

        if ($request->file('surat_keterangan_siswa_aktif_sd_asal')) {
            if ($request->old_surat_keterangan_swswa_aktif) {
                Storage::delete($request->old_surat_keterangan_swswa_aktif);
            }
            $validatedData['surat_keterangan_siswa_aktif_sd_asal'] = $request->file('surat_keterangan_siswa_aktif_sd_asal')->store('/public/registrasi_ulang/surat_keterangan_siswa_aktif_sd_asal');
        }

        if ($request->file('pasfoto')) {
            if ($request->old_pas_foto) {
                Storage::delete($request->old_pas_foto);
            }
            $validatedData['pasfoto'] = $request->file('pasfoto')->store('/public/registrasi_ulang/pasfoto');
        }

        if ($request->file('akta_kelahiran')) {
            if ($request->old_akta_kelahiran) {
                Storage::delete($request->old_akta_kelahiran);
            }
            $validatedData['akta_kelahiran'] = $request->file('akta_kelahiran')->store('/public/registrasi_ulang/akta_kelahiran');
        }

        if ($request->file('kk')) {
            if ($request->old_kk) {
                Storage::delete($request->old_kk);
            }
            $validatedData['kk'] = $request->file('kk')->store('/public/registrasi_ulang/kk');
        }
        $id = $request->id_registrasi_ulang;
        $registrasiUlang = RegistrasiUlang::find($id);
        $registrasiUlang->update($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistrasiUlang  $registrasiUlang
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistrasiUlang $registrasiUlang)
    {
        //
    }
}
