<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index(Request $request)
    {
        $body = $request->getContent();

        if(empty($body)){
            $body = "UKATILI NA AIBU KUBWA KWA ULICHOKIFANYA MUNGU ANAKUONA";
        }
        $number = '255787686666';

        return sendSms($body,$number);
    }
}
