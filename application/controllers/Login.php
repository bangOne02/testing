<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		if($this->session->userdata('login') != TRUE) {
			$this->load->view('Login/index');
  	}else{
  		redirect('Dashboard');
  	}
	}

	function loginCek(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$get_user = $this->M_codeigniter->get_where('tbl_admin' , array('username' => $username));

		if($get_user->num_rows() > 0){
			$get_user = $get_user->result()[0];

			if(password_verify($password, $get_user->userpassword)){
				$set_session = array(
					'login' 			=> true,
					'id_admin' 		=> $get_user->id_admin,
					'password' => $get_user->userpassword,
					'admin_name' 	=> $get_user->admin_name,
					'username' => $get_user->admin_name,
					'fk_plant' 	=> $get_user->fk_plant
				);

				$this->session->set_userdata($set_session);

				redirect('Dashboard');
			}else{
				$this->session->set_flashdata('error', 'PASSWORD ANDA SALAH');
                redirect($_SERVER['HTTP_REFERER']);
			}
		} else
		{
			$user = $this->load->database('user', TRUE); 

			$get_user = $user->get_where('users' , array('nid' => $username));

			if($get_user->num_rows() > 0){
				$get_user = $get_user->result()[0];

				if(password_verify($password, $get_user->password)){
					$set_session = array(
						'login' 			=> true,
						'id_admin' 		=> $get_user->nid,
						'password' => $get_user->userpassword,
						'admin_name' 	=> 'userkendaraan',
						'username' => $get_user->fullname,
						'fk_plant' 	=> $get_user->fk_plant
					);

					$this->session->set_userdata($set_session);

					redirect('Dashboard');
				}else{
					$this->session->set_flashdata('error', 'PASSWORD ANDA SALAH');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		$this->session->set_flashdata('error', 'USERNAME TIDAK TERDAFTAR');
        redirect($_SERVER['HTTP_REFERER']);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}

}