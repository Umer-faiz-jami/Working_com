<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'profile_model', 'profile' );
        $this->load->helper( 'form' );
        $this->load->library( 'form_validation' );
        $this->load->library( 'session' );

    }

    public function index()
    {
        $u_id = $this->session->userdata( 'user_data' )[ 'user_id' ];

        $data[ 'title' ] = 'Profile';
        $data[ 'page' ] = 'profile';

        $data[ 'user' ] = $this->profile->get_data( $u_id );
        
        $this->load->view( 'content', $data );

    }




    public function update()
    {
		$this->load->library('upload');

        $first_name = $this->input->post( 'first_name' );
        $last_name = $this->input->post( 'last_name' );
        $about = $this->input->post( 'about' );
        $gender = $this->input->post( 'gender' );

        if ($_FILES['file']['name'] ) {

            $config['upload_path'] = './upload/image/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = true;

            $this->upload->initialize( $config );
            if ( $this->upload->do_upload('file') ) {
                $upload_data = $this->upload->data();
                $image_filename = $upload_data[ 'file_name' ];
                $data = [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'about'   => $about,
                    'image'   => $image_filename,
					'Gender' => $gender
                ];
                $u_id = $this->session->userdata( 'user_data' )[ 'user_id' ];

                $name_update = $this->profile->update_name( $data, $u_id );
                if ( $name_update )
                {

                    $this->session->set_flashdata( 'success', 'Profile Updated successfully.' );

                    redirect( 'Profile/index' );

                } else {
                    $this->session->set_flashdata( 'error', 'Failed! to Update.' );
                    redirect( 'Profile/index' );

                }
            } else {
                $upload_error = $this->upload->display_errors();
                $this->session->set_flashdata( 'error', 'Image upload failed: ' . $upload_error );
                redirect( 'Profile/index' );

            }
        } else {

            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'about'   => $about,
				'Gender' => $gender

            ];
            $u_id = $this->session->userdata( 'user_data' )[ 'user_id' ];

            $name_update = $this->profile->update_name( $data, $u_id );
            if ( $name_update ) {

                $this->session->set_flashdata( 'success', 'Profile Updated successfully.' );

                redirect( 'Profile/index' );

            } else {
                $this->session->set_flashdata( 'error', 'Failed! to Update.' );
                redirect( 'Profile/index' );

            }
        }

    }

}
