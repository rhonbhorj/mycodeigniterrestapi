<?php 

// user: usrlucky8
// pass: l1u2c3k4y5e6i7g8h9t0


defined('BASEPATH') OR exit('No direct script access allowed');



if ( ! function_exists('MLsendout'))
{
    function MLsendout($data,$jget)/////
    {

          
        $MLdata['accountno'] = "MLDP210035";
        $MLdata['username'] = "usrlucky8";
        $MLdata['password'] = "l1u2c3k4y5e6i7g8h9t0";
        $MLdata['senderFName'] = "Franky";
        $MLdata['senderLName'] = "Mccullough";
        $MLdata['senderMName'] = "Carey";
        $MLdata['senderBirthDate'] = "2021-11-10T00:00:00";
        $MLdata['senderNo'] = "09457192433";
        $MLdata['senderStreet'] = "B. Benedicto Street";
        $MLdata['senderProvinceCity'] = "Cebu City";
        $MLdata['senderCountry'] = "PHILIPPINES";
        $MLdata['senderGender'] = "MALE";
        $MLdata['senderIDType'] = "GSIS";
        $MLdata['senderIDNo'] =$data['contactNumber'];   ///this is contact number
        $MLdata['receiptno'] = $data['refNumber']   ;     ///reference number
        $MLdata['senderExpiryDate'] = "2021-11-10T00:00:00";
        $MLdata['receiverFName'] = $data['Firstname'];
        $MLdata['receiverMName'] = $data['Midlename'];
        $MLdata['receiverLName'] = $data['Lastname'];
        $MLdata['receiverBirthDate'] = "2021-11-10T00:00:00";
        $MLdata['receiverno'] = $data['contactNumber'];  ///this is contact number
        $MLdata['receiverStreet'] = "Jakosalem Street";
        $MLdata['receiverProvinceCity'] = "Cebu City";
        $MLdata['receiverCountry'] = "PHILIPPINES";
        $MLdata['receiverGender'] = "FEMALE";
        $MLdata['principal'] = $data['amount'];
        $MLdata['source'] = $data['siteName'];
        $MLdata['currency'] = "PHP";
//         $MLdata['transactionNumber'] = $data['refNumber'];  ///reference NUMBER
        
        
        $turnj=json_encode($MLdata);
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://partnersapidev.mlhuillier.com/Partners/DomesticPartner/MLExpress/MLExpress.svc/sendout',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$turnj,

            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);

        return $response;

    }

}
?>