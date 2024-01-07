<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Doc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'Doc_Model', 'doc' );
        $this->load->helper( 'form' );
        $this->load->library( 'form_validation' );
        $this->load->library( 'session' );
    }


    public function index()
    {
		$user_id = $this->session->userdata('user_data')['user_id'];
		
		$data['title'] = 'Check Patient';
		$data['page'] = 'Doctors/doctor';
		$data['patients'] = $this->get_pat($user_id);

		// print_r($data['patients']);exit;

		$this->load->view('content', $data);

    }

	public function get_pat($user_id){
		$this->db->select('*');
		$this->db->from('doc_receive_patient drp');
		$this->db->join('patient_rec pr','drp.doc_id = pr.doc_id');
		$this->db->where('drp.doc_id', $user_id);
		

	  return  $this->db->get()->result_array();

	}




  

   



   

}
