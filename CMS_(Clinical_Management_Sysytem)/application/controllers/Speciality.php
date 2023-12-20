<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Speciality extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
        $this->load->model('Speciality_Model', 'speciality');
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->library('session');
    }
	public function index()
	{
		$data['title'] = 'Speciality';
		$data['page'] = 'speciality';
		$data['specialities'] = $this->get_doctors_count_by_speciality();
		$data['all_user'] = $this->get_data();
	    $this->load->view('content', $data);


	}

	public function get_data()
	{
         $this->db->select('*');
         $this->db->from('speciality');
		 return $this->db->get()->result_array();
	}

	public function get_doctors_count_by_speciality() {
        $this->db->select('speciality.speciality_name, COUNT(doctors.doc_id) as doctor_count');
        $this->db->from('doctors');
        $this->db->join('speciality', 'speciality.speciality_id = doctors.doc_speaciality');
        $this->db->group_by('speciality.speciality_id');

        $query = $this->db->get();
        return $query->result_array();
    }





	

	public function Add_speciality()
	{
		$spec = $this->input->post('speciality');
		if($spec== ''|| $spec== null){
			echo json_encode(['error' => 'Please Write Something!.']);
	  }else{
		$data =[
			'speciality_name' => $spec,
		];

		  $inserted = $this->db->insert('speciality',$data);

				if($inserted)
				{
			     echo json_encode(['success' => 'Added Sucessfully.']);
					
				}else{
			       echo json_encode(['error' => 'Please Write Something!.']);

				}
	  }
}

	
}
