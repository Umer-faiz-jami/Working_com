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
		$role_id = $this->session->userdata('user_data')['role_set'];
		$u_id = $this->session->userdata('user_data')['user_id'];

		if($role_id == 2){
			$data['title'] = 'Dashboard';
			$data['page'] = 'dashboard';
			$data['all_user'] = $this->get_users();
			 $this->load->view('content', $data);
		}elseif($role_id == 0){
			    $data['title'] = 'Patients Record';
				$data['page'] = 'Records/p_record';
				$data['doc_data'] = $this->get_doc();
				$this->load->view('content', $data);
		}elseif($role_id == 1){
			$data['title'] = 'Check Patient';
			$data['page'] = 'Doctors/doctor';
			$data['Now'] = $this->get_patients_n($u_id);
			$this->load->view('content', $data);
		}
	

	}


	// public function get_patients_n($u_id = null)
	// {
    //       $this->db->select('*')
	// }


	public function get_doc()
	{
		$this->db->select('*');
		$this->db->from('doctors');
		$this->db->where('status', 1);
		return $this->db->get()->result_array();
	}

	public function get_users(){
		$this->db->select('*');
		$this->db->from('doc_user d');
		$this->db->join('doctors u','d.user_id = u.doc_id');
		$this->db->join('speciality s','s.speciality_id = u.doc_speaciality');
		
		$this->db->where('role','1');
		$this->db->where('d.status','1');
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
    $this->form_validation->set_rules('first_name', 'First Name', 'required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'required');
    $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
    $this->form_validation->set_rules('speciality', 'Speciality', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required');

    if ($this->form_validation->run() == false) {
        $this->session->set_flashdata('error', 'Validation failed. Please check your inputs.');
        redirect('Dashboard/Add_Doctor');
    } else {
        $user_name = $this->input->post('user_name');
        if ($this->user->get_email($user_name)) {
            $this->session->set_flashdata('error', 'User Name already taken.');
            redirect('Dashboard/Add_Doctor');
        } else {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $password = $this->input->post('password');
            $gender = $this->input->post('gender');
            $speciality = $this->input->post('speciality');
            $hashed = password_hash($password, PASSWORD_BCRYPT);
            $user_iddc = $this->user->max_id();
            $id = $user_iddc[0]['user_id'] + 1;

            $data = [
                'doc_id' => $id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'user_name' => $user_name,
                'password' => $hashed,
                'has_password' => $password,
                'gender' => $gender,
                'doc_speaciality' => $speciality
            ];

            $inserted = $this->dashboard->insert_doctor($data);

            if ($inserted) {
                $max_id = $this->dashboard->doc_max_id();
                // $max_first_name = $max_id['first_name'];
                // $max_last_name = $max_id['last_name'];
                // $max_user_name = $max_id['user_name'];
                // $max_password = $max_id['password'];

                $data = [
                    'user_id' => $id,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $user_name,
                    'password' => $hashed,
                    'role' => 1
                ];

                $inserted_properly = $this->dashboard->insert_doctor_to_user($data);

                if ($inserted_properly) {
                    $data3 = [

						
						'first_name' => $first_name,
                        'last_name' => $last_name,
                        'user_name' => $user_name,
                        'password' => $hashed,
						'role_set' => 1
                    ];
                    $inserted_ = $this->dashboard->insert_log_cred($data3);

                    if ($inserted_) {
                        $this->session->set_flashdata('success', 'Doctor Added successfully.');
                        redirect('Dashboard/Add_Doctor');
                    } else {
                        $this->session->set_flashdata('error', 'Failed to add login credentials.');
                        redirect('Dashboard/Add_Doctor');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Something Went Wrong!');
                redirect('Dashboard/Add_Doctor');
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
				$this->db->from('doc_user');
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

				$this->db->update('doc_user', $data);
				
				
			// echo $this->db->last_query();exit;
				return $this->db->affected_rows();

			}

	
        

			public function Edit_Doctor_view()
			{
				    $data['title'] = 'Edit Doctor';
					$data['page'] = 'Admin_Doctor/Edit_Doctor';
		            $data['speciality'] = $this->speciality();

					$this->load->view('content', $data);
			}


			public function Edit_Doc_Data()
			{
				$postData = $_POST['id'];
				$get_data = $this->dashboard->get_data($postData);
				echo json_encode($get_data);
			}



			// Function To Update Doctor 

			public function Admin_Doc_Edit()
			{
				$id = $this->input->post('edit_id');

				$first_name = $this->input->post('first_name');
				$last_name = $this->input->post('last_name');
				$user_name = $this->input->post('user_name');
				$password = $this->input->post('password');
				$confirm_password = $this->input->post('confirm_password');
				$gender = $this->input->post('gender');
				$speciality = $this->input->post('speciality');



				if ($password !== $confirm_password) {
					
					$response = array('status' => 'error', 'message' => 'Password and confirm password do not match');
					echo json_encode($response);
					
				}
			        $hash_password = password_hash($password, PASSWORD_BCRYPT);
					
			    $data = [
					'first_name' => $first_name,
					'last_name' => $last_name,
					'user_name' => $user_name,
					'password' => $hash_password,
					'has_password' => $password,
					'gender' => $gender,
					'doc_speaciality' => $speciality
				];
               

				$update_doctor = $this->dashboard->update_doctor($data, $id);

				if($update_doctor){

					$data = [
						'first_name' => $first_name,
						'last_name' => $last_name,
						'email' => $user_name,
						'password' => $hash_password,
						'Gender' => $gender,
						
					];

				   $update_doctor_in_user = $this->dashboard->update_doctor_in_user($data, $id);

				   if($update_doctor_in_user){

						$response = array('status' => 'success', 'message' => 'Doctor updated successfully');
						  echo json_encode($response);
				   }else{
						$response = array('status' => 'error', 'message' => 'Something Went Wrong!');
							echo json_encode($response);
				  }

				}


			}


			public function DeleteDoctor()
			{
				$id = $_POST['id'];

				$data=[
					'STATUS' => '0'
				];

				$update_status_doc = $this->dashboard->update_status_doc($data, $id);

				if($update_status_doc)
				{
					$data=[
						'STATUS' => '0'
					];
					$update_status_user = $this->dashboard->update_status_user($data, $id);

					if($update_status_user)
					{
						$response = array('status' => 'success', 'message' => 'Doctor Deleted successfully!');
						  echo json_encode($response);	
					}else{
						$response = array('status' => 'error', 'message' => 'Something Went Wrong!');
							echo json_encode($response);
					}

				}
			}



	

}
