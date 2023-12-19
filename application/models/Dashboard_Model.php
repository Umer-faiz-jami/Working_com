<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard_Model extends CI_Model {

	public function insert_doctor($data) 
	{
        return $this->db->insert('doctors', $data);
    }

	public function insert_doctor_to_user($data) 
	{
        return $this->db->insert('user', $data);
    }
	
	public function doc_max_id() 
	{
         $this->db->select('MAX(doc_id) as doc_id, first_name,last_name,user_name,password,gender');
       $query=  $this->db->get('doctors');
		 return $query->row_array();
    }




}
