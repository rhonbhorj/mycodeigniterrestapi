<?php
defined('BASEPATH') OR exit('No direct script access allowed');

        
        

if ( ! function_exists('wpccashout'))
{
    
    function wpccashout($hcshout)
    {
        
        
        $url = $hcshout['siteName']."api/loading";
        
        switch($hcshout['siteName']){
//             case "https://wpc2028.live//":
//                 $token = "7x6qkq14sgdqyrrd9tab9gg3dt75pd";
//                 break;
//             case "https://wpc2021.live//":
//                 $token = "jg43jsjq97nqi2isirf2rdrfti1a3s";
//                 break;
//             case "https://wpc2022.live//":
//                 $token = "fgfw62cgzi5wkmxpvptzj17udmtsv5";
//                 break;
//             case "https://wpc2025.live//":
//                 $token = "qu1zjqpqgmrpbehpgfqbu34xwj8ttj";
//                 break;
//             case "https://wpc2026.live//":
//                 $token = "n1vf9th785erm7v6zsstdjhfp8mj68";
//                 break;
//             case "https://wpc2027.live//":
//                 $token = "jcm12bhjscqzuvui7q776jhq7eqjax";
//                 break;
//             case "https://wpc16.com//":
//                 $token = "m1hnkwnpdw49qskzz7gx1kknfv2t";
//                 break;
//             case "https://wpc2029.live//":
//                 $token = "gazy9nu6py1bsrv8e4tw3uvwryvi";
//                 break;
//             case "https://wpc2023.live//":
//                 $token = "ha3z3jkn13dmctipqx1s1tj4866yu1";
            case "https://dev.wpc2021.live/":  ////dev
                $token = "iwintijya9wu87rsuw4zzq";
                break;
            case "https://dev.wpc2022.live/":  ////dev
                $token = "iwintijya9wu87rsuw4zzq";
                break;
            case "https://dev.api.wpc17.com/":
                $token = "$1$8ykW0YF1";
                $usrname="testuser";
                $usrpassword="2e02fcdd3708674a0155e4783a6164ba";
                break;
        }
        
       
   
        
        $createref=$hcshout['merchantID'].$hcshout['reference_id'];
        $data_array = array(
            'amount' => $hcshout['amount'],
            'transaction_type' =>'withdrawal',
            'details' =>$hcshout['dtails'],
            'reference_id' =>$createref,
            'load_to' => $hcshout['username'],
            'api_key' => $token, 'merchant_id'=>$hcshout['merchantID'] 
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


if ( ! function_exists('wpccashin'))
{
    
    function wpccashin($hcshin,$pdata)
    {
        
        
        $url = $hcshin['siteName']."/api/loading";
        
        switch($hcshin['siteName']){
    //             case "https://wpc2028.live/":
    //                 $token = "7x6qkq14sgdqyrrd9tab9gg3dt75pd";
    //                 break;
    //             case "https://wpc2021.live/":
    //                 $token = "jg43jsjq97nqi2isirf2rdrfti1a3s";
    //                 break;
    //             case "https://wpc2022.live/":
    //                 $token = "fgfw62cgzi5wkmxpvptzj17udmtsv5";
    //                 break;
    //             case "https://wpc2025.live/":
    //                 $token = "qu1zjqpqgmrpbehpgfqbu34xwj8ttj";
    //                 break;
    //             case "https://wpc2026.live/":
    //                 $token = "n1vf9th785erm7v6zsstdjhfp8mj68";
    //                 break;
    //             case "https://wpc2027.live/":
    //                 $token = "jcm12bhjscqzuvui7q776jhq7eqjax";
    //                 break;
    //             case "https://wpc16.com/":
    //                 $token = "m1hnkwnpdw49qskzz7gx1kknfv2t";
    //                 break;
    //             case "https://wpc2029.live/":
    //                 $token = "gazy9nu6py1bsrv8e4tw3uvwryvi";
    //                 break;
    //             case "https://wpc2023.live/":
    //                 $token = "ha3z3jkn13dmctipqx1s1tj4866yu1";
            case "https://dev.wpc2021.live/": ///dev
                $token = "iwintijya9wu87rsuw4zzq";
                break;
            case "https://dev.wpc2022.live/":  ////dev
                $token = "iwintijya9wu87rsuw4zzq";
                break;
            case "https://devapi.wpc17.com/":
                $token = "$1$8ykW0YF1";
                $usrname="testuser";
                $usrpassword="2e02fcdd3708674a0155e4783a6164ba";
                break;
        }
        
   

            
        $createref=$hcshin['companyID'].$hcshin['refNumber']."-".$hcshin['loadingID'];
            $data_array = array(
                'amount' => $hcshin['amount'],
                'transaction_type' =>'deposit',
                'details' =>' Load back due to '.$pdata['remarks']."-".$hcshin['refNumber']."-".$hcshin['loadingID'],
                'reference_id' =>$createref,
                'load_to' => $hcshin['username'],
                'api_key' => $token, 'merchant_id'=>$hcshin['companyID']
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









////////////finance cashin

if ( ! function_exists('wpccashin_fin'))
{
    
    function wpccashin_fin($hcshin)
    {
        
        
        $url = $hcshin['siteName']."/api/loading";
        
        switch($hcshin['siteName']){
//             case "https://wpc2028.live/":
//                 $token = "7x6qkq14sgdqyrrd9tab9gg3dt75pd";
//                 break;
//             case "https://wpc2021.live/":
//                 $token = "jg43jsjq97nqi2isirf2rdrfti1a3s";
//                 break;
//             case "https://wpc2022.live/":
//                 $token = "fgfw62cgzi5wkmxpvptzj17udmtsv5";
//                 break;
//             case "https://wpc2025.live/":
//                 $token = "qu1zjqpqgmrpbehpgfqbu34xwj8ttj";
//                 break;
//             case "https://wpc2026.live/":
//                 $token = "n1vf9th785erm7v6zsstdjhfp8mj68";
//                 break;
//             case "https://wpc2027.live/":
//                 $token = "jcm12bhjscqzuvui7q776jhq7eqjax";
//                 break;
//             case "https://wpc16.com/":
//                 $token = "m1hnkwnpdw49qskzz7gx1kknfv2t";
//                 break;
//             case "https://wpc2029.live/":
//                 $token = "gazy9nu6py1bsrv8e4tw3uvwryvi";
//                 break;
//             case "https://wpc2023.live/":
//                 $token = "ha3z3jkn13dmctipqx1s1tj4866yu1";
            case "https://dev.wpc2021.live/": ///dev
                $token = "iwintijya9wu87rsuw4zzq";
                break;
            case "https://dev.wpc2022.live/":  ////dev
                $token = "iwintijya9wu87rsuw4zzq";
                break;
            case "https://devapi.wpc17.com/":
                $token = "$1$8ykW0YF1";
                $usrname="testuser";
                $usrpassword="2e02fcdd3708674a0155e4783a6164ba";
                break;
        }
        
        
        
        
        $createref=$hcshin['companyID'].$hcshin['refNumber']."-".$hcshin['loadingID'];
        $data_array = array(
            'amount' => $hcshin['amount'],
            'transaction_type' =>'deposit',
            'details' =>' Load back due to cancelation of transaction'."-".$hcshin['companyID'].$hcshin['refNumber']."-".$hcshin['loadingID'],
            'reference_id' =>$createref,
            'load_to' => $hcshin['username'],
            'api_key' => $token, 'merchant_id'=>$hcshin['companyID']
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

