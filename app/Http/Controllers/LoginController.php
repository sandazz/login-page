<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function sendMessage(Request $request){

        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $mobile = $request->mobile;

        $mobile = "94$mobile";
        $sms = "Hi $name, we received your data";

        $basic  = new \Vonage\Client\Credentials\Basic("3f3eef1f", "NhjHimIHS53m5ZRI");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS( $mobile, "sandas", $sms)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }

    }

    public function index(){
        return view('index');
    }
}
