
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tujuan extends CI_Controller {
	public function __construct() {
    parent::__construct();
	  	if($this->session->userdata('login') != TRUE) {
	  		redirect('');
	  	}
	}

	public function index(){
		$id_admin = $this->session->userdata('id_admin');
		$data['pemakai'] = $this->M_codeigniter->get('tbl_pemakai')->result();
		$data['divisi'] = $this->M_codeigniter->get('tbl_divisi')->result();
		$data['jenis'] = $this->M_codeigniter->get('tbl_jenis_kendaraan')->result();
		$data['content_header'] = 'Form Master Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Kendaraan',base_url('Kendaraan')),
		);
		$data['content'] = 'kendaraan';
		$data['js_file'] = 'kendaraan';
		$this->load->view('component/main', $data);
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