<?php 





defined('BASEPATH') OR exit('No direct script access allowed');



if ( ! function_exists('FPcashout'))
{
    function FPcashout($postdata)/////
    {
        //         $dta['customer_number']='9265901105';contactNumber
        
        $phone= substr($postdata['contactNumber'], -10);
        $dta['customer_number']=$phone;
        $dta['amount']=$postdata['amount'];
        $dta['external_username']=$postdata['username'];
        $dta['external_site']=$postdata['siteName'];
        $dta['external_ref_code']=$postdata['refNumber'];   
        $jdata=json_encode($dta);

        $curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://devintegration-v2.fortunepay.com.ph/api/lucky8/v1/cashout/process',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>$jdata,
    CURLOPT_HTTPHEADER => array(
        'client-id: e97a346b101434d06ec4924e016b5835fc8c63c4',
        'client-secret: 959680a5059e3d6af85a799f010fede0',
        ': ',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);



return $response;

    

    }   

}
// client-id: e97a346b101434d06ec4924e016b5835fc8c63c4
// clint-secret: 4792ab6858eb73626c4f5d4b618953a2
// client-signature-key: 8bdc4a79b0c9d4b7810d47a389109ec0bfe15848

if ( ! function_exists('FPBalance'))
{
    function FPBalance()/////
    {
        

        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://devintegration-v2.fortunepay.com.ph/api/lucky8/v1/cashout/balance',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
//             CURLOPT_POSTFIELDS =>$jdata,
            CURLOPT_HTTPHEADER => array(
                'client-id: e97a346b101434d06ec4924e016b5835fc8c63c4',
                'client-secret: 4792ab6858eb73626c4f5d4b618953a2',
                ': ',
                'Content-Type: application/json'
//             CURLOPT_HTTPHEADER => array(
//                 'client-id: e97a346b101434d06ec4924e016b5835fc8c63c4',
//                 'client-secret: 959680a5059e3d6af85a799f010fede0',
//                 ': ',
//                 'Content-Type: application/json'
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        
        
        return $response;
        
        
        
    }
    
}


if ( ! function_exists('FPchkuser'))
{
    function FPchkuser($pnumber)/////
    {
        
        
        
        $phone= substr($pnumber['contactNumber'], -10);
        $dta['customer_number']=$phone;
     
        $jdata=json_encode($dta);
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://devintegration-v2.fortunepay.com.ph/api/lucky8/v1/cashout/checkuser',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_POSTFIELDS =>$jdata,
            CURLOPT_HTTPHEADER => array(
                'client-id: e97a346b101434d06ec4924e016b5835fc8c63c4',
                'client-secret: 959680a5059e3d6af85a799f010fede0',
                ': ',
                'Content-Type: application/json'
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        
        
        
        return $response;
        
        
        
    }
    
}
