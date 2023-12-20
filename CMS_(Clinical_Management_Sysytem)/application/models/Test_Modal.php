<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Test_Modal extends CI_Model 
{


  public function get_data()
  {
	$this->db->select('*');
	$this->db->from('doctors');
	return $this->db->get()->result();
  }

  public function insert_data($data) 
   {
	$this->db->insert_batch('test', $data);
  }


}
