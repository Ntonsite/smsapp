<?php
use Illuminate\Support\Facades\Log;

if(!function_exists('sendSms')){
    function sendSms($body, $number): void
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://connect.routee.net/sms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "{ \"body\": \"$body\",\"to\" : \"$number\",\"from\": \"amdTelecom\"}",
            CURLOPT_HTTPHEADER => array(
                'authorization: Bearer 8eb8fbe9-b831-4f25-904d-9749902ef665',
                'content-type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        Log::info("----------Message sent Successfully to ".$number);
        curl_close($curl);
    }
}

