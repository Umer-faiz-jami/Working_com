<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Test extends CI_Controller {


	public function __construct() {
        parent::__construct();
        $this->load->model( 'Test_Modal', 'test' );
        $this->load->helper( 'form' );
        $this->load->library( 'form_validation' );
        $this->load->library( 'session' );
    }


	public function index()
	{
		$data['title'] = 'Test';
		$data['page'] = 'test';
	    $this->load->view('content', $data);

	}

	public function add_test(){
	   $code =	$this->test->get_data();
	   $data = [];
	   foreach ($code as $item) {
	
		$docId = $item->doc_id;
		$firstName = $item->first_name;
		$lastName = $item->last_name;
		$userName = $item->user_name;
		$password = $item->password;
		$hasPassword = $item->has_password;
		$gender = $item->gender;
		$docSpeciality = $item->doc_speaciality;
		$docCreatedAt = $item->doc_created_at;
	
     
	
		$data[] = [
			'id' => 33,
			'Name' => $userName,
			'password' => $hasPassword
		];
		
		
	}

	


	$this->test->insert_data($data);
	}
}
