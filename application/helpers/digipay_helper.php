<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('digipay')) {
    
    function dpaccess(){

        
        $data = array();

                $data['url'] = "https://staging.digipay.ph/api/v3/transactions";
//                 $data['try'] = "https://staging.digipay.ph/api/v3/transactions";
                $data['username'] = "LUCKY8";
                $data['password'] = "A5AdGiHMNHRr3BD";
         
        return $data;
                  
        
    }
    
    function digipay($pdata){
   
        $access = dpAccess();
  
    	$url = $access['url']; 
  
 
    	  
    	$loadData = array(
    	    
    	    "cost" => $pdata['amount'],
    	    
    	    "sku" => "DIGIPADALA_SEND",
    	    
    	    "v3" => true,
    	    
//     	    "data": {
//     	    "refNumber": "crmdsfdsfdss1",
//     	    "username": "rontestaccountma",
//     	    "siteName": "https://dev.wpc2022.live/",
//     	    "companyName": "testmerchant",
//     	    "Firstname": "test",
//     	    "Lastname": "lasttest",
//     	    "contactNumber": "09151681146",
//     	    "amount": "500",
//     	    "access_token": null
//     	}
    	    "payload" => array(
    	        "sender_details" => array(
    	            "_last_name" => $pdata['Lastname'],  
    	            "_first_name"=> $pdata['Firstname'],
    	            "_middle_initial"=> "",
    	            "_id_type"=> "TIN",
    	            "_suffix"=> "",
    	            "_id_number"=> "012-345-678",
    	            "_mobile_number"=> "09331581041"  
   
    	        ),
    	        "receiver_details" => array(
    	            "first_name" => $pdata['Firstname'],
    	            "middle_initial" => "",       
    	            "last_name" => $pdata['Firstname'],
    	            "suffix" => "",
    	            "mobile_number" => "09457192433"
    	        ),
    	        "reference_number" =>$pdata['contactNumber'],
    	        "id_type" =>"TIN", 
    	        "id_number"=> "012-345-786",
    	    )

    	);

    	$data = http_build_query($loadData);
    	$data1 = array(
    	    
    	    'Content-Type: application/x-www-form-urlencoded',
    	    'x-user-email: erwin.dorado@alpharedph.net',
    	    'x-user-token: GYgR8sKdQgXsNXVWezK-',
    	    'Content-Type: application/json',
    	    
    	    
    	    
    	);
    	
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_HTTPHEADER, $data1);
    	$reply = curl_exec($ch);

//     	var_dump($reply);
     	return $reply;
    	
    	
    }
    
  
 
}
 
    
 