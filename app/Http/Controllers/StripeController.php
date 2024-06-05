<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index(){
        return view('stripeShowPayment');
    }


    public function createPayment(Request $request){
        dd($request->all());
    }
}
