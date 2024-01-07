<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class P_Record extends CI_Controller {



	
	public function __construct() {
        parent::__construct();
        $this->load->model( 'P_Record_Model', 'record' );
        $this->load->helper( 'form' );
        $this->load->library( 'form_validation' );
        $this->load->library( 'session' );

    }




	public function index()
	{
		$data['title'] = 'Patients Record';
		$data['page'] = 'Records/p_record';
		$data['doc_data'] = $this->get_doc();
	    $this->load->view('content', $data);

	}


	public function get_doc()
	{
		$this->db->select('*');
		$this->db->from('doctors');
		$this->db->where('status', 1);
		return $this->db->get()->result_array();
	}

	public function add_patient()
{

    $first_name = $this->input->post('first_name');
    $last_name = $this->input->post('last_name');
    $dob = $this->input->post('dob');
    $gender = $this->input->post('gender');
    $phone = $this->input->post('phone');
    $cnic = $this->input->post('cnic');
    $age = $this->input->post('age');
    $doc_id = $this->input->post('consultant');

    
    if (empty($first_name) || empty($last_name) || empty($dob) || empty($gender) || empty($phone) || empty($cnic) || empty($age) || empty($doc_id)) {
        echo json_encode(array('status' => 'error', 'message' => 'Please fill in all the required fields.'));
        return;
    }

   
    $data = array(
        'first_name' =>$first_name,
        'last_name' =>$last_name,
        'dob' =>$dob,
        'gender' => $gender,
        'phone' => $phone,
        'cnic' =>"'".$cnic."'",
        'age' =>$age,
        'doc_id' => $doc_id
    );


    $inserted = $this->record->insert_patient($data);


    if ($inserted) {


		$max_sys = $this->record->get_max_id();

// print_r($max_sys);exit;
		$P_ID = $max_sys[0]['P_id'];
		$data = [
			'p_id' => $P_ID,
			'doc_id' => $doc_id
		];
		$insert_pro = $this->record->insert_pro($data);

		if($insert_pro){
			echo json_encode(array('status' => 'success', 'message' => 'Patient added successfully.'));

		}else{
			echo json_encode(array('status' => 'error', 'message' => 'Failed to add patient.'));
			
		}
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to add patient.'));
    }
}








public function P_records_data()
{
	$postData = $this->input->post();
	$get_data = $this->record->get_p_record($postData);
	echo json_encode($get_data);
}



}
