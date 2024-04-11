<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class TestController extends Controller
{

    public function showPayment()
    {
        return view('welcome');
    }

    //for handle payment one time in this
    public function processPayment(Request $request)
    {
        //use aashish here key of razorpay 
        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $api = new Api($keyId, $keySecret);

        // Create a new Order
        $order = $api->order->create([
            'amount' => $request->amount * 100, // Amount in paise
            'currency' => 'INR', // Currency code
            'receipt' => 'order_' . uniqid(),
            'payment_capture' => 1 // Auto capture
        ]);
        return view('paymentshow', ['order' => $order]);
    }

    //for handle the listing of subscription of razorpay 
    public function listSubscriptions()
    {
        // Initialize Razorpay API
        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $api = new Api($keyId, $keySecret);

        // Fetch list of subscriptions from Razorpay
        $subscriptions = $api->subscription->all();

        return view('subscription.list', ['subscriptions' => $subscriptions]);
    }
    //for cancel payment and refund form payment id send in this function 

    public function cancelPayment()
    {
        //use aashish here key of razorpay 
        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $api = new Api($keyId, $keySecret);
        //for cancel 
        $paymentId = 'pay_NxFKYLDUIzXoGz';

        $payment = $api->payment->fetch('pay_NxFKYLDUIzXoGz');

        //for refund payment from payment Id se in this 
        $refund = $api->refund->create([
            'payment_id' => 'pay_NxFai3DVOz7cAu',
            'amount' => 1 * 100,
            'speed' => 'normal',
            'reason' => 'Customer requested refund',
        ]);
        dd($refund);
    }
}
