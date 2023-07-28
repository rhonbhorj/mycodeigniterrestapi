<?php
defined('BASEPATH') OR exit('No direct script access allowed');



if ( ! function_exists('squidcashout'))
{
    
    function squidcashout($datapost)/////
    {
//         $mobile = $datapost['contactNumber'];


        
        
        $amount=$datapost['amount']; 
        $pmref=$datapost['refNumber']; 
        $token="1234567890987654321";
//          $str = "09565274131";
//          $str = "09331581041";
         $str = "09457192433";
//          $secret = "9ab3007ad51d72a747e11a48f675c256159bb959";
         $sha = sha1($str . $amount . $token);
        
        // Sha1(11-digit mobile + amount +
        // token);
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://squidapp.site/api/pitmasters/cashout/pit_cashout_sandbox.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'amount' => $amount,
                'token' => $token,
                'sptuserid' => $str ,
                'secret' => $sha,
                'pmref' => $pmref
                                       ),
        ));
        
        $response = curl_exec($curl);
//         return  $response;
       curl_close($curl);

        
         $e = base64_decode($response);
//         $jso =  json_encode($e);
        
        
         return   $response ;
// //         var_dump($jso);
//      $try = json_decode($jso);

        
  
       
        
    }}
    
    
    if ( ! function_exists('squidchkblance'))
    {
        
        function squidchkblance()/////
        {
//             $mobile = $datapost['contactNumber'];
//             $amount=$datapost['amount'];
//             $pmref=$datapost['refNumber'];
            $token="1234567890987654321";
            $str = "09565274131";
//             $str = "09331581041";
            //          $secret = "9ab3007ad51d72a747e11a48f675c256159bb959";
            $sha = sha1($str.$token);
            
            // Sha1(11-digit mobile + amount +
            // token);
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://squidapp.site/api/pitmasters/balance/spt_balance_sandbox.php',
                CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                   
                    'secret' =>$sha,
                    'token'=>"1234567890987654321"
                 
              
                ),
            ));
            
            $response = curl_exec($curl);
      
            curl_close($curl);
            
            
            $e = base64_decode($response);

            
            
//             return   $e ;
         
            
            //var_dump($reply);
            if ($e = curl_error($ch)) {
              
                return $e;
            } else {
                
//                 $decode = json_decode($reply, true);
                
                return $e;
                
            }
            
            
            
            
        }}
        
         
        
        
        if ( ! function_exists('squidchkuser'))
        {
            
            function squidchkuser()/////
            {
   
                $token="1234567890987654321";
//                 $str = "09565274131";
                $str = "09457192433";
                $secret = sha1($str. $token);
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://squidapp.site/api/pitmasters/search/xpay_customer_search_sandbox.php',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(          
                        'secret' =>$secret,
                        'token'=>"1234567890987654321",
                        'xpay_mobile'=>$str     
                    ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
                
                
                $e = base64_decode($response);
                
                
                
                return   $e ;
                
                
                
                
                
                
            }}
            
        
    
    
    
    