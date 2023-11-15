<?php

namespace App\Http\Controllers;
use App\Models\Config;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index() {
        $config = Config::where('id', 1)->first();
        

        return view('config.index')->with('config', $config);
    }

    public function edit()
    {
        $config = Config::where('id', 1)->first();
        return view('config.edit')->with('config', $config);
    }

    public function update(Request $request)
    {
        $config = Config::where('id', 1)->first();
        

        // $request->nominal_pembayaran_terbilang;
        $input = $request->all();
        $config->update($input);
        return redirect('config')->with('flash_message', 'Config Updated!');
    }
}
