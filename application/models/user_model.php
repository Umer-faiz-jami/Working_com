<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model {
    
    public function register_user($data) 
	{
        return $this->db->insert('user', $data);
    }

	public function is_email_unique($email) {
        $query = $this->db->get_where('user', array('email' => $email));
        return $query->num_rows() == 0;
    }


	public function get_user_by_email($email) {
	
        $query = $this->db->get_where('user', array('email' => $email));
        return $query->row();
    }
	public function get_email($user_name) {
	
        $query = $this->db->get_where('doctors', array('user_name' => $user_name));
        return $query->row();
    }

	public function max_id(){
		$this->db->select('MAX(user_id)');
		$this->db->from('user');
		return $this->db->get()->result_array();
		

	}

	public function max_insertion($data)
	{
       $this->db->insert('user_info',$data);
	}

}
