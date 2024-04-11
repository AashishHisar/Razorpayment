<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;


class TwilioController extends Controller
{


    public function sendOtp()
    {
        $otp = mt_rand(1000, 9999);

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

        // Store the OTP in session or database for verification

        return response()->json(['otp_sent' => true], 200);
    }

}
