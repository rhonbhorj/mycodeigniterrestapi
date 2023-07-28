
<?php 

// user: usrlucky8
// pass: l1u2c3k4y5e6i7g8h9t0


defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('MLtest'))
{
    function MLtest()/////
    {
        

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://mluatservice.mlhuillier1.com/testing/MLExpress/MLExpress.svc/sendout',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'
     {
        "accountno" :"MLDP210035",
        "username" : "usrlucky8",
        "password" : "l1u2c3k4y5e6i7g8h9t0",
        "senderFName"  :"Franky",
       "senderLName" :"Mccullough",
       "senderMName":  "Carey",
        "senderBirthDate" : "2021-11-10T00:00:00",
       "senderNo":  "09151681146",
        "senderStreet":  "B. Benedicto Street",
       "senderProvinceCity":  "Cebu City",
       "senderCountry" : "PHILIPPINES",
        "senderGender" : "MALE",
        "senderIDType" : "GSIS",
       "senderIDNo": "321321321",
        "receiptno":  "1234510",
       "senderExpiryDate": "2021-11-10T00:00:00",
       "receiverFName":  "testFirstname",
        "receiverMName":  "testMidlename",
        "receiverLName":  "testLastname",
      "receiverBirthDate":  "2021-11-10T00:00:00",
        "receiverno": "09457192433", 
        "receiverStreet":  "Jakosalem Street",
        "receiverProvinceCity":  "Cebu City",
       "receiverCountry":  "PHILIPPINES",
       "receiverGender" : "FEMALE",
        "principal":"4",
       "source" :"https://dev.wpc2021.live/",
      "currency":  "PHP",
        "transactionNumber" :"PTMLtestref12321"

}
   ',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;


    }}
