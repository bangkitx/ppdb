<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agen;
use App\Models\Payment;
use App\Models\Config;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agen = Agen::find(auth()->user()->id);
        $config = Config::where('id', 1)->first();
        $userData = auth()->user()->id;
        $payment = Payment::where('user_id', $userData)->first();

        return view('profile.index')->with(['agen' => $agen, 'config' => $config, 'payment' => $payment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return view('profile.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('profile.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agen = Agen::find(auth()->user()->id);
        $config = Config::where('id', 1)->first();
        $userData = auth()->user()->id;
        $payment = Payment::where('user_id', $userData)->first();

        return view('profile.edit')->with(['agen' => $agen, 'config' => $config, 'payment' => $payment]);
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
        $agen = Agen::find(auth()->user()->id);
        $config = Config::find(1);

        // Check if new password is provided
        if (!empty($request->new_password)) {

            $valipass = $request->password;
            $pass_baru = $request->new_password;

            if (empty($valipass)) {
                return redirect('profile')->with(['flash_message_error' => 'Profil gagal diperbarui karena tidak ada password lama!', 'config' => $config]);
            }

            // Check if old password matches
            if (!Hash::check($valipass, $agen->password)) {
                return redirect('profile')->with(['flash_message_error' => 'Profil gagal diperbarui karena password lama salah!', 'config' => $config]);
            }

            // Check if old and new passwords are the same
            if ($valipass === $pass_baru) {
                return redirect('profile')->with('flash_message_error', 'Profil gagal diperbarui karena password lama dan baru sama!');
            }

            // Update password
            $agen->password = Hash::make($pass_baru);
        }

        if (!empty($request->password) && empty($request->new_password)) {
            return redirect('profile')->with(['flash_message_error' => 'Profil gagal diperbarui karena tidak ada password baru!', 'config' => $config]);
        }

        // Check for other fields (email, name, avatar)
        if ($request->has('email')) {
            $agen->email = $request->email;
        }

        if ($request->has('name')) {
            $agen->name = $request->name;
        }

        if ($request->has('avatar')) {
            $avataruploaded = request()->file('avatar');
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            $avataruploaded->move($avatarpath, $avatarname);
            $agen->avatar = '/images/' . $avatarname;
        }

        $agen->save();

        return redirect('profile')->with('flash_message', 'Profil berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return view('profile.destroy');
    }
}
