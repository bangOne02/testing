
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {
	public function __construct() {
    	parent::__construct();
		$this->load->model('web_model');
	  	if($this->session->userdata('login') != TRUE) {
	  		redirect('');
	  	}
	}

	public function index(){
		$id_admin = $this->session->userdata('id_admin');
		//$data['pemakai'] = $this->M_codeigniter->get('tbl_pemakai')->result();
		$data['divisi'] = $this->M_codeigniter->get('tbl_divisi')->result();
		$data['jenis'] = $this->M_codeigniter->get('tbl_jenis_kendaraan')->result();
		$data['kendaraan'] = $this->M_codeigniter->get('tbl_kendaraan')->result();
		$data['content_header'] = 'Form Master Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Kendaraan',base_url('Kendaraan')),
		);
		$data['content'] = 'kendaraan';
		$data['js_file'] = 'kendaraan';
		$this->load->view('component/main', $data);
	}

	public function dataJenis(){
		$id_admin = $this->session->userdata('id_admin');
		//$data['pemakai'] = $this->M_codeigniter->get('tbl_pemakai')->result();
		$data['divisi'] = $this->M_codeigniter->get('tbl_divisi')->result();
		$data['jenis'] = $this->M_codeigniter->get('tbl_jenis_kendaraan')->result();
	//	$data['kendaraan'] = $this->M_codeigniter->get('tbl_master_')->result();
		$data['content_header'] = 'Form Master Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Kendaraan',base_url('Kendaraan')),
		);
		$data['content'] = 'jenis';
		$data['js_file'] = 'kendaraan';
		$this->load->view('component/main', $data);
	}

	public function dataOperasional(){
		$id_admin = $this->session->userdata('id_admin');
		//$data['pemakai'] = $this->M_codeigniter->get('tbl_pemakai')->result();
		$data['kendaraan'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.ukuran = 'kecil' and k.operasional is null order by k.operasional asc
		")->result();
		$data['kendaraan1'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.operasional = 1
		")->result()[0];
		$data['kendaraan2'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.operasional = 2
		")->result()[0];
		$data['kendaraan3'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.operasional = 3
		")->result()[0];
		$data['kendaraan4'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.operasional = 4
		")->result()[0];
		$data['kendaraan5'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.operasional = 5
		")->result()[0];
		$data['kendaraan6'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.operasional = 6
		")->result()[0];
		$data['kendaraan7'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.operasional = 7
		")->result()[0];
		$data['kendaraan8'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.operasional = 8
		")->result()[0];
		$data['kendaraan9'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.operasional = 9
		")->result()[0];
	//	$data['kendaraan'] = $this->M_codeigniter->get('tbl_master_')->result();
		$data['content_header'] = 'Form Kendaraan Operasional';
		$data['breadcrumb'] = array(
			array('Form Kendaraan',base_url('Kendaraan')),
		);
		$data['content'] = 'operasional';
		$data['js_file'] = 'kendaraan';
		$this->load->view('component/main', $data);
	}

	public function requestKendaraan(){
		$id_admin = $this->session->userdata('id_admin');
		//$data['pemakai'] = $this->M_codeigniter->get('tbl_pemakai')->result();
		// $data['divisi'] = $this->M_codeigniter->get('tbl_divisi')->result();
		// $data['jenis'] = $this->M_codeigniter->get('tbl_jenis_kendaraan')->result();
		$data['request'] = $this->M_codeigniter->get('tbl_request_user')->result();
		$data['content_header'] = 'Form Request Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Request Kendaraan',base_url('requestKendaraan')),
		);
		$data['content'] = 'requestKendaraan';
		$data['js_file'] = 'jadwal';
		$this->load->view('component/main', $data);
	}

	public function histCont(){
		$id_admin = $this->session->userdata('id_admin');
	
		$data['content_header'] = 'Form Request Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Request Kendaraan',base_url('requestKendaraan')),
		);
		$data['content'] = 'hist_cont';
		$data['js_file'] = 'jadwal';
		$this->load->view('component/main', $data);
	}

	public function jadwalKeberangkatan(){
		$tanggal = $this->input->get('tanggal');
		$id_admin = $this->session->userdata('id_admin');
		$data['kend1'] = $this->M_codeigniter->query("SELECT r.*,TIME_TO_SEC(timestart) AS `start`,TIME_TO_SEC(timefinish) AS finish,d.nama_mdriver,d.no_hp,k.nopol,j.nama_jenis,s.proses
		FROM tbl_request_user r LEFT JOIN tbl_kendaraan k ON r.kendaraan = k. id 
		LEFT JOIN tbl_driver d ON r.driver = d.id_mdriver
		LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis
		LEFT  JOIN tbl_suratjalan s ON s.id = r.idsj
		WHERE r.status = 1 AND k.operasional = 1 and r.tanggal = '".$tanggal."'")->result();
		$data['kend2'] = $this->M_codeigniter->query("SELECT r.*,TIME_TO_SEC(timestart) AS `start`,TIME_TO_SEC(timefinish) AS finish,d.nama_mdriver,d.no_hp,k.nopol,j.nama_jenis,s.proses
		FROM tbl_request_user r LEFT JOIN tbl_kendaraan k ON r.kendaraan = k. id 
		LEFT JOIN tbl_driver d ON r.driver = d.id_mdriver
		LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis
		LEFT  JOIN tbl_suratjalan s ON s.id = r.idsj
		WHERE r.status = 1 AND k.operasional = 2 and r.tanggal = '".$tanggal."'")->result();
		$data['kend3'] = $this->M_codeigniter->query("SELECT r.*,TIME_TO_SEC(timestart) AS `start`,TIME_TO_SEC(timefinish) AS finish,d.nama_mdriver,d.no_hp,k.nopol,j.nama_jenis,s.proses
		FROM tbl_request_user r LEFT JOIN tbl_kendaraan k ON r.kendaraan = k. id 
		LEFT JOIN tbl_driver d ON r.driver = d.id_mdriver
		LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis
		LEFT  JOIN tbl_suratjalan s ON s.id = r.idsj
		WHERE r.status = 1 AND k.operasional = 3 and r.tanggal = '".$tanggal."'")->result();
		$data['kend4'] = $this->M_codeigniter->query("SELECT r.*,TIME_TO_SEC(timestart) AS `start`,TIME_TO_SEC(timefinish) AS finish,d.nama_mdriver,d.no_hp,k.nopol,j.nama_jenis,s.proses
		FROM tbl_request_user r LEFT JOIN tbl_kendaraan k ON r.kendaraan = k. id 
		LEFT JOIN tbl_driver d ON r.driver = d.id_mdriver
		LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis
		LEFT  JOIN tbl_suratjalan s ON s.id = r.idsj
		WHERE r.status = 1 AND k.operasional = 4 and r.tanggal = '".$tanggal."'")->result();
		$data['kend5'] = $this->M_codeigniter->query("SELECT r.*,TIME_TO_SEC(timestart) AS `start`,TIME_TO_SEC(timefinish) AS finish,d.nama_mdriver,d.no_hp,k.nopol,j.nama_jenis,s.proses
		FROM tbl_request_user r LEFT JOIN tbl_kendaraan k ON r.kendaraan = k. id 
		LEFT JOIN tbl_driver d ON r.driver = d.id_mdriver
		LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis
		LEFT  JOIN tbl_suratjalan s ON s.id = r.idsj
		WHERE r.status = 1 AND k.operasional = 5 and r.tanggal = '".$tanggal."'")->result();
		$data['kend6'] = $this->M_codeigniter->query("SELECT r.*,TIME_TO_SEC(timestart) AS `start`,TIME_TO_SEC(timefinish) AS finish,d.nama_mdriver,d.no_hp,k.nopol,j.nama_jenis,s.proses
		FROM tbl_request_user r LEFT JOIN tbl_kendaraan k ON r.kendaraan = k. id 
		LEFT JOIN tbl_driver d ON r.driver = d.id_mdriver
		LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis
		LEFT  JOIN tbl_suratjalan s ON s.id = r.idsj
		WHERE r.status = 1 AND k.operasional = 6 and r.tanggal = '".$tanggal."'")->result();
		$data['kend7'] = $this->M_codeigniter->query("SELECT r.*,TIME_TO_SEC(timestart) AS `start`,TIME_TO_SEC(timefinish) AS finish,d.nama_mdriver,d.no_hp,k.nopol,j.nama_jenis,s.proses
		FROM tbl_request_user r LEFT JOIN tbl_kendaraan k ON r.kendaraan = k. id 
		LEFT JOIN tbl_driver d ON r.driver = d.id_mdriver
		LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis
		LEFT  JOIN tbl_suratjalan s ON s.id = r.idsj
		WHERE r.status = 1 AND k.operasional = 7 and r.tanggal = '".$tanggal."'")->result();
		$data['kend8'] = $this->M_codeigniter->query("SELECT r.*,TIME_TO_SEC(timestart) AS `start`,TIME_TO_SEC(timefinish) AS finish,d.nama_mdriver,d.no_hp,s.proses
		FROM tbl_request_user r 
		LEFT JOIN tbl_driver d ON r.driver = d.id_mdriver
		LEFT  JOIN tbl_suratjalan s ON s.id = r.idsj
		WHERE r.status = 1 AND r.kendaraan = 9999 and r.tanggal = '".$tanggal."'")->result();
		$data['kend9'] = $this->M_codeigniter->query("SELECT r.*,TIME_TO_SEC(timestart) AS `start`,TIME_TO_SEC(timefinish) AS finish,d.nama_mdriver,d.no_hp,k.nopol,j.nama_jenis,s.proses
		FROM tbl_request_user r LEFT JOIN tbl_kendaraan k ON r.kendaraan = k. id 
		LEFT JOIN tbl_driver d ON r.driver = d.id_mdriver
		LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis
		LEFT  JOIN tbl_suratjalan s ON s.id = r.idsj
		WHERE r.status = 1 AND k.operasional = 8 and r.tanggal = '".$tanggal."'")->result();
		$data['kend10'] = $this->M_codeigniter->query("SELECT r.*,TIME_TO_SEC(timestart) AS `start`,TIME_TO_SEC(timefinish) AS finish,d.nama_mdriver,d.no_hp,k.nopol,j.nama_jenis,s.proses
		FROM tbl_request_user r LEFT JOIN tbl_kendaraan k ON r.kendaraan = k. id 
		LEFT JOIN tbl_driver d ON r.driver = d.id_mdriver
		LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis
		LEFT  JOIN tbl_suratjalan s ON s.id = r.idsj
		WHERE r.status = 1 AND k.operasional = 9 and r.tanggal = '".$tanggal."'")->result();
		$data['kendaraan1'] = $this->M_codeigniter->query("SELECT k.* FROM tbl_kendaraan k where k.operasional = 1")->result()[0];
		$data['kendaraan2'] = $this->M_codeigniter->query("SELECT k.* FROM tbl_kendaraan k where k.operasional = 2")->result()[0];
		$data['kendaraan3'] = $this->M_codeigniter->query("SELECT k.* FROM tbl_kendaraan k where k.operasional = 3")->result()[0];
		$data['kendaraan4'] = $this->M_codeigniter->query("SELECT k.* FROM tbl_kendaraan k where k.operasional = 4")->result()[0];
		$data['kendaraan5'] = $this->M_codeigniter->query("SELECT k.* FROM tbl_kendaraan k where k.operasional = 5")->result()[0];
		$data['kendaraan6'] = $this->M_codeigniter->query("SELECT k.* FROM tbl_kendaraan k where k.operasional = 6")->result()[0];
		$data['kendaraan7'] = $this->M_codeigniter->query("SELECT k.* FROM tbl_kendaraan k where k.operasional = 7")->result()[0];
		$data['kendaraan8'] = $this->M_codeigniter->query("SELECT k.* FROM tbl_kendaraan k where k.operasional = 8")->result()[0];
		$data['kendaraan9'] = $this->M_codeigniter->query("SELECT k.* FROM tbl_kendaraan k where k.operasional = 9")->result()[0];
		// $data['conf'] = $this->M_codeigniter->get('tbl_conf')->result();
		$data['conf'] = $this->M_codeigniter->query("SELECT * from tbl_conf order by id asc")->result();
		$data['content_header'] = 'Jadwal Keberangkatan Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Request Kendaraan',base_url('jadwalKeberangkatan')),
		);
		$data['content'] = 'jadwal_keberangkatan';
		$data['js_file'] = 'jadwal';
		$this->load->view('component/main', $data);
	}

	public function insertRequest(){
		$id_admin = $this->session->userdata('id_admin');
		//$data['pemakai'] = $this->M_codeigniter->get('tbl_pemakai')->result();
		// $data['divisi'] = $this->M_codeigniter->get('tbl_divisi')->result();
		// $data['jenis'] = $this->M_codeigniter->get('tbl_jenis_kendaraan')->result();
		$data['request'] = $this->M_codeigniter->get('tbl_request_user')->result();
		$data['content_header'] = 'Form Request Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Request Kendaraan',base_url('requestKendaraan')),
		);
		$data['content'] = 'requestKendaraan';
		$data['js_file'] = 'jadwal';
		$this->load->view('component/main', $data);
	}

	public function insertContainer(){
		$id_admin = $this->session->userdata('id_admin');
		$nomorcontainer = strtoupper(preg_replace('/\s+/', '', $this->input->post('nomorcontainer')));

		$ex = $this->M_codeigniter->get_where('tbl_container_rent' , array('container' => $nomorcontainer,'active' => 0));

		$insert = false;
		if ($ex->num_rows() < 1)
		{
			$data_send_1 = array(
				'container'=> $nomorcontainer,
				'userupdate'=> $id_admin,
				'dateupdate'=> date('Y-m-d H:i:s')
			);

			$insert = $this->M_codeigniter->insert('tbl_container_rent', $data_send_1);
		} 

		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}

	public function insertDataSuhu(){
		$id_admin = $this->session->userdata('id_admin');
		$id = $this->input->post('idcontainer');
		$pic = $this->input->post('pic');
		$suhu = $this->input->post('suhu');
		$tanggal = date('Y-m-d',strtotime($this->input->post('tanggal')));
		$jam = $this->input->post('jam');
		$keterangan = $this->input->post('nketerangan');
		
		if ($keterangan == '9999')
		{
			$keterangan = $this->input->post('oketerangan');
		}
		
		
		$data_send_1 = array(
				'pic'=> $pic,
				'suhu'=> $suhu,
				'keterangan'=> $keterangan,
				'tanggal'=> $tanggal,
				'jam'=> $jam,
				'idcontainer'=> $id,
				'insert_by'=> $id_admin
		);

		$insert = $this->M_codeigniter->insert('tbl_suhu', $data_send_1);

		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}

	public function myListRequest(){
		$id_admin = $this->session->userdata('id_admin');
		$admin_name = $this->session->userdata('admin_name');
		if ($admin_name == 'userkendaraan')
		{
		 //   $data['table'] = $this->M_codeigniter->query("SELECT * from tbl_request_user where tanggal >= CURDATE() and nid = '".$id_admin."'")->result();
			$data['table'] = $this->M_codeigniter->query("SELECT * from tbl_request_user where nid = '".$id_admin."'")->result();
		} else
		{
		    $data['table'] = $this->M_codeigniter->query("SELECT * from tbl_request_user where tanggal >= CURDATE()")->result();
			//$data['table'] = $this->M_codeigniter->query("SELECT * from tbl_request_user")->result();
		}

	
		$output = array(
			'html' => $this->load->view('list_request_user', $data, true),
		);
		echo json_encode($output);
	}

	public function myListSuhu(){
		$nocontainer = $this->input->post('nocontainer');
		$data['table'] = $this->M_codeigniter->query("SELECT s.*,a.fk_plant from tbl_suhu s left join tbl_admin a on a.id_admin = s.insert_by where s.idcontainer = '".$nocontainer."'")->result();
		$output = array(
			'html' => $this->load->view('list_suhu', $data, true),
		);
		echo json_encode($output);
	}

	public function myListMuatan(){
		$nocontainer = $this->input->post('nocontainer');
		$data['table'] = $this->M_codeigniter->query("SELECT *,IFNULL(p.`nama_mpelabuhan`,IFNULL(dp.`nama_mdepo`,IFNULL(pt.`nama_mplant`,sj.tujuan))) as tujuann FROM tbl_suratjalan sj LEFT JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = sj.`tujuan`
		LEFT JOIN tbl_depo dp ON dp.id_mdepo = sj.`tujuan` 
		LEFT JOIN tbl_plant pt ON pt.`id_mplant` = sj.`tujuan`  WHERE sj.nocontainer = '".$nocontainer."' and sj.active = 0")->result();
		$output = array(
			'html' => $this->load->view('list_muatan', $data, true),
		);
		echo json_encode($output);
	}

	function myList(){
		$id = $this->input->post('id');
		$data['table'] = $this->web_model->listKendaraan();
		$output = array(
			'html' => $this->load->view('list_kendaraan', $data, true),
		);
		echo json_encode($output);
	}

	function myListJenis(){
		$id = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("SELECT * from tbl_jenis_kendaraan where active = 0")->result();
		$output = array(
			'html' => $this->load->view('list_jenis', $data, true),
		);
		echo json_encode($output);
	}

	public function inputContainer(){
		$idcontainer = $this->input->get('idcontainer');
		$nocontainer = $this->input->get('nocontainer');
		$data['content_header'] = 'Input Suhu Container';
		$data['breadcrumb'] = array(
			array('Form Input Suhu',base_url(''))
		);
		$data['content'] = 'input_suhu';
		$data['idcontainer'] = $idcontainer;
		$data['nocontainer'] = $nocontainer;
		$data['js_file'] = 'jadwal';
		$this->load->view('component/main', $data);
	}

	public function detailContainer(){
		$idcontainer = $this->input->get('idcontainer');
		$nocontainer = $this->input->get('nocontainer');
		$data['content_header'] = 'Detail Container';
		$data['breadcrumb'] = array(
			array('Detail Container',base_url(''))
		);
		$data['content'] = 'detail_container';
		$data['idcontainer'] = $idcontainer;
		$data['nocontainer'] = $nocontainer;
		$data['js_file'] = 'jadwal';
		$this->load->view('component/main', $data);
	}

	function myListCont(){
		// $id = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT c.id,c.container,
			(
			SELECT CONCAT(LPAD(s.id, 5, 0),' / ',a.fk_plant) AS tujuan
			FROM tbl_suratjalan s LEFT JOIN tbl_p_kedatangan pk ON s.id = pk.fk_idsj
			LEFT JOIN tbl_depo d ON d.`id_mdepo` = s.`tujuan`
			LEFT JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = s.`tujuan`
			LEFT JOIN tbl_plant pl ON pl.`id_mplant` = s.`tujuan`
			LEFT JOIN tbl_admin a ON a.id_admin = pk.insert_by 
			WHERE pk.nocontainer = c.id AND s.proses = 2 ORDER BY s.id DESC LIMIT 1
			) AS lokasi
			FROM
			(
			SELECT id,container FROM tbl_container WHERE active = 0
			UNION
			SELECT id,container FROM tbl_container_rent WHERE active = 0
			) AS c
		")->result();
		$data['table2'] = $this->M_codeigniter->query("
			SELECT id,container,dateupdate FROM tbl_container WHERE active = 1
			UNION
			SELECT id,container,dateupdate FROM tbl_container_rent WHERE active = 1
		")->result();
		$output = array(
			'html' => $this->load->view('list_hist_cont', $data, true),
		);
		echo json_encode($output);
	}

	function insertData(){
		$id_admin = $this->session->userdata('id_admin');
		$insert = false;
		$nopol = preg_replace('/\s+/', '', $this->input->post('nopol'));
		$cek = $this->M_codeigniter->get_where('tbl_kendaraan', array('nopol' => $nopol,'active' => 0))->num_rows();
		if($cek == 0){
			$nopol = $nopol;
			//$nopol_lama = $this->input->post('nopol_lama');
			$no_asset = $this->input->post('no_asset');
			$jenis = $this->input->post('jenis');
			$no_rangka = $this->input->post('no_rangka');
			$no_mesin = $this->input->post('no_mesin');
			$tahun = $this->input->post('tahun');
			$an_stnk = $this->input->post('an_stnk');
			$tgl_stnk = $this->input->post('tgl_stnk');
			$ukuran = $this->input->post('jeniskendaraan');
			$kir = $this->input->post('kir');
			$costcenter = $this->input->post('costcenter');
			$divisi = $this->input->post('divisi');
			$data_send_1 = array(
					'noasset'=> $no_asset,
					'nopol'=> $nopol,
					'jenis'=> $jenis,
					'nomor_rangka'=> $no_rangka,
					'nomor_mesin'=> $no_mesin,
					'tahun'=> $tahun,
					'namastnk'=> $an_stnk,
					'ukuran'=> strtoupper($ukuran),
					'habisstnk'=> $tgl_stnk,
					'kir'=> $kir,
					//'nopollama'=> $nopol_lama,
					'costcenter'=> $costcenter,
					'divisi'=> $divisi,
					'userinsert'=> $id_admin 
				);
			$insert = $this->M_codeigniter->insert('tbl_kendaraan', $data_send_1);
		}	

		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}

	function insertDataRequest(){
		$id_admin = $this->session->userdata('id_admin');
		$username = $this->session->userdata('username');

		//$namauser = $this->input->post('namauser');
		$keperluan = $this->input->post('keperluan');
		$extension = $this->input->post('extension');
		$jumlah = $this->input->post('jumlah');
		$tanggalrequest = $this->input->post('tanggalrequest');
		$jamrequest = $this->input->post('jamrequest');
		$data_send_1 = array(
				'user'=> $username,
				'nid'=> $id_admin,
				'tanggal'=> $tanggalrequest,
				'timestart'=> $jamrequest,
				'keterangan'=> $keperluan,
				'jumlah'=> $jumlah,
				'ext'=> $extension
		);

		$insert = $this->M_codeigniter->insert('tbl_request_user', $data_send_1);

		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}

	function insertDataJenis(){
		$id_admin = $this->session->userdata('id_admin');
		
		$namajenis = $this->input->post('namajenis');
			
		$data_send_1 = array(
				'nama_jenis'=> $namajenis
		);
		
		$insert = $this->M_codeigniter->insert('tbl_jenis_kendaraan', $data_send_1);
	

		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}

	function formUpdate(){
		$id = $this->input->post('id');
		//$data['pemakai'] = $this->M_codeigniter->get('tbl_pemakai')->result();
		$data['divisi'] = $this->M_codeigniter->get('tbl_divisi')->result();
		$data['jenis'] = $this->M_codeigniter->get('tbl_jenis_kendaraan')->result();
		
		$data['kendaraan'] = $this->M_codeigniter->query("
			SELECT kk.nopol
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			left join tbl_kendaraan kk on kk.id = k.nopollama
			where k.id = '".$id."'
		")->result()[0];
		$data['table'] = $this->M_codeigniter->get_where('tbl_kendaraan', array('id' => $id))->result()[0];
		$output = array(
			'html' => $this->load->view('update_kendaraan',$data,true),
		);
		echo json_encode($output);
	}

	function formApprove(){
		$id = $this->input->post('id');
		//$data['pemakai'] = $this->M_codeigniter->get('tbl_pemakai')->result();
		$data['kendaraan'] = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis,k.operasional
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			where k.ukuran = 'kecil' and k.operasional is not null order by k.operasional asc
		")->result();
		$data['suratjalan'] = $this->M_codeigniter->query("
			SELECT id,nomorsj from tbl_suratjalan where active = 0 and proses = 0
		")->result();
		$data['driver'] = $this->M_codeigniter->get_where('tbl_driver', array('jns_kendaraan' => 'kecil'))->result();
		$data['request'] = $this->M_codeigniter->query("
			SELECT * from tbl_request_user
			where id = '".$id."'
		")->result()[0];
		$output = array(
			'html' => $this->load->view('update_approve',$data,true),
		);
		echo json_encode($output);
	}

	function prosesUpdateApprove(){
		$id = $this->input->post('id');
		$id_admin = $this->session->userdata('id_admin');
		$kendaraan = $this->input->post('kendaraan');
		$driver = $this->input->post('driver');
		$jamfinish = $this->input->post('jamfinish');
		//$idsj = $this->input->post('idsj');

		$cek = $this->M_codeigniter->get_where('tbl_request_user', array('id' => $id))->num_rows();
		if($cek == 1){
				$data_send_1 = array(
						'kendaraan'=> $kendaraan,
						'driver'=> $driver,
						'timefinish'=> $jamfinish,
						'status'=> 1,
					//	'idsj' => $idsj,
						'userapprove' => $id_admin,
						'dateapprove' => date('Y-m-d H:i:s')
					);
				$insert = $this->M_codeigniter->update('tbl_request_user', $data_send_1, array('id' => $id));
		}else{$insert=false;}

		if($insert){
			$output = array(
				'status' => 1,
			);
		}else{
			$output = array(
				'status' => 0
			);
		}
		echo json_encode($output);

	}

	function updateDataOperasional(){
		function array_not_unique($raw_array) {
			$dupes = array();
			natcasesort($raw_array);
			reset($raw_array);
		
			$old_key   = NULL;
			$old_value = NULL;
			foreach ($raw_array as $key => $value) {
				if ($value === NULL) { continue; }
				if (strcasecmp($old_value, $value) === 0) {
					$dupes[$old_key] = $old_value;
					$dupes[$key]     = $value;
				}
				$old_value = $value;
				$old_key   = $key;
			}
			return $dupes;
		}

		$raw_array    = array();
		
		$raw_array[1] = $kendaraan1 = $this->input->post('kendaraan1');
		$raw_array[2] = $kendaraan2 = $this->input->post('kendaraan2');
		$raw_array[3] = $kendaraan3 = $this->input->post('kendaraan3');
		$raw_array[4] = $kendaraan4 = $this->input->post('kendaraan4');
		$raw_array[5] = $kendaraan5 = $this->input->post('kendaraan5');
		$raw_array[6] = $kendaraan6 = $this->input->post('kendaraan6');
		$raw_array[7] = $kendaraan7 = $this->input->post('kendaraan7');
		$raw_array[8] = $kendaraan8 = $this->input->post('kendaraan8');
		$raw_array[9] = $kendaraan9 = $this->input->post('kendaraan9');

		$common_stuff = array_not_unique($raw_array);

		if (count($common_stuff) > 1)
		{
			$output = array(
					'status' => 0,
		    );
		} else
		{
			$data_send_1 = array('operasional'=> null);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_1, array('operasional' => 1));
			$data_send_2 = array('operasional'=> null);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_2, array('operasional' => 2));
			$data_send_3 = array('operasional'=> null);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_3, array('operasional' => 3));
			$data_send_4 = array('operasional'=> null);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_4, array('operasional' => 4));
			$data_send_5 = array('operasional'=> null);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_5, array('operasional' => 5));
			$data_send_6 = array('operasional'=> null);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_6, array('operasional' => 6));
			$data_send_7 = array('operasional'=> null);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_7, array('operasional' => 7));
			$data_send_8 = array('operasional'=> null);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_8, array('operasional' => 8));
			$data_send_9 = array('operasional'=> null);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_9, array('operasional' => 9));

			$data_send_11 = array('operasional'=> 1);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_11, array('id' => $kendaraan1));
			$data_send_21 = array('operasional'=> 2);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_21, array('id' => $kendaraan2));
			$data_send_31 = array('operasional'=> 3);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_31, array('id' => $kendaraan3));
			$data_send_41 = array('operasional'=> 4);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_41, array('id' => $kendaraan4));
			$data_send_51 = array('operasional'=> 5);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_51, array('id' => $kendaraan5));
			$data_send_61 = array('operasional'=> 6);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_61, array('id' => $kendaraan6));
			$data_send_71 = array('operasional'=> 7);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_71, array('id' => $kendaraan7));
			$data_send_81 = array('operasional'=> 8);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_81, array('id' => $kendaraan8));
			$data_send_91 = array('operasional'=> 9);
			$this->M_codeigniter->update('tbl_kendaraan', $data_send_91, array('id' => $kendaraan9));

			$output = array(
				'status' => 1,
			);
		}

		echo json_encode($output);
	}
	
	function formPreview(){
		$id = $this->input->post('id');

		$data['hasil'] = $this->M_codeigniter->query("
			SELECT k.id,k.noasset,k.nopol,j.`nama_jenis`,k.`nomor_rangka`,k.`nomor_mesin`,k.`tahun`,k.`namastnk`,k.`ukuran`,
			k.`habisstnk`,k.`kir`,k.pajak,kk.`nopol` as nopollama,k.`costcenter`,d.`nama_divisi`
			FROM tbl_kendaraan k LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id 
			left join tbl_kendaraan kk on kk.id = k.nopollama
			LEFT JOIN tbl_divisi d ON d.id = k.divisi
			where k.id = '".$id."'
		")->result();

		$output = array(
			'html' => $this->load->view('preview_kendaraan',$data,true),
		);

		echo json_encode($output);
	}

	function prosesUpdate(){
		$id_admin = $this->session->userdata('id_admin');
		$id	= $this->input->post('id');
		$nopol = $this->input->post('nopol');
		//$nopolbaru = $this->input->post('nopolbaru');
		$nopolbaru = preg_replace('/\s+/', '', $this->input->post('nopolbaru'));
		$nopol_lama = $this->input->post('nopol_lama');

		if ($nopolbaru != '')
		{
			$nopol_lama = $id;
			$nopol = $nopolbaru;
		}

		$no_asset = $this->input->post('no_asset');
		$jenis = $this->input->post('jenis');
		$no_rangka = $this->input->post('no_rangka');
		$no_mesin = $this->input->post('no_mesin');
		$ukuran = $this->input->post('ukuran');
		$tahun = $this->input->post('tahun');
		$an_stnk = $this->input->post('an_stnk');
		$tgl_stnk = $this->input->post('tgl_stnk');
		$kir = $this->input->post('kir');
		$costcenter = $this->input->post('costcenter');
		$divisi = $this->input->post('divisi');

		$cek = $this->M_codeigniter->get_where('tbl_kendaraan', array('id' => $id))->num_rows();
		if($cek == 1){
			$data_send_2 = array(
				'active' 	=> 1,
				'userupdate' => $id_admin,
				'dateupdate' => date('Y-m-d H:i:s')
			);
			$delete = $this->M_codeigniter->update('tbl_kendaraan', $data_send_2, array('id' => $id));

			$cek = $this->M_codeigniter->get_where('tbl_kendaraan', array('nopol' => $nopol,'active' => 0))->num_rows();
			if($cek == 0){
				$data_send_1 = array(
						'noasset'=> $no_asset,
						'nopol'=> $nopol,
						'jenis'=> $jenis,
						'nomor_rangka'=> $no_rangka,
						'nomor_mesin'=> $no_mesin,
						'tahun'=> $tahun,
						'namastnk'=> $an_stnk,
						'habisstnk'=> $tgl_stnk,
						'ukuran'=> $ukuran,
						'kir'=> $kir,
						'nopollama'=> $nopol_lama,
						'costcenter'=> $costcenter,
						'divisi'=> $divisi,
						'userupdate' => $id_admin,
						'dateupdate' => date('Y-m-d H:i:s')
					);
				$insert = $this->M_codeigniter->insert('tbl_kendaraan', $data_send_1);
			}	
		}else{$insert=false;}
		if($insert){
			$output = array(
				'status' => 1,
			);
		}else{
			$output = array(
				'status' => 0
			);
		}
		echo json_encode($output);
	}

	function deleteData(){
		$id = $this->input->post('id');
		$data_send_1 = array(
				'active' 	=> 1,
			);
		//$delete = $this->M_codeigniter->delete('tbl_inspeksi', array('id_paket' => $id));
		$delete = $this->M_codeigniter->update('tbl_kendaraan', $data_send_1, array('id' => $id));
		if ($delete) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function deleteDataRequest(){
		$id = $this->input->post('id');
		$data_send_1 = array(
				'status' 	=> 2,
			);
		//$delete = $this->M_codeigniter->delete('tbl_inspeksi', array('id_paket' => $id));
		$delete = $this->M_codeigniter->update('tbl_request_user', $data_send_1, array('id' => $id));
		if ($delete) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function deleteDataJenis(){
		$id = $this->input->post('id');
		$data_send_1 = array(
				'active' 	=> 1,
			);
		//$delete = $this->M_codeigniter->delete('tbl_jenis_kendaraan', array('id' => $id));
		$delete = $this->M_codeigniter->update('tbl_jenis_kendaraan', $data_send_1, array('id' => $id));
		if ($delete) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

}