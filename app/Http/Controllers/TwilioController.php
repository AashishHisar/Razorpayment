<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;


class TwilioController extends Controller
{


    public function sendOtp()
    {
        $otp = mt_rand(100000, 999999);

        // Twilio credentials
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = "+919896595913";

        // Initialize Twilio client
        $twilio = new Client($sid, $token);
        // Send OTP
        $message = $twilio->messages->create(
            $twilioPhoneNumber,
            [
                'from' => "+17865746013",
                'body' => "Your OTP is: $otp",
            ]
        );
        //send otp response from Twilio
        return response()->json(['otp_sent' => true], 200);
    }
    
    // function for otp verify which are store in database Otp tables
    // OTP Model is used for verify the exist otp in db

    public function verifyOtp()
    {
        //create the logic here for verify 
        //$otp=OTP::where('phone_number',$request->phone_number)->first();
        //if($otp->otp === $request->otp){

        // }
    }
}
