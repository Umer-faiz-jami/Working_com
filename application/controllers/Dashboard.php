<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct() {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->model('Dashboard_model', 'dashboard');
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->library('session');
    }
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['page'] = 'dashboard';
		$data['all_user'] = $this->get_users();
	     $this->load->view('content', $data);

	}

	public function get_users(){
		$this->db->select('*');
		$this->db->from('doctors d');
		$this->db->join('user u','u.user_id = d.doc_id');
		$this->db->join('speciality s','s.speciality_id = d.doc_speaciality');
		
		$this->db->where('role','1');
		 return  $this->db->get()->result_array();
	}


	public function Add_Doctor()
	{
		$data['title'] = 'Add Doctor';
		$data['page'] = 'Admin_Doctor/Add_Doctor';
		$data['speciality'] = $this->speciality();
	     $this->load->view('content', $data);

	}

	public function Admin_Add_Doctor()
	{
		$this->form_validation->set_rules( 'first_name', 'First Name', 'required' );

        $this->form_validation->set_rules( 'last_name', 'Last Name', 'required' );
		$this->form_validation->set_rules( 'user_name', 'user_name', 'trim|required|valid_email' );
        $this->form_validation->set_rules( 'password', 'Password', 'trim|required|min_length[6]' );
        $this->form_validation->set_rules( 'confirm_password', 'Confirm Password', 'trim|required|matches[password]' );

        $this->form_validation->set_rules( 'speciality', 'speciality', 'required' );
        $this->form_validation->set_rules( 'gender', 'gender', 'required' );

		if ( $this->form_validation->run() == false ) {

            redirect('Dashboard/Add_Doctor');
        } else {
			$user_name = $this->input->post('user_name');
            if($this->user->get_email( $user_name ) ) {

                $this->session->set_flashdata( 'error', 'User Name already taken.' );
				redirect('Dashboard/Add_Doctor');


            } else {
					$first_name = $this->input->post('first_name');
					$last_name = $this->input->post('last_name');
					$password = $this->input->post('password');
					$gender = $this->input->post('gender');
					$speciality = $this->input->post('speciality');
                     $hashed = password_hash( $password, PASSWORD_BCRYPT );
			$data=[
				'first_name' =>  $first_name , 
				'last_name' =>  $last_name , 
				'user_name' =>  $user_name , 
				'password' =>  $hashed , 
				'has_password' =>  $password , 
				'gender'   => $gender,
				'doc_speaciality'   => $speciality
			];

			$inserted = $this->dashboard->insert_doctor($data);

			if($inserted)
			{
				$max_id = $this->dashboard->doc_max_id();
				
			    $max_doc_id = $max_id['doc_id'];
				$max_first_name = $max_id['first_name'];
				$max_last_name = $max_id['last_name'];
				$max_user_name = $max_id['user_name'];
				$max_password = $max_id['password'];
                //   print_r($max_password, $max_first_name,$max_last_name);exit;
				$data=[
					'user_id' => $max_doc_id,
					'first_name' => $max_first_name,
					'last_name' => $max_last_name,
					'email' => $max_user_name,
					'password' => $max_password,
					'role'   => 1

				];
				// print_r($data);exit;
				$inserted_properly = $this->dashboard->insert_doctor_to_user($data);
				if($inserted_properly){
						$this->session->set_flashdata( 'success', 'Doctor Added successfully.' );

						redirect( 'Dashboard/Add_Doctor' );

                 } else {
							$this->session->set_flashdata( 'error', 'Failed! to Add.' );
							redirect( 'Dashboard/Add_Doctor' );


                }
			}else{
				$this->session->set_flashdata( 'error', 'Something Went Wrong!.' );
				redirect( 'Dashboard/Add_Doctor' );
			}
		}
	}
	}

	public function speciality()
	{
		$this->db->select('*');
		$this->db->from('speciality');
		
		return $this->db->get()->result_array();
	}
	
	 


				public function set_status()
				{
					
					
					$postData = $this->input->post();
					
					$result = $this->get_status_update($postData);
					echo json_encode($result);
				}

			public function get_status_update()
			{
				$id = $_POST['userId'];
				// print($id);exit;


				$this->db->select('status');
				$this->db->from('user');
				$this->db->where('user_id',$id);
				$status_data = $this->db->get()->result_array();
				// print_r($status);exit;

				$status = $status_data[0]['status'];
				// print_r($status);exit;
				

				

				if($status == 1){
					$status = 0;
				}else{
					$status = 1;
				}

				$data =[
					'status' => $status
				];
				// print_r($data);exit;
				$this->db->where('user_id', $id);

				$this->db->update('user', $data);
				
				
			// echo $this->db->last_query();exit;
				return $this->db->affected_rows();

			}

	




	

}
