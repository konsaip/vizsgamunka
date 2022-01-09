<?php
class ChangePasswordModel extends CI_Model
{

  

    public function updatePassword($hashjelszo){

        $userdata=$this->session->userdata('user');
       
        $password = array(
            'jelszo' => $hashjelszo
            
            
            
            );
    
         $this->db->where('id', $userdata['id']);
         $this->db->update('paciens', $password);
    }
    
	

}