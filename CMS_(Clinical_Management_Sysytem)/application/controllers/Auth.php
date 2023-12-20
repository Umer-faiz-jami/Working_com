<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'User_model', 'user' );
        $this->load->helper( 'form' );
        $this->load->library( 'form_validation' );
        $this->load->library( 'session' );
    }

    public function index()
    {
        $this->load->view( 'login' );

    }

    public function signup()

    {

        $this->form_validation->set_rules( 'first_name', 'First Name', 'required' );

        $this->form_validation->set_rules( 'last_name', 'Last Name', 'required' );

        $this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email' );
        $this->form_validation->set_rules( 'password', 'Password', 'trim|required|min_length[6]' );
        $this->form_validation->set_rules( 'confirm_password', 'Confirm Password', 'trim|required|matches[password]' );

        if ( $this->form_validation->run() == false ) {

            $this->load->view( 'sign_in' );
        } else {
            $email = $this->input->post( 'email' );

            if ($this->user->get_user_by_email( $email ) ) {

                $this->session->set_flashdata( 'error', 'Email is already taken.' );
                $this->load->view( 'sign_in' );

            } else {

                $data = array(
                    'first_name' => $this->input->post( 'first_name' ),
                    'last_name' => $this->input->post( 'last_name' ),
                    'email' => $email,
                    'password' => password_hash( $this->input->post( 'password' ), PASSWORD_BCRYPT ),

                );

                $insertion = $this->user->register_user( $data );

                if ( $insertion ) {

                    $this->session->set_flashdata( 'success', 'User registered successfully.' );
                    $this->load->view( 'sign_in' );

                } else {
                    $this->session->set_flashdata( 'error', 'Error occurred while registering user.' );
                    $this->load->view( 'sign_in' );

                }
            }
        }
    }

    public function Register()
    {
        $this->load->view( 'sign_in' );
    }

    public function login() {

        $this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email' );
        $this->form_validation->set_rules( 'password', 'Password', 'trim|required' );

        if ( $this->form_validation->run() == false ) {

            $this->load->view( 'login' );
        } else {

            $email = $this->input->post( 'email' );
            $password = $this->input->post( 'password' );
              // print($password);exit;
            $user = $this->user->get_user_by_email( $email );
			
            $new_password = password_verify( $password, $user->password );
			// print($new_password);exit;
            if ( $user && $new_password ) {

                $user_data = array(
                    'user_id' => $user->user_id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'image' => $user->image

                );
                $this->session->set_userdata( 'user_data', $user_data );
                $this->session->set_flashdata( 'success', 'Logged In Successfully.' );

                redirect( 'Dashboard/index' );

            } else {

                $this->session->set_flashdata( 'error', 'Invalid email or password.' );
                $this->load->view( 'login' );

            }
        }
    }

    public function logout() {

        $this->session->sess_destroy();

        $this->session->set_flashdata( 'success', 'You have been successfully logged out.' );

        $this->load->view( 'login' );
    }

}
