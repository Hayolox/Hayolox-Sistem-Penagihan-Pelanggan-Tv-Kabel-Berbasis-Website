<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\succes;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;

class VaController extends Controller
{
    public function va($id)
    {
        $confirm = Bill::findOrfail($id);

        succes::create([
             'user_id' => $confirm->user_id,
             'month_id' => $confirm->month_id,
             'year_id' => $confirm->year_id,
             'status' => 'Bayar VA',
        ]);

        Bill::where('id', $confirm->id)->delete();

       // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => (int) $confirm->user->tagihan,
            ),
            'customer_details' => [
                "first_name" =>$confirm->user->name,
                "phone" => $confirm->user->no_hp,
                'email' => $confirm->user->email,
                'address' => $confirm->user->alamat,
            ],
            'enabled_payments' => [
                "bri_va", "other_va", "gopay", "indomaret",
            ],
            'vtweb' => []
        );
        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($params)->redirect_url;

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
          }
          catch (Exception $e) {
            echo $e->getMessage();
          }


    }

    public function callback(Request $request)
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari transaksi berdasarkan ID
        $transaction = succes::findOrFail($order_id);

        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';
                }
                else {
                    $transaction->status = 'SUCCESS';
                }
            }
        }
        else if ($status == 'settlement'){
            $transaction->status = 'SUCCESS';
        }
        else if($status == 'pending'){
            $transaction->status = 'PENDING';
        }
        else if ($status == 'deny') {
            $transaction->status = 'CANCELLED';
        }
        else if ($status == 'expire') {
            $transaction->status = 'CANCELLED';
        }
        else if ($status == 'cancel') {
            $transaction->status = 'CANCELLED';
        }

        // Simpan transaksi
        $transaction->save();

        // Kirimkan email
        if ($transaction)
        {
            if($status == 'capture' && $fraud == 'accept' )
            {
                //
            }
            else if ($status == 'settlement')
            {
                //
            }
            else if ($status == 'success')
            {
                //
            }
            else if($status == 'capture' && $fraud == 'challenge' )
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            }
            else
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment not Settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Notification Success'
                ]
            ]);
        }
    }
}
