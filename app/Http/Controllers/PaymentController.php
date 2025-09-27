<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $merchant_id = "1221417";
        $merchant_secret = 'MTQyMTAxMDg1MzQyMTE0OTgxOTQ5NjAxMTUwMDQ0ODA4NDk1NDA=';
        $order_id = uniqid('ORD_');
        $amount = number_format($request->amount, 2, '.', '');
        $currency = 'LKR';

        $hash = strtoupper(
            md5(
                $merchant_id . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            )
        );
        

        return view('payhere_checkout', [
            'merchant_id' => $merchant_id,
            'return_url' => route('payhere.return'),
            'cancel_url' => route('payhere.cancel'),
            'notify_url' => route('payhere.notify'),
            'order_id' => $order_id,
            'items' => $request->items,
            'amount' => $amount,
            'currency' => $currency,
            'customer' => $request->customer,
            'hash' => $hash
        ]);
    }

    public function notify(Request $request)
{
    $merchant_id = $request->merchant_id;
    $order_id = $request->order_id;
    $amount = $request->payhere_amount;
    $currency = $request->payhere_currency;
    $status_code = $request->status_code;
    $md5sig = $request->md5sig;

    $local_md5sig = strtoupper(md5(
        $merchant_id .
        $order_id .
        $amount .
        $currency .
        $status_code .
        strtoupper(md5(env('PAYHERE_MERCHANT_SECRET')))
    ));

    if ($local_md5sig === $md5sig && $status_code == 2) {
        // Payment success - update DB here
    }

    return response('OK', 200);
}


}