<?php

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

//Aashish
//for Twilio api or route
//also set the request method according to need

Route::get('/send/otp',[TwilioController::class,'sendOtp'])->name('send.otp');

