<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    protected $midtrans_merchant_id;
    protected $midtrans_client_key;
    protected $midtrans_server_key;
    protected $unique_id_payment;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $config_for_payment = Config::where('id', 1)->first();
        $this->midtrans_merchant_id = $config_for_payment->midtrans_merchant_id;
        $this->midtrans_client_key = $config_for_payment->midtrans_client_key;
        $this->midtrans_server_key = $config_for_payment->midtrans_server_key;
        $this->unique_id_payment = $config_for_payment->order_id_midtrans;
    }

    public function bayar()
    {
        $id = Auth::user()->id;

        $handle_payment = Payment::where('user_id', $id)->first();

        if (!empty($handle_payment)) {
            $payment = Payment::where('user_id', $id)
                ->where('status_payment', 2)
                ->where('status', 2)
                ->first();

            if ($payment) {
                return abort(403, 'Unauthorized');
            }
        }

        $snapToken = '';

        if ($handle_payment->status_payment !== 2 && $handle_payment->status !== 2) {
            // Configure Midtrans
            \Midtrans\Config::$serverKey = $this->midtrans_server_key;
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            // Obtain the snapToken
            $snapToken = $handle_payment->snapToken;
            // Your code here to use the $snapToken
        }
        $config = Config::where('id', 1)->first();

        $amount = $config->nominal_pembayaran;
        $nominal = $this->terbilang($amount);

        return view('siswa.bayar', compact('snapToken'))->with(['config' => $config, 'nominal' => $nominal]);
    }

    public function index()
    {
        $id = Auth::user()->id;
        $payment = Payment::where('user_id', $id)
            ->where('status_payment', 2)
            ->where('status', 2)
            ->first();

        if ($payment) {
            return abort(404, 'Not Found');
        }

        return view('midtrans');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $id = Auth::user()->id;
        // $payment = Payment::where('id_user',3)
        //                     ->where('status_payment',2)
        //                     ->where('status',2)
        //                     ->first();

        // dd($payment);
        // if($payment){
        //     echo "Ada";
        // }else{
        //     echo "Tidak";
        // }
    }

    public function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];
        $temp = '';

        if ($nilai < 12) {
            $temp = ' ' . $huruf[$nilai];
        } elseif ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . ' belas';
        } elseif ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . ' puluh' . $this->penyebut($nilai % 10);
        } elseif ($nilai < 200) {
            $temp = ' seratus' . $this->penyebut($nilai - 100);
        } elseif ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . ' ratus' . $this->penyebut($nilai % 100);
        } elseif ($nilai < 2000) {
            $temp = ' seribu' . $this->penyebut($nilai - 1000);
        } elseif ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . ' ribu' . $this->penyebut($nilai % 1000);
        } elseif ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . ' juta' . $this->penyebut($nilai % 1000000);
        } elseif ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . ' milyar' . $this->penyebut(fmod($nilai, 1000000000));
        } elseif ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . ' trilyun' . $this->penyebut(fmod($nilai, 1000000000000));
        }

        return $temp;
    }

    public function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = 'minus ' . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $payment = Payment::where('user_id', $id)
            ->where('status_payment', 2)
            ->where('status', 2)
            ->first();

        if ($payment) {
            return abort(404, 'Not Found');
        }

        \Midtrans\Config::$serverKey = $this->midtrans_server_key;
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $config = Config::where('id', 1)->first();

        $amount = $config->nominal_pembayaran;
        $nominal = $this->terbilang($amount);

        // $user_detail =


        $payment = Payment::create([
            'user_id' => Auth::user()->id,
            'amount' => $amount,
        ]);

        $order_id = $this->unique_id_payment + $payment->id;

        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'email' => Auth::user()->email,
            ],
        ];

        $payment_user = Payment::find($payment->id);

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $payment_user->update([
                'snapToken' => $snapToken,
            ]);
            return view('siswa.bayar', compact('snapToken'))->with(['config' => $config, 'nominal' => $nominal]);
        } catch (\Exception $e) {
            Payment::destroy($payment->id);
            return redirect("/login")->with('flash_message_danger', "Pembayaran bermasalah, silahkan hubungi admin.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    public function notification()
    {
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$serverKey = $this->midtrans_server_key;
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        $payment = Payment::find($order_id - $this->unique_id_payment);

        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'accept') {
                    // TODO set payment status in merchant's database to 'Success'
                    $payment->update([
                        'status_payment' => 2,
                        'status' => 2,
                    ]);
                    echo 'Transaction order_id: ' . $order_id . ' successfully captured using ' . $type;
                } else {
                    $payment->update([
                        'status_payment' => -1,
                        'status' => -1,
                    ]);
                }
            }
        } elseif ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $payment->update([
                'status_payment' => 2,
                'status' => 2,
            ]);
            echo 'Transaction order_id: ' . $order_id . ' successfully transfered using ' . $type;
        } elseif ($transaction == 'pending') {
            $payment->update([
                'status_payment' => 1,
                'status' => 1,
            ]);
            echo 'Waiting customer to finish transaction order_id: ' . $order_id . ' using ' . $type;
        } elseif ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $payment->update([
                'status_payment' => -1,
                'status' => -1,
            ]);
            echo 'Payment using ' . $type . ' for transaction order_id: ' . $order_id . ' is denied.';
        } elseif ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $payment->update([
                'status_payment' => -2,
                'status' => -1,
            ]);
            echo 'Payment using ' . $type . ' for transaction order_id: ' . $order_id . ' is expired.';
        } elseif ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $payment->update([
                'status_payment' => -3,
                'status' => -1,
            ]);
            echo 'Payment using ' . $type . ' for transaction order_id: ' . $order_id . ' is canceled.';
        }
    }
}
