<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index(Request $request)
    {
        $body = $request->getContent();

        if(empty($body)){
            $body = "LOOK AT YOU";
        }
        $number = '255677044810';

        return sendSms($body,$number);  
    }
}
