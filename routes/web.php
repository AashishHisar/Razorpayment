<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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

Route::get('/showpayment',[TestController::class,'showPayment'])->name('payment.show');
Route::post('/process/payment',[TestController::class,'processPayment'])->name('payment.process');
Route::get('/cancel/payment',[TestController::class,'cancelPayment'])->name('cancel.payment');

