<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('paynamics_ccess')) {
    
    function paynamics_ccess($postdata){
        
        
        
        
        
        
        
        
        $payload = $name =$postdata['fname'] . $lname =  $postdata['lname'] . $mname = $postdata['mname'] . $email = $postdata['email']  . $phone = $postdata['phone'] .$mobile = $postdata['mobile']  . $dob = $postdata['dob']  . $mky = "C7653EB6BA151443BDB34A6D88FDE295";
        $payload1 =  hash('sha512', $payload);
        $transactionsignature =
        "000000021121967CAFBD" .
        $postdata['request_id'].
        "https://devapi.lucky8star.com/pynmics/paynamicsupdate" .
        "https://devapi.lucky8star.com/pynmics/paynamicssuccess" .
        "https://devapi.lucky8star.com/pynmics/paynamicscancel" .
        $postdata['pmethod'] .
        $postdata['payment_action'] .
        $postdata['collection_method'] .
        $postdata['amount'] .
        "PHP" .
        "1" .
        "1" .
        "C7653EB6BA151443BDB34A6D88FDE295";
        $signaturetrans = hash('sha512', $transactionsignature);
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://payin.payserv.net/paygate/transactions/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
    "transaction": {
        "request_id":"' . $postdata['request_id'] . '",
        "notification_url": "https://devapi.lucky8star.com/pynmics/paynamicsupdate",
        "response_url": "https://devapi.lucky8star.com/pynmics/paynamicssuccess",
        "cancel_url":"https://devapi.lucky8star.com/pynmics/paynamicscancel",
        "pmethod":"' . $postdata['pmethod'] . '",
        "pchannel": "br_bdo_ph",
      "payment_action":"' . $postdata['payment_action'] . '",
        "collection_method": "' . $postdata['collection_method'] . '",
        "payment_notification_status": "1",
        "payment_notification_channel": "1",
        "amount": "' . $postdata['amount'] . '",
        "currency": "PHP",
        "signature": "' . $signaturetrans . '"
    },
    "customer_info": {
            "fname": "' . $postdata['fname'] . '",
            "lname":  "' . $postdata['lname'] . '",
        "mname": "' . $postdata['mname'] . '",
        "email": "' . $postdata['email'] . '",
        "phone": "' . $postdata['phone'] . '",
        "mobile":  "' . $postdata['mobile'] . '",
        "dob": "' . $postdata['dob'] . '",
        "signature": "' . $payload1. '"
    },
     "orders": [
            {
                "itemname": "POINTS",
                "quantity": 1,
                "unitprice": "0.00",
                "totalprice": "0.00"
            }
        ],
        "subtotalprice": ".00",
        "shippingprice": "0.00",
        "discountamount": "0.00",
            "totalorderamount": "1.00"
        }
            
    ',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic bHVja3k4NXBBNzpONWY5RDNFVWFjRWQ=',
                'Content-Type: application/json'
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        
        
        return $response;
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }}