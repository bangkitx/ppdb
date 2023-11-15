<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    public function check_nilai(Nilai $nilai)
    {
        $nilai_akademis = [];
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'akademik' => 'required',
            'test_membaca_al_quran' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        DB::transaction(function () use ($validatedData) {
            $nilai = Nilai::create($validatedData);
            $nilai->update(['status' => $this->check_nilai($nilai)]);
        });

        return redirect()->back()->with('success', 'Nilai berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        if (!$nilai) {
            return redirect()->back()->with('error', 'Nilai tidak ditemukan.');
        }

        $validatedData = $request->validate([
            'akademik' => 'required',
            'test_membaca_al_quran' => 'required',
        ]);

        $nilai->update($validatedData);

        return redirect()->back()->with('success', 'Nilai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
