<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

require APPPATH . 'libraries/Format.php';
require APPPATH . 'helpers/json_output_helper.php';
require APPPATH . 'helpers/wpcaccess_helper.php';
require APPPATH . 'helpers/namevalidation_helper.php';
class Api extends REST_Controller
{
    public $uid;
    public function __construct()
    {
        parent::__construct();

        // $this->load->helper('digipay');

    }




    public function index_get()
    {
        //         $this->response(
        //            ['status'=>true,'messege'=> 'access successfully
        // '

        //         ],
        //             Rest_Controller::HTTP_FORBIDDEN
        //         );


        $this->response(
            '>Directory access is forbidden',
            Rest_Controller::HTTP_FORBIDDEN
        );
    }



    public function index_post()
    {

        $this->response(
            '>Directory access is forbidden',
            Rest_Controller::HTTP_FORBIDDEN
        );
    }




    private function getHeaders()
    {

        $arh = array();
        $rx_http = '/\AHTTP_/';
        foreach ($_SERVER as $key => $val) {
            if (preg_match($rx_http, $key)) {
                $arh_key = preg_replace($rx_http, '', $key);
                $rx_matches = array();
                // do some nasty string manipulations to restore the original letter case
                // this should work in most cases
                $rx_matches = explode('_', $arh_key);
                if (count($rx_matches) > 0 and strlen($arh_key) > 2) {
                    foreach ($rx_matches as $ak_key => $ak_val) $rx_matches[$ak_key] = ucfirst($ak_val);
                    $arh_key = implode('-', $rx_matches);
                }
                $arh[$arh_key] = $val;
            }
        }
        return ($arh);
    }


    public function testhead_get()
    {

        $header = $this->getHeaders();
        var_dump($header);
        $access = array(
            'key' => ltrim($header['X-API-KEY']),
            'username' => ltrim($header['X-API-USERNAME']),
            'userPassword' => MD5(ltrim($header['X-API-PASSWORD'])),
        );


        $this->response(
            $access,
            Rest_Controller::HTTP_UNAUTHORIZED
        );
    }






    function geruuid_get()
    {
        echo      sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }
}
