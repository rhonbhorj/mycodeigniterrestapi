<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ArModel extends CI_Model
{
    
    public function access($token){
        $company  =$this->db->select('companyName')->from('tbl_company')->where('companyName', $token)->get()->row();
        if($company == true){
            return true;
        }
        else{
            
            
            return false;
        }
        
    }
    public function  get_total($data){
        date_default_timezone_set('Asia/Manila');
        $transDate = date('Y-m-d');
        $datapost['username']=$data['username'];
        $datapost['dateUp']=$transDate;
        
        $data=$this->db->select_sum('amount')->from('cash_out')->where('username',  $datapost['username'])->where('dateUp',$datapost['dateUp'])->get();
        return $data->result_array();
        
    }
    
    
    
    function statustry($data){///api_users
        $sql = "select active from tbl_site where url like ?  ";
        $Q = $this->db->query($sql,$data);
        return $Q->row_array()?$Q->row_array():false;
        //         return $data;
        
    }
    
    public function selectmerchnt($e){
        
        $qry="select companyName,percent,cout_trans_type from tbl_company where companyName like ?";
        $Q= $this->db->query($qry,$e);
        return $Q->row_array()?$Q->row_array():false;
        
    }
    public function merchntprcnt($e){
        
        $qry="select companyName,percent,companyID from tbl_company where companyName like ?";
        $Q= $this->db->query($qry,$e);
        return $Q->row_array()?$Q->row_array():false;
        
    }
    
    function chkref($data){///api_users
        $sql = "select refNumber from cash_out where refNumber like ?  ";
        $Q = $this->db->query($sql,$data);
        return $Q->row_array()?$Q->row_array():false;
        //         return $data;
        
    }
    public function getheader(){
        $var = apache_request_headers();
        if ($var)
        {
            $qq = $var;
            $data = serialize($qq);
            return  $data;
        }
    }
    public function prelog($datapost,$fromheaders){
        
        date_default_timezone_set('Asia/Manila');
        $selcmpnyID =$this->db->select('companyID')->from('tbl_company')->where('companyName', $datapost['companyName'])->get()->row();
        $getcmpnyid=$selcmpnyID->companyID;
        $token     = $this->input->get_request_header('Auth-Key', TRUE);
        $uname     = $this->input->get_request_header('username', TRUE);
        $getapiidr=  $this->db->select('user_id,apiID')->from('api_users')->where('username', $uname)->get()->row();
        
        $userid =$getapiidr->user_id;
        $apiid =$getapiidr->apiID;
        $transDate = date('Y-m-d H:i:s');
        $authorized= "";
        $time= date("H:i:s");
        $fromheaders['ip'];
        
        
        $logAction1       = $this->uri->segment(2);
        //         $getheaders=$this->login_getheader();
        $this->db->insert('api_logs',
            array('userID'=>$userid,
                'params'=>serialize($fromheaders['headers']),  ///header
                'uri'=>$datapost['siteName'],
                'method'=>$logAction1,
                'transDate'=>$transDate,
                'ip_address'=>$fromheaders['ip'],
                'time'=>$time,
                'authorized'=>$authorized,
                'companyName'=> $datapost['companyName'],
                'api_key'=>$token,
                'api_id'=>$apiid,
                'refNumber'=> $datapost['refNumber']
            ));
        
        
    }
    function status($data){///api_users
        $sql = "select status,cout_status from api_users where username like ?  ";
        $Q = $this->db->query($sql,$data);
        return $Q->row_array();
        //         return $data;
        
    }
    public function outlog($datapost,$fromheaders,$casout){
        
        date_default_timezone_set('Asia/Manila');
        $selcmpnyID =$this->db->select('companyID')->from('tbl_company')->where('companyName', $datapost['companyName'])->get()->row();
        $getcmpnyid=$selcmpnyID->companyID;
        $token     = $this->input->get_request_header('Auth-Key', TRUE);
        $uname     = $this->input->get_request_header('username', TRUE);
        $getapiidr=  $this->db->select('user_id,apiID')->from('api_users')->where('username', $uname)->get()->row();
        
        $userid =$getapiidr->user_id;
        $apiid =$getapiidr->apiID;
        $transDate = date('Y-m-d H:i:s');
        $authorized= "";
        $time= date("H:i:s");
        $fromheaders['ip'];
        
        
        $logAction1       = $this->uri->segment(2);
        //         $getheaders=$this->login_getheader();
        $this->db->insert('api_logs',
            array('userID'=>$userid,
                'params'=>serialize($fromheaders['headers']),  ///header
                'uri'=>$datapost['siteName'],
                'method'=>$logAction1,
                'transDate'=>$transDate,
                'ip_address'=>$fromheaders['ip'],
                'time'=>$time,
                'authorized'=>$authorized,
                'companyName'=> $datapost['companyName'],
                'api_key'=>$token,
                'api_id'=>$apiid,
                'refNumber'=> $datapost['refNumber'],
                'response_code'=>$casout
            ));
        
        
    }
    
    
    function chk_access($data)
    {
        if($data)
        {
            $sql = "select * from api_keys ak left join api_users au on
             ak.api_ID=au.apiID
             where
      ak.key like ? and au.username like ? and au.userpassword like ?  ";
            $Q = $this->db->query($sql,array($data['key'], $data['username'], $data['userPassword']));
            return $Q->row_array();
        } else {
            return false;
        }
    }
    public function chksite($data){
        
        $site  =$this->db->select('url')->from('tbl_site')->where('url',$data['siteName'])->get()->row();
        
        return $site ?$site:false;
        
    }
    public function prefix($e){
        
        $sql = "select companyName,companyID,process,isAuto,percent,transactionType,status from tbl_company where companyName like ?  ";
        
        $Q = $this->db->query($sql,$e);
        return $Q->row_array()?$Q->row_array():false;
        
    }
    
    public function users_tbl($cpnyNme){
        
        $sql = "select id from users where companyName like ?  ";
        
        $Q = $this->db->query($sql,$cpnyNme);
        return $Q->row_array()?$Q->row_array():false;
        
    }
    
    
    
    public function flagerr($data){
        $this->db->insert('cashout_flag',$data);
        
    }
    
    public function flag($flag,$datapost){
        $selcmpnyID =$this->db->select('process')->from('tbl_company')->where('companyName', $datapost['companyName'])->get()->row();
        
        $getvalue=$selcmpnyID->process;
        date_default_timezone_set('Asia/Manila');
        $one=1;
        $this->db->insert('cashout_flag',
            array(
                'siteName'=>$datapost['siteName'],//
                'flag_status' => "success",
                'success'=>$one,
                'fleg_refNumber'=>$datapost['refNumber'],//
                'response'=>$flag['cashout'],
                'flag_fname'=>$datapost['Firstname'],
                'flag_lname'=>$datapost['Lastname'],
                'flag_cnumber'=>$datapost['contactNumber'],
                'flag_username'=>$datapost['username'],
                'flag_amount'=>$datapost['amount'],
                'flag_company'=>$datapost['companyName'],
                'flag_accountID'=>$flag['account_id'],
                  'flag_ma'=>$flag['agent_username'],
                'Date' => date('Y-m-d H:i:s'),
                'flag_process'=>$getvalue
                
            ));
    }
    public function gtcashout_transid($trans){
        
        $sql = "select  transID
    from cash_out  where loadingID like ?";
        $Q = $this->db->query($sql,array($trans['loading_id']));
        return $Q->row_array()?$Q->row_array():false;
        
    }
    
    
    public function arlog($arlogs){
        $test= $this->db->insert('ar_activityLogs',$arlogs);
    }
    
    public function ins_sms($e){
        $test= $this->db->insert('sms_logs',$e);
    }
    
    
    public function cashouts_data($data){
        $test= $this->db->insert('cash_out',$data);
        return array(
            
            'userID' => $data['userID'],
            'refNumber'=>$data['reqReference'],
            'loading_id'=>$data['loadingID']
        );
    }
    public function tbl_transact($transct){
        $test= $this->db->insert('tbl_transaction',$transct);
    }
    
    public function update_cashout($update,$where){
        $this->db->where('userID',$where)->update('users',$update);
        
        return $this->db->affected_rows();
    }
    
    public function update_merchnt_stat($update,$where){
        
        $this->db->where('companyName',$where)->update('tbl_company',$update);
        
        return $this->db->affected_rows();
    }
    
}