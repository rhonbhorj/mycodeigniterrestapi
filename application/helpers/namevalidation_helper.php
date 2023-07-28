<?php
defined('BASEPATH') OR exit('No direct script access allowed');




if ( ! function_exists('wpcchk_Username'))
{
    function wpcchk_Username($chkdata)
    {
    
    $url = $chkdata['siteName']."api/checkusername";
    
    switch($chkdata['siteName']){
    
        case "https://dev.wpc2021.live/":    //dev
            $token = "iwintijya9wu87rsuw4zzq";
            break;
        case "https://dev.wpc2022.live/":    //dev
            $token = "iwintijya9wu87rsuw4zzq";
            break;
       
    }
            $data_array = array('api_key' => $token, 'username' =>$chkdata['username']);
            
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
                
                return $decode;
                
            }
            
            curl_close($ch);
}
    


}






if ( ! function_exists('wpccheckUsername'))
{
    
    function wpccheckUsername($chkdata)
    {
   
        $url = $chkdata['siteName']."/api/checkusername";
        
        switch($chkdata['siteName']){
            case "https://wpc2028.live/":
                $token = "7x6qkq14sgdqyrrd9tab9gg3dt75pd";
                break;
            case "https://wpc2021.live/":
                $token = "jg43jsjq97nqi2isirf2rdrfti1a3s";
                break;
            case "https://wpc2022.live/":
                $token = "fgfw62cgzi5wkmxpvptzj17udmtsv5";
                break;
            case "https://wpc2025.live/":
                $token = "qu1zjqpqgmrpbehpgfqbu34xwj8ttj";
                break;
            case "https://wpc2026.live/":
                $token = "n1vf9th785erm7v6zsstdjhfp8mj68";
                break;
            case "https://wpc2027.live/":
                $token = "jcm12bhjscqzuvui7q776jhq7eqjax";
                break;
            case "https://wpc16.com/":
                $token = "m1hnkwnpdw49qskzz7gx1kknfv2t";
                break;
            case "https://wpc2029.live/":
                $token = "gazy9nu6py1bsrv8e4tw3uvwryvi";
                break;
            case "https://wpc2023.live/":
                $token = "ha3z3jkn13dmctipqx1s1tj4866yu1";
                break;
            case "https://dev.wpc2021.live/":    //dev
                $token = "iwintijya9wu87rsuw4zzq";
                break;
            case "https://dev.wpc2022.live/":    //dev
                $token = "iwintijya9wu87rsuw4zzq";  
                break;
            case "https://payment-aggregator-st.wpc2039.live/api/v1/payment-aggregator/wpc2028":   //yundo
                $token ="m9WWKWrAimgNfIk0zJvYvM2ZFAsNsC7DfIV6eY3WmSA=";
                break;
            case "https://devapi.wpc17.com/":
                $token = "$1$8ykW0YF1";
                $usrname="testuser";
                $usrpassword="2e02fcdd3708674a0155e4783a6164ba";
                break;
        }
                
            $data_array = array('api_key' => $token, 'username' =>$chkdata['username']);
            
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
                
                return $decode;
                
            }
            
            curl_close($ch);
        
//         }balikan bukas////
        
    }
}


     
    function wpc17name($chkdata)
    {

        $url = "https://devapi.wpc17.com/api/checkusername";
        
        $data_array =  array(
            'username' => $chkdata['username']
        );
        $data = http_build_query($data_array);
        $data1 = array(
            'Auth-Key: $1$8ykW0YF1',
            'username: testuser',
            'userpassword: 2e02fcdd3708674a0155e4783a6164ba',
            
        );
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $data1);
        $reply = curl_exec($ch);
        
        if ($e = curl_error($ch)) {
            
            echo $e;
        } else {
            
            $decode  = json_decode($reply, true);
            
            
            return $decode;
        }
    }
        
