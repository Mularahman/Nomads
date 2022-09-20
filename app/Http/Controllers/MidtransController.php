<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suport\Facedes\Mail;
use App\Transaction;
use App\Mail\TransactionSuccess;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $notification = new Notification();

        $order = explode('-', $notification->order_id);

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $order[1];

        $transaction = Transaction::findOrFail($order_id);

        if($status == 'capture'){
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->transaction_status = 'CHALLENGE';
                } else {
                     $transaction->transaction_status = 'SUCCESS';
                }
            }
        }
        elseif($status == 'senttlement'){
            $transaction->transaction_status = 'SUCCESS';
        }
        elseif($status == 'pending'){
            $transaction->transaction_status = 'PENDING';
        }
        elseif($status == 'deny'){
            $transaction->transaction_status = 'FAILED';
        }
        elseif($status == 'expaire'){
            $transaction->transaction_status = 'EXPAIRED';
        }
        elseif($status == 'cancel'){
            $transaction->transaction_status = 'FAILED';
        }

        $transaction->save();

        if($transaction) 
        {
            if($status == 'capture' && $fraud == 'accept') {
                Mail::to($transaction->user)->send(
                    new TransactionSuccess($transaction)
                );
            }
        }
        elseif($transaction) 
        {
            if($status == 'settlement') {
                Mail::to($transaction->user)->send(
                    new TransactionSuccess($transaction)
                );
            }
        }
        elseif($transaction) 
        {
            if($status == 'success') {
                Mail::to($transaction->user)->send(
                    new TransactionSuccess($transaction)
                );
            }
        }
        elseif($transaction) 
        {
            if($status == 'capture' && $fraud == 'challange') 
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans payment challange'
                    ]
                    ]);
            }
            else {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans payment not senttlement'
                    ]
                    ]);
            }
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans payment success'
                ]
                ]);
        }
    }
    public function finishedRedirect(Request $request)
    {
        return view('pages.success');

    }
    public function unfinishedRedirect(Request $request)
    {
        return view('pages.unfinish');

    }
    public function errorRedirect(Request $request)
    {
        return view('pages.failed');

    }
}
