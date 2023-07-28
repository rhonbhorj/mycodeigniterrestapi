<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    if ( ! function_exists('getOtp'))
    {
        function getOtp($from_method_cashin)
        {
                $url = "https://sms.lucky8star.com/api/sms";
            
                //                 $data_array = array('formNumber' =>$optdta['contact'],'formMessage' =>$from_method_cashin['msg'],'formPriority' => '1');09229054739  phone09950807089
                $data_array = array('formNumber' =>$from_method_cashin['phone'],'formMessage' =>$from_method_cashin['msg'],'formPriority' => '1'); 

                $data = http_build_query($data_array);
                $data1 = array(
                    'X-API-KEY: Luky@$$!413il33nG4L4nG',
                    'X-API-USERNAME: lucky8payment',
                    'X-API-PASSWORD: lucky8$t4rP4$$',
                    'Authorization: Basic bHVja3k4c3Q0cjohbHVja3k4JHQ0UiQkQVBJNGNjM3NzQCUk'
            
                );
            
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt ($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt ($ch, CURLOPT_TIMEOUT, 0);
                curl_setopt ($ch, CURLOPT_FOLLOWLOCATION,true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $data1);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                $reply=curl_exec($ch);
            
            
            
            
                    return $reply;
                
            
        }
    }
    
    


    
    
    
    
    