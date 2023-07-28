<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('paynamics_ccess')) {
    
    function paynamics_ccess($postdata){
        
        //         "key": "10JxwqO1IMCEP0jb",
        //         "apiname": "paynamics01live",
        //         "userpassword": "BPQXVdrJBFNUSXYWf"
        
                $usname  ="lucky85pA7"; ///dev
                $pass   ="N5f9D3EUacEd";///dev
        
//         $usname  ="idean8QP";//prod
//         $pass   ="KaDnkeuJ7b9y";//prod
        
        
        $base64=base64_encode($usname.":".$pass);
        $payload = $name =$postdata['fname'] . $lname =  $postdata['lname'] . $mname = $postdata['mname'] . $email = $postdata['email']  . $phone = $postdata['phone'] .$mobile = $postdata['mobile']  . $dob = $postdata['dob']  . $mky = "CC373BB17EECA12BB91AD7BEF5ADB7B2";
        $payload1 =  hash('sha512', $payload);
        
        $pback="https://webpay.lucky8star.com/pay/paynmanpostback";
        $datasuccess="https://webpay.lucky8star.com/paynamicschannels/returl?id=".$postdata['request_id'];
        
        $datacasncel=  "https://webpay.lucky8star.com/pay/paynamic_cancel/".$postdata['request_id'];
        $transactionsignature =
        "000000070222D97EF459" .
        $postdata['request_id'].
        $pback.
        $datasuccess .
        $datacasncel.
        $postdata['pmethod'] .
        $postdata['payment_action'] .
        $postdata['collection_method'] .
        $postdata['amount'] .
        "PHP" .
        "1" .
        "1" .
        "CC373BB17EECA12BB91AD7BEF5ADB7B2";
        
        
        $signaturetrans = hash('sha512', $transactionsignature);
        
        $pdata = [
            "transaction" => [
                "request_id" =>  $postdata['request_id'] ,
                "notification_url" =>$pback,
                "response_url" => $datasuccess,
                "cancel_url" => $datacasncel,
                "pmethod" =>  $postdata['pmethod'] ,
                "pchannel" => $postdata['pchannel'] ,
                "payment_action" =>  $postdata['payment_action'],
                "collection_method" =>  $postdata['collection_method'] ,
                "payment_notification_status" => "1",
                "payment_notification_channel" => "1",
                "amount" => $postdata['amount'] ,
                "currency" => "PHP",
                "signature" =>  $signaturetrans  ],
            "customer_info" => [
                "fname" =>  $postdata['fname'],
                "lname" => $postdata['lname'] ,
                "mname" => $postdata['mname'],
                "email" =>  $postdata['email'],
                "phone" =>$postdata['phone'] ,
                "mobile" =>  $postdata['mobile'],
                "dob" => $postdata['dob'],
                "signature" =>  $payload1
            ],
            "order_details"=> [
                "orders" => [
                    [
                        "itemname" => "POINTS",
                        "quantity" => 1,
                        "unitprice" => $postdata['amount'] ,
                        "totalprice" => $postdata['amount']
                    ]
                ],
                "subtotalprice" => ".00",
                "shippingprice" => "0.00",
                "discountamount" => "0.00",
                "totalorderamount" => $postdata['amount']
            ],
            "custom_merchant_params" =>
            [
                [
                    "system_id" => "ILITS",
                    "field" => "unitprice",
                    "label" => "unitprice",
                    "value" =>  $postdata['origamount']
                    
                ],
                [
                    "system_id" => "ILITS",
                    "field" => "servicecharge",
                    "label" => "servicecharge",
                    "value" => $postdata['charge']
                ],
                [
                    "system_id" => "ILITS",
                    "field" => "totalorderamount",
                    "label" => "totalorderamount",
                    "value" =>  $postdata['amount']
                    
                ]
            ],
            
            
        ];
        $jdata=json_encode($pdata);
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            
//             CURLOPT_URL => 'https://payin.paynamics.net/paygate/transactions/',
                        CURLOPT_URL => 'https://payin.payserv.net/paygate/transactions/',
            
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            
            
            CURLOPT_POSTFIELDS =>$jdata,
            
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic '.$base64,
                'Content-Type: application/json'
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        $decode = json_decode($response, true);
        $updata = array(
            'postdata' => $jdata,
            'decode' => $decode
        );
        
       var_dump($updata);
        
        
        
        
        
    }
    
    
    
}