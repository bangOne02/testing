
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct() {
    parent::__construct();
	  	if($this->session->userdata('login') != TRUE) {
	  		redirect('');
	  	}
	}

	public function index(){
		$id_admin = $this->session->userdata('id_admin');
		$data['content_header'] = 'Form Ganti Password';
		$data['breadcrumb'] = array(
			array('Ganti Password',base_url('Users')),
		);
		$data['content'] = 'gantipassword';
		$data['js_file'] = 'users';
		$this->load->view('component/main', $data);
	}

	public function gantiPassword(){
		$id_admin = $this->session->userdata('id_admin');
		$data['content_header'] = 'Form Ganti Password';
		$data['breadcrumb'] = array(
			array('Ganti Password',base_url('Users')),
		);
		$data['content'] = 'gantipassword';
		$data['js_file'] = 'users';
		$this->load->view('component/main', $data);
	}

	public function prosesUpdatePass(){
		$userpassword = $this->session->userdata('password');
		$idadmin = $this->session->userdata('id_admin');

		if (!password_verify($this->input->post('old_password'), $userpassword)) {
            $this->session->set_flashdata('error', 'Password lama anda salah');
            return redirect($_SERVER['HTTP_REFERER']);
        }

        // Cek password confirm sama
        if ($this->input->post('password') != $this->input->post('password_confirm')) {
            $this->session->set_flashdata('error', 'Password baru dan Konfirmasi password tidak sama');
            return redirect($_SERVER['HTTP_REFERER']);
        }

        $this->load->model('users_model');
        if (!$this->users_model->update_password($idadmin, $this->input->post('password'))) {
            $this->session->set_flashdata('success', 'Password gagal diubah');
            return redirect($_SERVER['HTTP_REFERER']);
        }

        $this->session->set_flashdata('success', 'Password berhasil diubah');
        redirect(base_url('login/logout'));
	}

	function myList(){
		$id = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("SELECT k.id,k.nopol,j.nama_jenis,k.tahun,k.ukuran,d.`nama_divisi`,p.`nama` FROM tbl_kendaraan k LEFT JOIN tbl_divisi d ON k.divisi = d.id 
						LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id LEFT JOIN tbl_pemakai p ON p.id = k.pemakai")->result();
		$output = array(
			'html' => $this->load->view('list_kendaraan', $data, true),
		);
		echo json_encode($output);
	}


}