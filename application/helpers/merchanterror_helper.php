<?php
defined('BASEPATH') OR exit('No direct script access allowed');

        


if ( ! function_exists('wpcloadback'))
{
    
    function wpcloadback($hcshin)
    {
        
        
        $url = $hcshin['siteName']."/api/loading";
        
        switch($hcshin['siteName']){
//             case "https://wpc2028.live/1":
//                 $token = "7x6qkq14sgdqyrrd9tab9gg3dt75pd";
//                 break;
//             case "https://wpc2021.live/1":
//                 $token = "jg43jsjq97nqi2isirf2rdrfti1a3s";
//                 break;
//             case "https://wpc2022.live/1":
//                 $token = "fgfw62cgzi5wkmxpvptzj17udmtsv5";
//                 break;
//             case "https://wpc2025.live/1":
//                 $token = "qu1zjqpqgmrpbehpgfqbu34xwj8ttj";
//                 break;
//             case "https://wpc2026.live/1":
//                 $token = "n1vf9th785erm7v6zsstdjhfp8mj68";
//                 break;
//             case "https://wpc2027.live/1":
//                 $token = "jcm12bhjscqzuvui7q776jhq7eqjax";
//                 break;
//             case "https://wpc16.com/1":
//                 $token = "m1hnkwnpdw49qskzz7gx1kknfv2t";
//                 break;
//             case "https://wpc2029.live/1":
//                 $token = "gazy9nu6py1bsrv8e4tw3uvwryvi";
//                 break;
//             case "https://wpc2023.live/1":
//                 $token = "ha3z3jkn13dmctipqx1s1tj4866yu1";
            case "https://dev.wpc2021.live/": ///dev
                $token = "iwintijya9wu87rsuw4zzq";
                break;
            case "https://dev.wpc2022.live/":  ////dev
                $token = "iwintijya9wu87rsuw4zzq";
                break;
            case "https://devapi.wpc17.com/1":
                $token = "$1$8ykW0YF1";
                $usrname="testuser";
                $usrpassword="2e02fcdd3708674a0155e4783a6164ba";
                break;
        }
        
   

        
        
        
        $createref=$hcshin['merchantID'].$hcshin['reference_id'];
        $data_array = array(
            'amount' => $hcshin['amount'],
            'transaction_type' =>'deposit',
            'details' =>'load from cashout/merchant error - '."C_out ref- ".$createref,
            'reference_id' =>"CI".$createref,
            'load_to' => $hcshin['username'],
            'api_key' => $token, 'merchant_id'=>$hcshin['merchantID']
        );
            

            
            $chkdata = http_build_query($data_array);
            
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $chkdata);
            
            $reply = curl_exec($ch);
            
            
            //var_dump($reply);
            if ($e = curl_error($ch)) {
                
                $decode = array(
                    'msg' => $e
                );
                return $decode;
            } else {
                
                $decode = json_decode($reply, true);
                
                return $reply;
                
            }
            
            curl_close($ch);
            
            
        
    }
}