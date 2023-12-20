<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class profile_model extends CI_Model {
    
	public function get_data($u_id) 
	{
		
		$this->db->select("*");
		$this->db->from("user");
		$this->db->where("user_id", $u_id);
	
		$query = $this->db->get();
	  
		if ($query->num_rows() > 0) {
			
			return $query->result_array();
		} else {
		
			return array();
		}
	}
	


	public function update_name($data, $id)
	{
		// print_r($data);exit;
            $this->db->where('user_id', $id);
            $this->db->update('user', $data);
            return $this->db->affected_rows();
        
	}

	
	

}
