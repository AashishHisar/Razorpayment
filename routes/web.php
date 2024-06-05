<?php

use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TwilioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Aashish
//for Razorpay api or route 
//also set the request method according to need

Route::get('/showpayment',[TestController::class,'showPayment'])->name('payment.show');
Route::post('/process/payment',[TestController::class,'processPayment'])->name('payment.process');
Route::get('/cancel/payment',[TestController::class,'cancelPayment'])->name('cancel.payment');
//get the customer of razorpay from email
Route::get('get/customer',[TestController::class,'getCustomer'])->name('get.customer'); 
//for create customer on razorpay
Route::get('/create/customer',[TestController::class,'createCustomer'])->name('create.customer');
//create the subscription on razorpay pass plainId and customerId
Route::get('/create/subscription',[TestController::class,'createSubscription'])->name('create.subcroption');

//for show all subscrip list 

Route::get('/plans/list',[TestController::class,'listSubscriptions'])->name('plans.list');

// Routes for stripe 

Route::get("/stripe/show-payment",[StripeController::class,'index'])->name('stripe.show');
Route::post("/stripe/create-payment",[StripeController::class,'createPayment'])->name('stripe.payment.create');



//Aashish
//for Twilio api or route
//also set the request method according to need

Route::get('/send/otp',[TwilioController::class,'sendOtp'])->name('send.otp');

