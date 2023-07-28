<?php
defined('BASEPATH') OR exit('No direct script access allowed');

        
        

if ( ! function_exists('cancelsms'))
{
    
    function cancelsms($getsms)
    {
        
        $url = "https://devapi.lucky8star.com/auth/otp";
        
        $data_array =  array('contactNumber' => $getsms['phone'], 'message' => $getsms['sms']);
        $data = http_build_query($data_array);
        $data1 = array(
            'Auth-Key: $1$F/582mwd$X89eGpUxLYIhzOpioM1T.0',
            'Content-Type: application/x-www-form-urlencoded',
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
            
            return $e;
        } else {
            
            
            return $reply;
        }
      }
 }
        



