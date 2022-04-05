<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
    parent::__construct();
  	if($this->session->userdata('login') != TRUE) {
  		redirect('');
  	}
  }

	public function index(){
		
		$data['jumlahkendaraan'] = $this->M_codeigniter->query("
			SELECT count(*) as jumlahkendaraan
			FROM tbl_kendaraan where active = 0
		")->result();

		$data['jumlahchasis'] = $this->M_codeigniter->query("
			SELECT count(*) as jumlahchasis
			FROM tbl_chasis where active = 0
		")->result();

		$data['jumlahdriverk'] = $this->M_codeigniter->query("
			SELECT count(*) as jumlahdriverk
			FROM tbl_driver where jns_kendaraan = 'besar'
		")->result();

		$data['jumlahdriverb'] = $this->M_codeigniter->query("
			SELECT count(*) as jumlahdriverb
			FROM tbl_driver where jns_kendaraan = 'besar'
		")->result();

		// $data['jenisuser'] = $this->M_codeigniter->query("
		// 	SELECT nik_u as nama_mlevel,count(*) as jumlah
		// 	FROM tbl_user_c 
		// 	group by id_u
		// ")->result();

		// $data['jmllulus'] = $this->M_codeigniter->query("
		// 	SELECT nik_u as keterangan,COUNT(*) AS jml FROM tbl_user_c
		// 	GROUP BY id_u
		// ")->result();
		
		$data['kendaraanactive'] = $this->M_codeigniter->query("
				SELECT k.nopol,j.nama_jenis,COUNT(*) AS jml FROM tbl_suratjalan s JOIN tbl_kendaraan k ON s.kendaraan = k.id
				LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis
				LEFT JOIN tbl_p_kendaraan p ON p.fk_nosj = s.id
				WHERE s.proses > 0 AND p.tglberangkat > DATE_SUB(CURDATE(), INTERVAL 2 MONTH)
				GROUP BY k.id;
		")->result();	
		
		$data['kegiataninspeksi'] = $this->M_codeigniter->query("
			SELECT namastnk AS nama_u,COUNT(*) AS jmlinspeksi FROM		
			tbl_kendaraan group by namastnk
		")->result();

		$data['content_header'] = 'Dashboard';
		$data['breadcrumb'] = array(
			array('Dashboard',base_url('Dashboard')),
		);
		$data['content'] = 'dashboard';
		$data['js_file'] = 'dashboard';

		$this->load->view('component/main',$data);
	}


}
