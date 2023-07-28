<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Statistics {
    

        public function log_activity() {
            
            $CI =& get_instance();
            

            
            
            $action=$CI->router->method;
            $token=$CI->session->userdata('Token');
            $CI->db->select();
            $CI->db->where(array('action'=>$action));
            $CI->db->where(array('token'=>$token));
            $query = $CI->db->get('statistics_logs');
            if($query->num_rows() > 0){
                // the query returned data, so the email already exist.
            }else{
            if($CI->session->userdata('logged_in') === TRUE ){
                    
                    
                    
                    // Start off with the session stuff we know
                    $data = array();
                    $data['account_id'] =$CI->session->userdata('Userid');
                    
                    
                    // Next up, we want to know what page we're on, use the router class
                    $data['section'] = $CI->router->class;
                    $data['action'] = $CI->router->method;
                    $data['token'] = $CI->session->userdata('Token');
                
                    // Lastly, we need to know when this is happening
                    $data['when_action'] = date('Y-m-d h:i:s');
                    
                    // We don't need it, but we'll log the URI just in case
                    $data['uri'] = uri_string();
                    
                    // And write it to the database
                    $CI->db->insert('statistics_logs', $data);
                }
            }
            
          
            
            
        }
        
     
        
        
}
