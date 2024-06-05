<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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
            'amount' => $request->amount * 100, // Amount in paise.
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
        dd($subscriptions);
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
        $paymentId = 'pay_OIbizD6og4Co4T';

        $payment = $api->payment->fetch('pay_OIbizD6og4Co4T');

        //for refund payment from payment Id se in this 
        $refund = $api->refund->create([
            'payment_id' => 'pay_OIbizD6og4Co4T',
            'amount' => 1 * 100,
            'speed' => 'normal',
            'reason' => 'Customer requested refund',
        ]);
        dd($refund);
        //here for return the page path where the redirect after cancel payment
    }

    //create customer on Razorpay for subscrp functionality

    public function createCustomer()
    {
        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $api = new Api($keyId, $keySecret);
        $customer = $api->customer->create([
            'name' => "ashish verma",
            'email' => "sashish@gmail.com",
            'contact' => "9896595913"
        ]);
        return response()->json($customer);
    }


    //get the customer of razorpay from email 

    public function getCustomer($email = "ashish@gmail.com")
    {
        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $api = new Api($keyId, $keySecret);
        while (true) {
            $customers = $api->customer->all();
            foreach ($customers['items'] as $customer) {
                if ($customer['email'] === $email) {
                    return $customer->toArray();
                }
            }
        }
        return null;
    }

    //for create the subscrip on razorpay with plainId and customerId in argumnets

    public function createSubscription($customerId="cust_OJ1bFOY0wSH9Wt", $planId="plan_NxFrdnt89VQJB3", $quantity = 1)
    {
        $keyId = env('RAZORPAY_KEY_ID');
        $keySecret = env('RAZORPAY_KEY_SECRET');
        $api = new Api($keyId, $keySecret);
        $subscription = $api->subscription->create([
            'plan_id' => $planId,
            'customer_notify' => 1,
            'total_count' => 12,
            'quantity' => $quantity,
            'customer_id' => $customerId
        ]);
        return $subscription->toArray();
    }
}
