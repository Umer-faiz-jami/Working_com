<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Nurse extends CI_Controller {


	public function __construct() {
        parent::__construct();
        $this->load->model( 'Nurse_Model', 'nurse' );
        $this->load->helper( 'form' );
        $this->load->library( 'form_validation' );
        $this->load->library( 'session' );

    }



	public function index()
	{
		$data['title'] = 'Nurses';
		$data['page'] = 'Nurses/nurse';
		$data['all_user'] = $this->nurse->get_data();
	    $this->load->view('content', $data);


	}

// ADD NURSE VIEW

	public function Add_Nurse_view()
	{
		$data['title'] = 'Nurses';
		$data['page'] = 'Nurses/Add_Nurse';
	    $this->load->view('content', $data);
	}




	// INSERT NURSE

	public function Add_Nurse_func()
{
    // Get form data
    $name = $this->input->post('name');
    $user_name = $this->input->post('user_name');
    $password = $this->input->post('password');
    $c_password = $this->input->post('c_password');
    $gender = $this->input->post('gender');

    // Check if passwords match
    if ($password !== $c_password) {
        $response = array(
            'success' => false,
            'error' => 'Password and Confirm Password do not match',
        );
        echo json_encode($response);
        return;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare data for insertion
    $data = array(
        'name' => $name,
        'user_name' => $user_name,
        'password' => $hashed_password,
        'has_password' => $password,
        'gender' => $gender,
    );

    // Insert nurse
    $insert_result = $this->nurse->insert_nurse($data);

    // Check if nurse insertion was successful
    if ($insert_result) {
        // Insert login credentials
        $log_data = array(
            'user_name' => $user_name,
            'password' => $hashed_password,
            'role_set' => 0
        );
        $insert_log = $this->nurse->insert_log_cred($log_data);

        // Check if login credentials insertion was successful
        if ($insert_log) {
            $response = array(
                'success' => true,
                'message' => 'Nurse added successfully',
            );
        } else {
            $response = array(
                'success' => false,
                'error' => 'Failed to add nurse login credentials',
            );
        }
    } else {
        $response = array(
            'success' => false,
            'error' => 'Failed to add nurse',
        );
    }

    // Send JSON response
    echo json_encode($response);
}






// EDIT NURSE VIEW


public function Edit_Nurse_view()
{
	$data['title'] = 'Edit Nurse';
	$data['page'] = 'Nurses/edit_Nurse';
	$this->load->view('content', $data);
}






public function Edit_nurse_data()
{
	$id = $_POST['id'];
	$get = $this->nurse->get_data_aginst_id($id);
	echo json_encode($get);
}





public function edit_Nurse_func()
{
    
	$id = $this->input->post('nurse_id');
    $name = $this->input->post('edit_name');
    $user_name = $this->input->post('edit_user_name');
    $password = $this->input->post('edit_password');

    $gender = $this->input->post('edit_gender');

    
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

   
    $data = array(
        'name' => $name,
        'user_name' => $user_name,
        'password' => $hashed_password,
		'has_password' => $password,
        'gender' => $gender,
    );

 
    
    $update_result = $this->nurse->update_nurse($data, $id);

    if ($update_result) {
        $response = array(
            'success' => true,
            'message' => 'Nurse Updated successfully!',
        );
    } else {
        $response = array(
            'success' => false,
            'error' => 'Failed to Update nurse!',
        );
    }

    echo json_encode($response);
}








 public function DeleteNurse()
	{
		$id = $_POST['id'];

				
		$data=[
				'status' => '0'
			  ];
			$update_status_nur = $this->nurse->update_nurse_status($data, $id);

				if($update_status_nur)
				{
						$response = array(
							'success' => true,
							'message' => 'Nurse Deleted successfully!',
						);	
					}else{
						$response = array(
							'success' => false,
							'message' => 'Failed To Delete Nurse!',
						);
					}
           echo json_encode($response);


	}


	



	



}



