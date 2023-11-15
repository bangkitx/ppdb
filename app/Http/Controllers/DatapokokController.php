<?php

namespace App\Http\Controllers;

use App\Models\Datapokok;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Policy;
// use App\Models\Datapokok;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class DatapokokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('midtrans');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $payment = Payment::create([
            'id_user'=>1,
            'amount' => 10000,
        ]);
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $payment->id,
                'gross_amount' => $payment->amount,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout',compact('snapToken','payment'));
    }

    public function callback(Request $request){
        
        // $serverKey = config('midtrans.server_key');
        // $hashed = hash("sha512",$request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        // if ($hashed == $request->signature_key){
        //     $payment = Payment::find($request->order_id);
        //     $payment->update(['status'=>'paid']);
        // }   

        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
        // For credit card transaction, we need to check whether transaction is challenge by FDS or not
        if ($type == 'credit_card'){
            if($fraud == 'deny'){
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                echo "Transaction order_id: " . $order_id ." is denied by FDS";
            }
            else {
                    // TODO set payment status in merchant's database to 'Success'
                    $payment = Payment::find($request->order_id);
                    $payment->update(['status'=>'paid']);
                    echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                }
            }
        }
        else if ($transaction == 'settlement'){
        // TODO set payment status in merchant's database to 'Settlement'
            $payment = Payment::find($request->order_id);
            $payment->update(['status'=>'paid']);
            echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
        }
        else if($transaction == 'pending'){
            // TODO set payment status in merchant's database to 'Pending'
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        }
        else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        }
        else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        }
        else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request()->has('avatar')){
            $avataruploaded = request()->file('avatar');
            $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            $avataruploaded->move($avatarpath, $avatarname);
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'avatar' => '/images/' . $avatarname,
            ]);
            
        } else {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
        // return $request;
        $request->validate([
            'email' => 'required|unique:datapokok',
            'upload_file' => 'required',
            'nama_lengkap' => 'required',
            'nisn' => 'required|unique:datapokok',
            'jenis_kelamin' => 'required',
            'tempat_lahir'=> 'required',
            'tanggal_lahir' => 'required',
            'agama'=> 'required',
            'asal_sekolah' => 'required' ,
            'alamat_sekolah' => 'required',
            'jumlah_hafalan' => 'required',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'pendidikan_terakir_ayah' => 'required',
            'no_wa_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'pendidikan_terakir_ibu' => 'required',
            'no_wa_ibu' => 'required',
            'motivasi' => 'required',
            'nama_sekolahnya_jika_daftar' => 'required',
            'informasi_didapatkan_dari' => 'required',
            'perjanjian1' => 'required',
            'perjanjian2' => 'required',
            'perjanjian3' =>'required',
            'perjanjian4' => 'required'
        ]);

        $raw_data_policy = [
            'perjanjian1' => $request->perjanjian1,
            'perjanjian2' => $request->perjanjian2,
            'perjanjian3' => $request->perjanjian3,
            'perjanjian4' => $request->perjanjian4
        ];

        
        $policy = Policy::create($raw_data_policy);

        $raw_request_data_pokok = [
            'user_id' => Auth::id(),
            'policy_id' => $policy->id,
            'email' => $request->email,
            'upload_file' => $request->upload_file,
            'nama_lengkap' => $request->nama_lengkap,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir'=> $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama'=> $request->agama,
            'asal_sekolah' => $request->asal_sekolah ,
            'alamat_sekolah' => $request->alamat_sekolah,
            'jumlah_hafalan' => $request->jumlah_hafalan,
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
            'motivasi' => $request->motivasi,
            'nama_sekolahnya_jika_daftar' => $request->nama_sekolahnya_jika_daftar,
            'informasi_didapatkan_dari' => $request->informasi_didapatkan_dari
        ];

        Datapokok::create($raw_request_data_pokok);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datapokok  $datapokok
     * @return \Illuminate\Http\Response
     */
    public function show(Datapokok $datapokok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datapokok  $datapokok
     * @return \Illuminate\Http\Response
     */
    public function edit(Datapokok $datapokok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datapokok  $datapokok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datapokok $datapokok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datapokok  $datapokok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datapokok $datapokok)
    {
        //
    }
}
