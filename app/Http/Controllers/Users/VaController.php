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
}
