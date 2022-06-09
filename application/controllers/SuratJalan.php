<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratJalan extends CI_Controller {
	public function __construct() {
    parent::__construct();
  	if($this->session->userdata('login') != TRUE) {
  		redirect('');
	  	}
	}

	public function index(){
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->M_codeigniter->get_role($id_admin);
		$data['plant'] = $this->M_codeigniter->get('tbl_plant')->result();
		$data['content_header'] = 'Form Mobilisasi Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Surat Jalan',base_url('SuratJalan')),
		);
		$data['content'] = 'buatsuratjalan';
		$data['js_file'] = 'suratjalan';
		$this->load->view('component/main', $data);
	}

	public function suratJalanNew(){
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->M_codeigniter->get_role($id_admin);
		$data['plant'] = $this->M_codeigniter->get('tbl_plant')->result();
		$data['content_header'] = 'Form Mobilisasi Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Surat Jalan',base_url('SuratJalan')),
		);
		$data['content'] = 'suratjalannew';
		$data['js_file'] = 'suratjalannew';
		$this->load->view('component/main', $data);
	}

	public function suratJalanProses(){
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->M_codeigniter->get_role($id_admin);
		$data['plant'] = $this->M_codeigniter->get('tbl_plant')->result();
		$data['content_header'] = 'Form Mobilisasi Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Surat Jalan',base_url('SuratJalan')),
		);
		$data['content'] = 'suratjalanproses';
		$data['js_file'] = 'suratjalanproses';
		$this->load->view('component/main', $data);
	}

	public function suratJalanRev(){
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->M_codeigniter->get_role($id_admin);
		$data['plant'] = $this->M_codeigniter->get('tbl_plant')->result();
		$data['content_header'] = 'Form Mobilisasi Kendaraan';
		$data['breadcrumb'] = array(
			array('Form Surat Jalan',base_url('SuratJalan')),
		);
		$data['content'] = 'suratjalanrevisi';
		$data['js_file'] = 'suratjalanrev';
		$this->load->view('component/main', $data);
	}

	public function biaya(){
		$id_admin = $this->session->userdata('id_admin');
		//$role = $this->M_codeigniter->get_role($id_admin);
		//$data['plant'] = $this->M_codeigniter->get('tbl_plant')->result();
		$data['content_header'] = 'Form Input Biaya';
		$data['breadcrumb'] = array(
			array('Form Surat Jalan',base_url('SuratJalan')),
		);
		$data['content'] = 'biaya';
		$data['js_file'] = 'biaya';
		$this->load->view('component/main', $data);
	}

	public function biayaCrab(){
		$id_admin = $this->session->userdata('id_admin');
		//$role = $this->M_codeigniter->get_role($id_admin);
		//$data['plant'] = $this->M_codeigniter->get('tbl_plant')->result();
		$data['content_header'] = 'Form Input Biaya';
		$data['breadcrumb'] = array(
			array('Form Surat Jalan',base_url('SuratJalan/biayaCrab')),
		);
		$data['content'] = 'biayacrab';
		$data['js_file'] = 'biayacrab';
		$this->load->view('component/main', $data);
	}

	public function biayaKecil(){
		$id_admin = $this->session->userdata('id_admin');
		//$role = $this->M_codeigniter->get_role($id_admin);
		//$data['plant'] = $this->M_codeigniter->get('tbl_plant')->result();
		$data['content_header'] = 'Form Input Biaya';
		$data['breadcrumb'] = array(
			array('Form Input Biaya',base_url('SuratJalan/biayaKecil')),
		);
		$data['content'] = 'biayakecil';
		$data['js_file'] = 'biayakecil';
		$this->load->view('component/main', $data);
	}

	public function biayaBesar(){
		$id_admin = $this->session->userdata('id_admin');
		//$role = $this->M_codeigniter->get_role($id_admin);
		//$data['plant'] = $this->M_codeigniter->get('tbl_plant')->result();
		$data['content_header'] = 'Form Input Biaya';
		$data['breadcrumb'] = array(
			array('Form Surat Jalan',base_url('SuratJalan/biayaBesar')),
		);
		$data['content'] = 'biayabesar';
		$data['js_file'] = 'biayabesar';
		$this->load->view('component/main', $data);
	}
	
	function myListBiaya(){
		$id_admin = $this->session->userdata('id_admin');
		$admin_name = $this->session->userdata('admin_name');
		$fk_plant = $this->session->userdata('fk_plant');

		$tanggal = $this->input->post('tanggal');

		if ($tanggal == 0 or $tanggal == '')
		{

			if ($admin_name == 'adminbiaya')
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin  where tb.usercreated = '".$id_admin."' AND a.fk_plant = '".$fk_plant."'
				")->result();	
			} else if ($admin_name == 'admin')
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin 
				")->result();
			} else
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin  where a.fk_plant = '".$fk_plant."'
				")->result();
			}	
		} else
		{
			$tanggal = date('Y-m-d',strtotime($tanggal));
			$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'".$tanggal."' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya WHERE tanggal = '".$tanggal."') AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya WHERE tanggal = '".$tanggal."') AS statcheker2,
				tb.notedreject1,tb.notedreject2, CONCAT(IFNULL(tb.notedreject1,''),'/',IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin where tb.tanggal = '".$tanggal."' and a.fk_plant = '".$fk_plant."'
			")->result();
		}

		$output = array(
			'html' => $this->load->view('list_biaya', $data, true),
		);
		echo json_encode($output);
	}

	function myListBiayaCrab(){
		$id_admin = $this->session->userdata('id_admin');
		$admin_name = $this->session->userdata('admin_name');
		$fk_plant = $this->session->userdata('fk_plant');

		$tanggal = $this->input->post('tanggal');

		if ($tanggal == 0 or $tanggal == '')
		{

			if ($admin_name == 'adminbiaya')
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya_crab) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya_crab tb left join tbl_admin a on tb.usercreated = a.id_admin  where tb.usercreated = '".$id_admin."' AND a.fk_plant = '".$fk_plant."'
				")->result();	
			} else if ($admin_name == 'admin')
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya_crab) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya_crab tb left join tbl_admin a on tb.usercreated = a.id_admin 
				")->result();
			} else
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya_crab) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya_crab tb left join tbl_admin a on tb.usercreated = a.id_admin  where a.fk_plant = '".$fk_plant."'
				")->result();
			}	
		} else
		{
			$tanggal = date('Y-m-d',strtotime($tanggal));
			$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'".$tanggal."' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya WHERE tanggal = '".$tanggal."') AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya WHERE tanggal = '".$tanggal."') AS statcheker2,
				tb.notedreject1,tb.notedreject2, CONCAT(IFNULL(tb.notedreject1,''),'/',IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin where tb.tanggal = '".$tanggal."' and a.fk_plant = '".$fk_plant."'
			")->result();
		}

		$output = array(
			'html' => $this->load->view('list_biaya_crab', $data, true),
		);
		echo json_encode($output);
	}

	function myListBiayaKecil(){
		$id_admin = $this->session->userdata('id_admin');
		$admin_name = $this->session->userdata('admin_name');
		$fk_plant = $this->session->userdata('fk_plant');

		$tanggal = $this->input->post('tanggal');

		if ($tanggal == 0 or $tanggal == '')
		{

			if ($admin_name == 'adminbiaya')
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin  where tb.usercreated = '".$id_admin."' AND a.fk_plant = '".$fk_plant."' and a.jnskendaraan = 1
				")->result();	
			} else if ($admin_name == 'admin')
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin where a.jnskendaraan = 1
				")->result();
			} else
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin  where a.fk_plant = '".$fk_plant."' and a.jnskendaraan = 1
				")->result();
			}	
		} else
		{
			$tanggal = date('Y-m-d',strtotime($tanggal));
			$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'".$tanggal."' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya WHERE tanggal = '".$tanggal."') AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya WHERE tanggal = '".$tanggal."') AS statcheker2,
				tb.notedreject1,tb.notedreject2, CONCAT(IFNULL(tb.notedreject1,''),'/',IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin where tb.tanggal = '".$tanggal."' and a.fk_plant = '".$fk_plant."' and a.jnskendaraan = 1
			")->result();
		}

		$output = array(
			'html' => $this->load->view('list_biaya', $data, true),
		);
		echo json_encode($output);
	}

	public function getCont(){
		$id_admin = $this->session->userdata('id_admin');
		$id = $this->input->post('id');
		$cont = $this->M_codeigniter->query("
		SELECT nocontainer FROM
		(SELECT `tglberangkat` AS tgl, `jamkeluar` AS jam, `sasis`, `nocontainer`
		FROM tbl_p_keberangkatan
		UNION 
		SELECT `tgltiba` AS tgl, `jammasuk` AS jam, `sasis`, `nocontainer`
		FROM tbl_p_kedatangan)
		AS tbl1 WHERE sasis = '".$id."'
		ORDER BY tgl DESC,jam DESC LIMIT 1
		")->result();

		if ($cont)
		{
			$sasis = $this->M_codeigniter->query("
			SELECT sasis FROM
			(SELECT `tglberangkat` AS tgl, `jamkeluar` AS jam, `sasis`, `nocontainer`
			FROM tbl_p_keberangkatan
			UNION 
			SELECT `tgltiba` AS tgl, `jammasuk` AS jam, `sasis`, `nocontainer`
			FROM tbl_p_kedatangan)
			AS tbl1 WHERE nocontainer = '".$cont[0]->nocontainer."'
			ORDER BY tgl DESC,jam DESC LIMIT 1
			")->result();

			if ($sasis[0]->sasis == $id)
			{
				$nocont = $cont[0]->nocontainer;
			} else
			{
				$nocont = 0;
			}
		} else
		{
			$nocont = 0;
		}

		$output = array('nocont' => $nocont);
		echo json_encode($output);
	}

	function myListBiayaBesar(){
		$id_admin = $this->session->userdata('id_admin');
		$admin_name = $this->session->userdata('admin_name');
		$fk_plant = $this->session->userdata('fk_plant');

		$tanggal = $this->input->post('tanggal');

		if ($tanggal == 0 or $tanggal == '')
		{

			if ($admin_name == 'adminbiaya')
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin  where tb.usercreated = '".$id_admin."' AND a.fk_plant = '".$fk_plant."' and a.jnskendaraan = 2
				")->result();	
			} else if ($admin_name == 'admin')
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin where a.jnskendaraan = 2
				")->result();
			} else
			{
				$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya) AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya) AS statcheker2, tb.notedreject1,tb.notedreject2,'/',CONCAT(IFNULL(tb.notedreject1,''),IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin  where a.fk_plant = '".$fk_plant."' and a.jnskendaraan = 2
				")->result();
			}	
		} else
		{
			$tanggal = date('Y-m-d',strtotime($tanggal));
			$data['table'] = $this->M_codeigniter->query("
				SELECT tb.id,tb.nomor_kasbon,tb.nominal,tb.text,tb.download,tb.approved,tb.statchecker1,tb.statchecker2,tb.approved_at,tb.checker1_at,tb.checker2_at,a.username,tb.tanggal,'".$tanggal."' as tagtanggal,tb.created_at
				,(SELECT MIN(statchecker1) FROM tbl_biaya WHERE tanggal = '".$tanggal."') AS statcheker1,(SELECT MIN(statchecker2) FROM tbl_biaya WHERE tanggal = '".$tanggal."') AS statcheker2,
				tb.notedreject1,tb.notedreject2, CONCAT(IFNULL(tb.notedreject1,''),'/',IFNULL(tb.notedreject2,'')) AS keterangan
				from tbl_biaya tb left join tbl_admin a on tb.usercreated = a.id_admin where tb.tanggal = '".$tanggal."' and a.fk_plant = '".$fk_plant."' and a.jnskendaraan = 2
			")->result();
		}

		$output = array(
			'html' => $this->load->view('list_biaya', $data, true),
		);
		echo json_encode($output);
	}
	
	function getSuratJalan(){
		$option = "";
		$id_plant = $this->input->post('jns');
		
		//echo $id_plant;
		if ($id_plant == '')
		{
			$data = $this->M_codeigniter->query("
			SELECT s.id,s.nomorsj,CONCAT(s.`nomorsj`,' | ',IFNULL(DATE_FORMAT(IFNULL(pb.`tglberangkat`,''),'%d/%m/%Y'),''),' | ',IFNULL(pb.jamkeluar,''),' | ',IFNULL(kk.nopol,''),' | ',IFNULL(db.nama_mdriver,s.`sopir`),' | ',IFNULL(p.`nama_mpelabuhan`,IFNULL(dp.`nama_mdepo`,IFNULL(pt.`nama_mplant`,s.tujuan)))) AS nomorsjj
			FROM tbl_suratjalan s LEFT JOIN tbl_driver d ON s.sopir = d.id_mdriver
			LEFT JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = s.`tujuan`
			LEFT JOIN tbl_depo dp ON dp.id_mdepo = s.`tujuan` 
			LEFT JOIN tbl_plant pt ON pt.`id_mplant` = s.`tujuan`
			LEFT JOIN tbl_kendaraan k ON k.id = s.kendaraan
			LEFT JOIN tbl_p_keberangkatan pb ON pb.fk_idsj = s.id 
			LEFT JOIN tbl_kendaraan kk ON kk.id = pb.nomorpolisi
			LEFT JOIN tbl_driver db ON db.`id_mdriver` = pb.namasopir
			WHERE s.active = 0 AND pb.tglberangkat > '2021-10-07' AND s.id NOT IN (SELECT id_sj FROM tbl_detail_biaya)		
			")->result();
		} else
		{
			$id_plant = date('Y-m-d',strtotime($id_plant));
			$data = $this->M_codeigniter->query("
			SELECT s.id,s.nomorsj,CONCAT(s.`nomorsj`,' | ',IFNULL(DATE_FORMAT(IFNULL(pb.`tglberangkat`,''),'%d/%m/%Y'),''),' | ',IFNULL(pb.jamkeluar,''),' | ',IFNULL(kk.nopol,''),' | ',IFNULL(db.nama_mdriver,s.`sopir`),' | ',IFNULL(p.`nama_mpelabuhan`,IFNULL(dp.`nama_mdepo`,IFNULL(pt.`nama_mplant`,s.tujuan)))) AS nomorsjj
			FROM tbl_suratjalan s LEFT JOIN tbl_driver d ON s.sopir = d.id_mdriver
			LEFT JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = s.`tujuan`
			LEFT JOIN tbl_depo dp ON dp.id_mdepo = s.`tujuan` 
			LEFT JOIN tbl_plant pt ON pt.`id_mplant` = s.`tujuan`
			LEFT JOIN tbl_kendaraan k ON k.id = s.kendaraan
			LEFT JOIN tbl_p_keberangkatan pb ON pb.fk_idsj = s.id 
			LEFT JOIN tbl_kendaraan kk on kk.id = pb.nomorpolisi
			LEFT JOIN tbl_driver db ON db.`id_mdriver` = pb.namasopir
			WHERE s.active = 0 AND pb.tglberangkat = '".$id_plant."' AND s.id NOT IN (SELECT id_sj FROM tbl_detail_biaya)
			")->result();
		}	

		
		foreach($data as $row){
			$option .= "<option value='".$row->id."'>".strtoupper($row->nomorsjj)."</option>";
		}

		echo json_encode($option);
	}

	function myListBiayaDetail(){
		$id = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
				(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
				((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
				FROM 
				(SELECT db.id as iddetail,s.nomorsj as id_sj,g.`gl_account` as glaccount,c.`cost_center` as costcenter, db.nomemo,db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
				       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
				       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
				FROM tbl_detail_biaya db 
				left join tbl_costcenter c on db.costcenter = c.id
				left join tbl_general_ledger g on g.id = db.glaccount
				left join tbl_suratjalan s on s.id = db.id_sj
				WHERE db.id_biaya = ".$id.") AS t1
		")->result();

		// echo $this->db->last_query();

		$output = array(
			'html' => $this->load->view('list_biaya2', $data, true),
		);
		echo json_encode($output);
	}

	function myListBiaya2(){
		$id = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT tb.id,tb.nomor_kasbon,tb.head_gl,tb.nominal,'' as costcenter,GROUP_CONCAT(tdb.id_sj) as referensi
			from tbl_biaya tb join tbl_detail_biaya tdb on tb.id = tdb.id_biaya
			group by tb.id
		")->result();

		// $data['table'] = $this->M_codeigniter->query("
		// 	SELECT s.nomorsj,s.`tanggalberangkat`,d.nama_mdriver,IFNULL(p.`nama_mpelabuhan`,IFNULL(dp.`nama_mdepo`,IFNULL(pt.`nama_mplant`,s.tujuan))) AS tujuan,db.`nominal`,db.`detail`
		// 	FROM tbl_biaya b LEFT JOIN tbl_detail_biaya db ON b.`id` = db.`id_biaya`
		// 	LEFT JOIN tbl_suratjalan s ON s.`nomorsj` = db.`id_sj`
		// 	LEFT JOIN tbl_driver d ON s.sopir = d.id_mdriver
		// 	LEFT JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = s.`tujuan`
		// 	LEFT JOIN tbl_depo dp ON dp.id_mdepo = s.`tujuan` 
		// 	LEFT JOIN tbl_plant pt ON pt.`id_mplant` = s.`tujuan`
		// ")->result();

		$output = array(
			'html' => $this->load->view('list_biaya2', $data, true),
		);
		echo json_encode($output);
	}
	
	function insertBiaya(){

		$id_admin = $this->session->userdata('id_admin');
		$nomorkasbon = $this->input->post('nomorkasbon');
		$tanggal = $this->input->post('tanggal');
		$tanggal = date('Y-m-d',strtotime($tanggal));
		$nominal = $this->input->post('nominal');
		//$gl = $this->input->post('gl');
		// $ba = $this->input->post('ba');
		// $costcenter = $this->input->post('costcenter');
		// $profitcenter = $this->input->post('profitcenter');
		$itext = $this->input->post('itext');
		$reason = $this->input->post('reason');

		$data_send_1 = array(
				'nomor_kasbon' => $nomorkasbon,
				'nominal' => $nominal,
				'tanggal' => $tanggal,
				//'head_gl' => $gl,
				// 'ba' => $ba,
				// 'costcenter' => $costcenter,
				// 'profitcenter' => $profitcenter,
				'usercreated' => $id_admin,
				'text' => $itext,
				'reasoncode' => $reason
		);

		$insert = $this->M_codeigniter->insert('tbl_biaya', $data_send_1);

		if($insert){
			$output = array('status' => 1);	
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);

	}

	function insertBiayaDetail(){

		$id_admin = $this->session->userdata('id_admin');
		//$varlist = $this->input->post('itemdiv');
		$id = $this->input->post('id');
		$nosuratjalan = trim($this->input->post('nosuratjalan'));
		$gl = $this->input->post('gl');
		$costcenter = $this->input->post('costcenter');
		$nominal = $this->input->post('nominal');
		$feedriver = $this->input->post('feedriver');
		$lemburdriver = $this->input->post('lemburdriver');
		$feekernet = $this->input->post('feekernet');
		$lemburkernet = $this->input->post('lemburkernet');
		$feeinap = $this->input->post('feeinap');
		$kelasjalan = $this->input->post('kelasjalan');
		$kuli = $this->input->post('kuli');
		$parkir = $this->input->post('parkir');
		$biayatol = $this->input->post('biayatol');
		$genset = $this->input->post('genset');
		$tunai = $this->input->post('tunai');
		$nontunai = $this->input->post('nontunai');
		$nomemo = $this->input->post('nomemo');
		$biayalain = $this->input->post('biayalain');
		$keterangan = $this->input->post('keterangan');


		$data_send_2 = array(
			'id_biaya' => $id,
			'id_sj' => $nosuratjalan,
			'glaccount' => $gl,
			'costcenter' => $costcenter,
			'nominal' => $nominal,
			'feedriver' => $feedriver,
			'feekernet' => $feekernet,
			'lemburkernet' => $lemburkernet,
			'lemburdriver' => $lemburdriver,
			'biayalain' => $biayalain,
			'keterangan' => $keterangan,
			'feeinap' => $feeinap,
			'kelasjalan' => $kelasjalan,
			'kuli' => $kuli,
			'parkir' => $parkir,
			'biayatol' => $biayatol,
			'genset' => $genset,
			'bbmtunai' => $tunai,
			'bbmnontunai' => $nontunai,
			'nomemo' => $nomemo
		);	

		$insert = $this->M_codeigniter->insert('tbl_detail_biaya', $data_send_2);
	
//
//		$insert = $this->M_codeigniter->insert('tbl_biaya', $data_send_1);

		if($insert){
			$output = array('status' => 1);	
		}else{
			$output = array('status' => 0);
	    }

		echo json_encode($output);

	}
	
	function deleteDetailBiaya(){
		$id = $this->input->post('id');
		$delete = $this->M_codeigniter->delete('tbl_detail_biaya', array('id' => $id));
		if ($delete) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}
	
	function formBiayaPreview(){
		$id = $this->input->post('id');
		$data['hasil'] = $this->M_codeigniter->query("			
			SELECT b.`nomor_kasbon`,b.`nominal`,SUM(t1.totalbiaya2) as total_keluar, (b.`nominal` - SUM(t1.totalbiaya2)) as sisa
				FROM tbl_biaya b LEFT JOIN 
				(SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
								(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
								((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
								FROM 
								(SELECT db.id_biaya,db.`id_sj`,db.`glaccount`,db.`costcenter`, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
								       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
								       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
								FROM tbl_detail_biaya db) AS t1) AS t1 ON b.`id` = t1.id_biaya
								WHERE  b.id = ".$id."
				GROUP BY b.id
        ")->result();
		$data['id'] = $id;
		$data['costcenter'] = $this->M_codeigniter->get('tbl_costcenter')->result();
		$data['glaccount'] = $this->M_codeigniter->get('tbl_general_ledger')->result();
		$output = array(
			'html' => $this->load->view('preview_biaya',$data,true),
		);

		echo json_encode($output);
	}

	function formBiayaCrabPreview(){
		$id = $this->input->post('id');
		$data['hasil'] = $this->M_codeigniter->query("			
			SELECT b.`nomor_kasbon`,b.`nominal`,SUM(t1.totalbiaya2) as total_keluar, (b.`nominal` - SUM(t1.totalbiaya2)) as sisa
				FROM tbl_biaya b LEFT JOIN 
				(SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
								(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
								((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
								FROM 
								(SELECT db.id_biaya,db.`id_sj`,db.`glaccount`,db.`costcenter`, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
								       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
								       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
								FROM tbl_detail_biaya db) AS t1) AS t1 ON b.`id` = t1.id_biaya
								WHERE  b.id = ".$id."
				GROUP BY b.id
        ")->result();
		$data['id'] = $id;
		$data['costcenter'] = $this->M_codeigniter->get('tbl_costcenter')->result();
		$data['glaccount'] = $this->M_codeigniter->get('tbl_general_ledger')->result();
		$output = array(
			'html' => $this->load->view('preview_biaya_crab',$data,true),
		);

		echo json_encode($output);
	}
	
	function prosesUpdateDetail(){

		$id = $this->input->post('id');
		$nosuratjalan = trim($this->input->post('nosuratjalan'));
		$gl = $this->input->post('gl');
		$costcenter = $this->input->post('costcenter');
		$nominal = $this->input->post('nominal');
		$feedriver = $this->input->post('feedriver');
		$lemburdriver = $this->input->post('lemburdriver');
		$feekernet = $this->input->post('feekernet');
		$lemburkernet = $this->input->post('lemburkernet');
		$feeinap = $this->input->post('feeinap');
		$kelasjalan = $this->input->post('kelasjalan');
		$kuli = $this->input->post('kuli');
		$parkir = $this->input->post('parkir');
		$biayatol = $this->input->post('biayatol');
		$genset = $this->input->post('genset');
		$tunai = $this->input->post('tunai');
		$nontunai = $this->input->post('nontunai');
		$nomemo = $this->input->post('nomemo');
		$biayalain = $this->input->post('biayalain');
		$keterangan = $this->input->post('keterangan');

	    $data_send_1 = array(
	  		'date_update' => date('Y-m-d H:i:s'),
			'id_sj' => $nosuratjalan,
			'glaccount' => $gl,
			'costcenter' => $costcenter,
			'nominal' => $nominal,
			'feedriver' => $feedriver,
			'feekernet' => $feekernet,
			'lemburkernet' => $lemburkernet,
			'lemburdriver' => $lemburdriver,
			'biayalain' => $biayalain,
			'keterangan' => $keterangan,
			'feeinap' => $feeinap,
			'kelasjalan' => $kelasjalan,
			'kuli' => $kuli,
			'parkir' => $parkir,
			'biayatol' => $biayatol,
			'genset' => $genset,
			'bbmtunai' => $tunai,
			'bbmnontunai' => $nontunai,
			'nomemo' => $nomemo
	  	);

	    $update_user = $this->M_codeigniter->update('tbl_detail_biaya', $data_send_1, array('id' => $id));

	    if($update_user){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}
	
	function cekSJ(){
		$iditem = trim($this->input->post('id'));
		$cek = $this->M_codeigniter->get_where('tbl_detail_biaya', array('id_sj' => $iditem))->num_rows();

		// echo $this->db->last_query();
		// echo $cek;


		if($cek == 0){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}
	
	function updateStatusBiaya(){
		$id = $this->input->post('id');
		$data_send_1 = array(
				'approved' 	=> 1,
				'approved_at' => date('Y-m-d H:i:s'),
		);
	
		$delete = $this->M_codeigniter->update('tbl_biaya', $data_send_1, array('id' => $id));
		if ($delete) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function updateStatusCont1(){
		$id = $this->input->post('id');
		$data_send_1 = array(
				'active' 	=> 1,
				'updatedate' => date('Y-m-d H:i:s')
		);
	
		$update = $this->M_codeigniter->update('tbl_container_rent', $data_send_1, array('id' => $id));
		if ($update) {
			$output = array('status' => 1);
		}else{
			$update = $this->M_codeigniter->update('tbl_container', $data_send_1, array('id' => $id));
			if ($update) {
				$output = array('status' => 1);
			}else{
				$output = array('status' => 0);
			}
		}
		echo json_encode($output);
	}
	
	function updateStatusCont2(){
		$id = $this->input->post('id');
		$data_send_1 = array(
				'active' 	=> 0,
				'updatedate' => date('Y-m-d H:i:s')
		);
	
		$update = $this->M_codeigniter->update('tbl_container_rent', $data_send_1, array('id' => $id));
		if ($update) {
			$output = array('status' => 1);
		}else{
			$update = $this->M_codeigniter->update('tbl_container', $data_send_1, array('id' => $id));
			if ($update) {
				$output = array('status' => 1);
			}else{
				$output = array('status' => 0);
			}
		}
		echo json_encode($output);
	}

	function updateStatusChecker(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$id_admin = $this->session->userdata('id_admin');

		if ($status == 1)
		{

			$user = $this->M_codeigniter->get_where('tbl_admin' , array('id_admin' => $id_admin));
			$user = $user->result()[0];
			if ($user->fk_plant == 'lamongan')
			{
				$data_send_1 = array(
					'statchecker1' 	=> 1,
					'statchecker2' 	=> 1,
					'checker1_at' => date('Y-m-d H:i:s'),
					'checker2_at' => date('Y-m-d H:i:s'),
				);
			} else
			{
				$data_send_1 = array(
					'statchecker1' 	=> 1,
					'checker1_at' => date('Y-m-d H:i:s'),
				);
			}
		} else
		{
			$keterangan = $this->input->post('keterangan');	
			$data_send_1 = array(
				'statchecker1' 	=> 2,
				'checker1_at' => date('Y-m-d H:i:s'),
				'notedreject1' => $keterangan
			);						
		}	

		$update = $this->M_codeigniter->update('tbl_biaya', $data_send_1, array('id' => $id));
		if ($update) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}

	function updateStatusChecker2(){
		$id = $this->input->post('id');

		$status = $this->input->post('status');

		if ($status == 1)
		{
			$data_send_1 = array(
				'statchecker2' 	=> 1,
				'checker2_at' => date('Y-m-d H:i:s'),
		);
		} else
		{
			$keterangan = $this->input->post('keterangan');	
			$data_send_1 = array(
				'statchecker2' 	=> 2,
				'checker2_at' => date('Y-m-d H:i:s'),
				'notedreject2' => $keterangan,
				'statchecker1' => 2
			);						
		}	
	
		$update = $this->M_codeigniter->update('tbl_biaya', $data_send_1, array('id' => $id));
		if ($update) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}

	function updateStatusResolve(){
	
		$id = $this->input->post('id');	
		$data_send_1 = array(
			'statchecker1' => 0,
			'statchecker2' => 0
		);						
		
		$update = $this->M_codeigniter->update('tbl_biaya', $data_send_1, array('id' => $id));
		if ($update) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}

	function formUpdate(){
		$id = $this->input->post('id');
		$dataDetail = $this->M_codeigniter->get_where('tbl_suratjalan', array('id' => $id))->result()[0];
		if ($dataDetail->size == 0)
		{
			$data['kendaraan'] = $this->M_codeigniter->query("
				SELECT k.id,k.nopol,j.nama_jenis
				FROM tbl_kendaraan k left join tbl_jenis_kendaraan j on j.id = k.jenis
				where k.ukuran = 'kecil' and k.active = 0
				ORDER BY j.nama_jenis ASC
			")->result();
			$data['driver'] = $this->M_codeigniter->query("
				SELECT p.id_mdriver,p.nama_mdriver
				FROM tbl_driver p where p.jns_kendaraan = 'kecil'
				ORDER BY p.nama_mdriver ASC
			")->result();
			$data['tujuan'] = $this->M_codeigniter->query("
				SELECT id_mplant as id,CONCAT('PLANT - ',nama_mplant,'/',muatan,'/',bagian,'/',pic) AS description    FROM tbl_plant
				UNION
				SELECT id_mdepo as id,CONCAT('DEPO - ',nama_mdepo,'/',idx) AS description FROM tbl_depo
				UNION
				SELECT id_mpelabuhan as id,CONCAT('PELABUHAN - ',nama_mpelabuhan,'/',idx) AS description FROM tbl_pelabuhan
			")->result();
		} else
		{
			$data['kendaraan'] = $this->M_codeigniter->query("
				SELECT k.id,k.nopol,j.nama_jenis
				FROM tbl_kendaraan k left join tbl_jenis_kendaraan j on j.id = k.jenis
				where k.ukuran = 'besar' and k.active = 0
				ORDER BY j.nama_jenis ASC
			")->result();
			$data['driver'] = $this->M_codeigniter->query("
				SELECT p.id_mdriver,p.nama_mdriver
				FROM tbl_driver p where p.jns_kendaraan = 'besar'
				ORDER BY p.nama_mdriver ASC
			")->result();
			$data['chasis'] = $this->M_codeigniter->query("
				SELECT s.id,s.chasis,s.nokir
				FROM tbl_chasis s
				ORDER BY s.chasis ASC
			")->result();
			$data['container'] = $this->M_codeigniter->query("
				SELECT id,container,noequipment
				FROM tbl_container where active = 0
				UNION
				SELECT id,container,noequipment
				FROM tbl_container_rent where active = 0
				ORDER BY container ASC
			")->result();
			$data['tujuan'] = $this->M_codeigniter->query("
				SELECT id_mplant as id,CONCAT('PLANT - ',nama_mplant,'/',muatan,'/',bagian,'/',pic) AS description    FROM tbl_plant
				UNION
				SELECT id_mdepo as id,CONCAT('DEPO - ',nama_mdepo,'/',idx) AS description FROM tbl_depo
				UNION
				SELECT id_mpelabuhan as id,CONCAT('PELABUHAN - ',nama_mpelabuhan,'/',idx) AS description FROM tbl_pelabuhan
			")->result();
		}

		$data['table'] = $this->M_codeigniter->query("
			SELECT *,DATE_FORMAT(s.tanggalberangkat, '%d-%m-%Y') as tglberangkat from tbl_suratjalan s
			WHERE s.id = ".$id." 
		")->result()[0];

		$output = array(
			'html' => $this->load->view('update_surat_jalan', $data, true),
		);
		echo json_encode($output);
	}

	function formUpdateBiaya(){
		$id = $this->input->post('id');
		$dataDetail = $this->M_codeigniter->get_where('tbl_detail_biaya', array('id' => $id))->result()[0];
		$data['costcenter'] = $this->M_codeigniter->get('tbl_costcenter')->result();
		$data['glaccount'] = $this->M_codeigniter->get('tbl_general_ledger')->result();
		$data['suratjalan'] = $this->M_codeigniter->query("
			SELECT s.id,s.nomorsj,CONCAT(s.`nomorsj`,' | ',IFNULL(DATE_FORMAT(IFNULL(pb.`tglberangkat`,''),'%d/%m/%Y'),''),' | ',IFNULL(pb.jamkeluar,''),' | ',IFNULL(kk.nopol,''),' | ',IFNULL(db.nama_mdriver,s.`sopir`),' | ',IFNULL(p.`nama_mpelabuhan`,IFNULL(dp.`nama_mdepo`,IFNULL(pt.`nama_mplant`,s.tujuan)))) AS nomorsjj
			FROM tbl_suratjalan s LEFT JOIN tbl_driver d ON s.sopir = d.id_mdriver
			LEFT JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = s.`tujuan`
			LEFT JOIN tbl_depo dp ON dp.id_mdepo = s.`tujuan` 
			LEFT JOIN tbl_plant pt ON pt.`id_mplant` = s.`tujuan`
			LEFT JOIN tbl_kendaraan k ON k.id = s.kendaraan
			LEFT JOIN tbl_p_keberangkatan pb ON pb.fk_idsj = s.id 
			LEFT JOIN tbl_kendaraan kk ON kk.id = pb.nomorpolisi
			LEFT JOIN tbl_driver db ON db.`id_mdriver` = pb.namasopir
			WHERE (s.active = 0 AND pb.tglberangkat > '2021-10-07' AND s.id NOT IN (SELECT id_sj FROM tbl_detail_biaya)) or s.id = ".$dataDetail->id_sj."
		")->result();
		$data['data_detail'] = $dataDetail;
		$output = array(
			'html' => $this->load->view('update_detail_biaya', $data, true),
		);
		echo json_encode($output);
	}

	function formUpdateMasterBiaya(){
		$id = $this->input->post('id');
		$table = $this->M_codeigniter->get_where('tbl_biaya', array('id' => $id))->result()[0];
		$data['table'] = $table;
		$output = array(
			'html' => $this->load->view('update_master_biaya', $data, true),
		);
		echo json_encode($output);
	}
	
	public function history(){
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->M_codeigniter->get_role($id_admin);
		$data['plant'] = $this->M_codeigniter->get('tbl_plant')->result();
		$data['content_header'] = 'Form Rencana Inspeksi';
		$data['breadcrumb'] = array(
			array('Form Surat Jalan',base_url('SuratJalan')),
		);
		$data['content'] = 'suratjalanhistory';
		$data['js_file'] = 'suratjalanhistory';
		$this->load->view('component/main', $data);
	}

	function myList(){
		$id = $this->input->post('id');
		
		$data['table'] = $this->M_codeigniter->query("
			SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('DEPO - ',d.`nama_mdepo`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses
			FROM tbl_suratjalan s JOIN tbl_depo d ON d.`id_mdepo` = s.`tujuan`
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
			LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir where s.active = 0 and s.proses <> 2
			UNION
			SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('PELABUHAN - ',d.`nama_mpelabuhan`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses 
			FROM tbl_suratjalan s JOIN tbl_pelabuhan d ON d.`id_mpelabuhan` = s.`tujuan`
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
			LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir where s.active = 0 and s.proses <> 2
			UNION
			SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('PLANT - ',d.`nama_mplant`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses 
			FROM tbl_suratjalan s JOIN tbl_plant d ON d.`id_mplant` = s.`tujuan`
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
			LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir where s.active = 0 and s.proses <> 2
			UNION
			SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,s.tujuan AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses 
			FROM tbl_suratjalan s 
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
			LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir where s.active = 0 and s.proses <> 2
			and s.`jns_tujuan` = 0
		")->result();

		$output = array(
			'html' => $this->load->view('list_suratjalan', $data, true),
		);
		echo json_encode($output);
	}

	function myListHistory(){
		$id = $this->input->post('id');
		
		$data['table'] = $this->M_codeigniter->query("
			SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('DEPO - ',d.`nama_mdepo`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses
			,pk.tglberangkat,pd.tgltiba
			FROM tbl_suratjalan s JOIN tbl_depo d ON d.`id_mdepo` = s.`tujuan`
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
			LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
			LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id
			LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id
			where s.active = 0 and s.proses = 2
			UNION
			SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('PELABUHAN - ',d.`nama_mpelabuhan`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses 
			,pk.tglberangkat,pd.tgltiba
			FROM tbl_suratjalan s JOIN tbl_pelabuhan d ON d.`id_mpelabuhan` = s.`tujuan`
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
			LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
			LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id
			LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id
			where s.active = 0 and s.proses = 2
			UNION
			SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('PLANT - ',d.`nama_mplant`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses 
			,pk.tglberangkat,pd.tgltiba
			FROM tbl_suratjalan s JOIN tbl_plant d ON d.`id_mplant` = s.`tujuan`
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
			LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
			LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id
			LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id
			where s.active = 0 and s.proses = 2
			UNION
			SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,s.tujuan AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses 
			,pk.tglberangkat,pd.tgltiba
			FROM tbl_suratjalan s 
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
			LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
			LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id
			LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id
			where s.active = 0 and s.proses = 2
			and s.`jns_tujuan` = 0
		")->result();

		$output = array(
			'html' => $this->load->view('list_suratjalanhistory', $data, true),
		);
		echo json_encode($output);
	}

	function myListRev(){
		$id = $this->input->post('id');
		
		$data['table'] = $this->M_codeigniter->query("
		SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('DEPO - ',d.`nama_mdepo`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses
		FROM tbl_suratjalan s JOIN tbl_depo d ON d.`id_mdepo` = s.`tujuan`
		LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
		LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir where s.active = 0 
		UNION
		SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('PELABUHAN - ',d.`nama_mpelabuhan`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses 
		FROM tbl_suratjalan s JOIN tbl_pelabuhan d ON d.`id_mpelabuhan` = s.`tujuan`
		LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
		LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir where s.active = 0 
		UNION
		SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('PLANT - ',d.`nama_mplant`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses 
		FROM tbl_suratjalan s JOIN tbl_plant d ON d.`id_mplant` = s.`tujuan`
		LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
		LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir where s.active = 0 
		UNION
		SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,s.tujuan AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses 
		FROM tbl_suratjalan s 
		LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
		LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir where s.active = 0 
		and s.`jns_tujuan` = 0
		")->result();

		$output = array(
			'html' => $this->load->view('list_suratjalanrevisi', $data, true),
		);

		echo json_encode($output);
	}

	function myListNew(){
		$id = $this->input->post('id');
		$admin_name = $this->session->userdata('admin_name');
		if ($admin_name == 'admin')
		{
			$data['table'] = $this->M_codeigniter->query("
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('DEPO - ',d.`nama_mdepo`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,1 as proces
				FROM tbl_suratjalan s JOIN tbl_depo d ON d.`id_mdepo` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir
				LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id  where s.active = 0 and s.proses = 0
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('PELABUHAN - ',d.`nama_mpelabuhan`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,1 as proces
				FROM tbl_suratjalan s JOIN tbl_pelabuhan d ON d.`id_mpelabuhan` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id  where s.active = 0 and s.proses = 0
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('PLANT - ',d.`nama_mplant`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,1 as proces
				FROM tbl_suratjalan s JOIN tbl_plant d ON d.`id_mplant` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id  where s.active = 0 and s.proses = 0 
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,s.tujuan AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,1 as proces
				FROM tbl_suratjalan s 
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id  where s.active = 0 and s.proses = 0
				and s.`jns_tujuan` = 0
			")->result();
		} else
		{
			$data['table'] = $this->M_codeigniter->query("
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('DEPO - ',d.`nama_mdepo`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,1 as proces
				FROM tbl_suratjalan s JOIN tbl_depo d ON d.`id_mdepo` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir
				LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id  where s.active = 0 and s.proses < 2
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('PELABUHAN - ',d.`nama_mpelabuhan`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,1 as proces
				FROM tbl_suratjalan s JOIN tbl_pelabuhan d ON d.`id_mpelabuhan` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id  where s.active = 0 and s.proses < 2
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,CONCAT('PLANT - ',d.`nama_mplant`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,1 as proces
				FROM tbl_suratjalan s JOIN tbl_plant d ON d.`id_mplant` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id  where s.active = 0 and s.proses < 2
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.sopir,s.asalsj,s.tujuan AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,1 as proces
				FROM tbl_suratjalan s 
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_keberangkatan pk on pk.fk_idsj = s.id  where s.active = 0 and s.proses < 2
				and s.`jns_tujuan` = 0
			")->result();
		}

		$output = array(
			'html' => $this->load->view('list_suratjalan', $data, true),
		);
		echo json_encode($output);
	}

	function myListProses(){
		$id = $this->input->post('id');
		$admin_name = $this->session->userdata('admin_name');
		if ($admin_name == 'admin')
		{
			$data['table'] = $this->M_codeigniter->query("
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.asalsj,s.sopir,CONCAT('DEPO - ',d.`nama_mdepo`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,2 as proces
				FROM tbl_suratjalan s JOIN tbl_depo d ON d.`id_mdepo` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id  where s.active = 0 and s.proses = 1
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.asalsj,s.sopir,CONCAT('PELABUHAN - ',d.`nama_mpelabuhan`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,2 as proces
				FROM tbl_suratjalan s JOIN tbl_pelabuhan d ON d.`id_mpelabuhan` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id  where s.active = 0 and s.proses = 1
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.asalsj,s.sopir,CONCAT('PLANT - ',d.`nama_mplant`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,2 as proces
				FROM tbl_suratjalan s JOIN tbl_plant d ON d.`id_mplant` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id  where s.active = 0 and s.proses = 1
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.asalsj,s.sopir,s.tujuan AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,2 as proces
				FROM tbl_suratjalan s 
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id  where s.active = 0 and s.proses = 1
				and s.`jns_tujuan` = 0
			")->result();
		} else
		{
			$data['table'] = $this->M_codeigniter->query("
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.asalsj,s.sopir,CONCAT('DEPO - ',d.`nama_mdepo`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,2 as proces
				FROM tbl_suratjalan s JOIN tbl_depo d ON d.`id_mdepo` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id  where s.active = 0 and s.proses < 2
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.asalsj,s.sopir,CONCAT('PELABUHAN - ',d.`nama_mpelabuhan`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,2 as proces
				FROM tbl_suratjalan s JOIN tbl_pelabuhan d ON d.`id_mpelabuhan` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id  where s.active = 0 and s.proses < 2
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.asalsj,s.sopir,CONCAT('PLANT - ',d.`nama_mplant`) AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,2 as proces
				FROM tbl_suratjalan s JOIN tbl_plant d ON d.`id_mplant` = s.`tujuan`
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id  where s.active = 0 and s.proses < 2
				UNION
				SELECT s.id,s.nomorsj,s.tanggalberangkat,s.asalsj,s.sopir,s.tujuan AS tujuan,s.`keterangan`,k.nopol,k.ukuran,p.nama_mdriver AS namasopir,j.nama_jenis,s.proses,2 as proces
				FROM tbl_suratjalan s 
				LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id LEFT JOIN tbl_jenis_kendaraan j ON j.id = k.jenis 
				LEFT JOIN tbl_driver p ON p.id_mdriver = s.sopir 
				LEFT JOIN tbl_p_kedatangan pd on pd.fk_idsj = s.id  where s.active = 0 and s.proses < 2
				and s.`jns_tujuan` = 0
			")->result();
		}

		$output = array(
			'html' => $this->load->view('list_suratjalan', $data, true),
		);

		echo json_encode($output);
	}

	function insertData(){
		$id_admin = $this->session->userdata('id_admin');

		$maxid = $this->M_codeigniter->query('SELECT MAX(id)+1  AS `maxid` FROM `tbl_suratjalan`')->row()->maxid;
		$nomor = trim(str_pad($maxid, 5, '0', STR_PAD_LEFT).'/'.trim($this->input->post('bulan')).'/'.trim($this->input->post('departement')));
		$asal = $this->input->post('asal');
		$tujuan = $this->input->post('tujuan');

	    $jenis = $this->input->post('jenis');		

	    if ($jenis == 0)
	    {
	    	$nomor = trim(str_pad($maxid, 5, '0', STR_PAD_LEFT).'/'.trim($this->input->post('bulan')).'/'.trim($this->input->post('departement')).'/'.trim($this->input->post('asal')).'/'.'EXPORT'.'/'.date("Y"));
	    } else if ($jenis == 1)
	    {
	    	$nomor = trim(str_pad($maxid, 5, '0', STR_PAD_LEFT).'/'.trim($this->input->post('bulan')).'/'.trim($this->input->post('departement')).'/'.trim($this->input->post('asal')).'/'.'IMPORT'.'/'.date("Y"));
	    } else if ($jenis == 2)
	    {
	    	$nomor = trim(str_pad($maxid, 5, '0', STR_PAD_LEFT).'/'.trim($this->input->post('bulan')).'/'.trim($this->input->post('departement')).'/'.trim($this->input->post('asal')).'/'.'PLANT'.'/'.date("Y"));
	    } else if ($jenis == 3)
	    {
	    	$nomor = trim(str_pad($maxid, 5, '0', STR_PAD_LEFT).'/'.trim($this->input->post('bulan')).'/'.trim($this->input->post('departement')).'/'.trim($this->input->post('asal')).'/'.'DEPO'.'/'.date("Y"));
	    } else if ($jenis == 4)
	    {
	    	$nomor = trim(str_pad($maxid, 5, '0', STR_PAD_LEFT).'/'.trim($this->input->post('bulan')).'/'.trim($this->input->post('departement')).'/'.trim($this->input->post('asal')).'/'.'KOTA2'.'/'.date("Y"));
	    }
		$jns_tujuan = 1;
		if ($tujuan == 9999)
		{
			$tujuan = $this->input->post('itujuan');
			$jns_tujuan = 0;			
		}
		$size = $this->input->post('size');
		if ($size == 0)
		{
			$tugas = $this->input->post('tugas')."\r\n";
			$sasis = null;
			$nomorcontainer = null;
			$gembok = null;
			$segelpelayaran = null;	
			$segelbeacukai = null;
			$isimuatan = null;
		} else
		{
			$sasis = $this->input->post('sasis');
			if ($sasis == '')
			{
				$sasis = null;
			}
			$nomorcontainer = $this->input->post('nocontainer');
			if ($nomorcontainer == '' or $nomorcontainer == 0)
			{
				$nomorcontainer = null;
			}
			$gembok = $this->input->post('gembok');
			$segelpelayaran = $this->input->post('segelpelayaran');	
			$segelbeacukai = $this->input->post('segelbeacukai');
			$isimuatan = $this->input->post('isimuatan');
			$tugas = null;
		}

		$kendaraan = $this->input->post('kendaraan');
		$sopir = $this->input->post('sopir');
		if ($sopir == 9999 || $sopir == 9998)
		{
			$sopir = $this->input->post('isopir');	
		}
		$tanggal = $this->input->post('tanggal');
		$tanggal = date('Y-m-d',strtotime($tanggal));
		$pic = $this->input->post('pic');
		$keterangan = $this->input->post('keterangan');
		
		// if ($nomorcontainer == 0)
		// {
		// 	$nomorcontainer = null;
		// }
		// if ($sasis == 0)
		// {
		// 	$sasis = null;
		// }
		

		$data_send_1 = array(
			'nomorsj' => $nomor,
			'tujuan' => $tujuan,
			'kendaraan' => $kendaraan,
			'keterangan' => $keterangan,
			'asalsj' => $asal,
			'sopir' => $sopir,
			'sasis' => $sasis,
			'tugas' => $tugas,
			'pic' => $pic,
			'size' => $size,
			'tanggalberangkat' => $tanggal,
			'jns_tujuan' => $jns_tujuan,
			// 'nocontainer' => is_null($nomorcontainer)? '' : $nomorcontainer,
			// 'jenismuatan' => is_null($isimuatan)? '' : $isimuatan,
			// 'gembok' => is_null($gembok)? '' : $gembok,
			// 'segelpelayaran' => is_null($segelpelayaran)? '' : $segelpelayaran,
			// 'segelbeacukai' => is_null($segelbeacukai)? '' : $segelbeacukai
			'nocontainer' => $nomorcontainer,
			'jenismuatan' => $isimuatan,
			'gembok' => $gembok,
			'segelpelayaran' => $segelpelayaran,
			'segelbeacukai' => $segelbeacukai,
			'jenis' => $jenis,
			'created_by' => $id_admin
		);

		$insert = $this->M_codeigniter->insert('tbl_suratjalan', $data_send_1);

		if($insert){
			$id = $this->db->insert_id();
			$data_send_2 = array(
				'fk_idsj' => $id
			);
			$insert2 = $this->M_codeigniter->insert('tbl_p_keberangkatan', $data_send_2);

			$data_send_3 = array(
				'fk_idsj' => $id
			);
			$insert3 = $this->M_codeigniter->insert('tbl_p_kedatangan', $data_send_3);

			$this->load->library('ciqrcode');
			$params['data'] = $nomor;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = 'assets/img/'.$id.'.png';
			$this->ciqrcode->generate($params);

			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function prosesUpdate(){

		$id_admin = $this->session->userdata('id_admin');
		$idsj = $this->input->post('id');
		$nomorsj = $this->input->post('nomorsj');
		$nomorsj = substr($nomorsj,6);
		$maxid = $this->M_codeigniter->query('SELECT MAX(id)+1  AS `maxid` FROM `tbl_suratjalan`')->row()->maxid;
		$nomorsj = str_pad($maxid, 5, '0', STR_PAD_LEFT).'/'.$nomorsj;
		
		$asal = $this->input->post('asal');
		$tujuan = $this->input->post('tujuan');

		$jns_tujuan = 1;
		if ($tujuan == 9999)
		{
			$tujuan = $this->input->post('itujuan');
			$jns_tujuan = 0;			
		}
		$size = $this->input->post('size');
		$jenis = $this->input->post('jenis');
		if ($size == 0)
		{
			$tugas = $this->input->post('tugas')."\r\n";
			$sasis = null;
			$nomorcontainer = null;
			$gembok = null;
			$segelpelayaran = null;	
			$segelbeacukai = null;
			$isimuatan = null;
		} else
		{
			$sasis = $this->input->post('sasis');
			if ($sasis == '')
			{
				$sasis = null;
			}
			$nomorcontainer = $this->input->post('nocontainer');
			if ($nomorcontainer == '' or $nomorcontainer == 0)
			{
				$nomorcontainer = null;
			}
			$gembok = $this->input->post('gembok');
			$segelpelayaran = $this->input->post('segelpelayaran');	
			$segelbeacukai = $this->input->post('segelbeacukai');
			$isimuatan = $this->input->post('isimuatan');
			$tugas = null;
		}

		$kendaraan = $this->input->post('kendaraan');
		$sopir = $this->input->post('sopir');
		if ($sopir == 9999 || $sopir == 9998)
		{
			$sopir = $this->input->post('isopir');	
		}
		$tanggal = $this->input->post('tanggal');
		$tanggal = date('Y-m-d',strtotime($tanggal));
		$pic = $this->input->post('pic');
		$keterangan = $this->input->post('keterangan');

		$data_send_1 = array(
			'nomorsj' => $nomorsj,
			'tujuan' => $tujuan,
			'kendaraan' => $kendaraan,
			'keterangan' => $keterangan,
			'asalsj' => $asal,
			'sopir' => $sopir,
			'sasis' => $sasis,
			'tugas' => $tugas,
			'pic' => $pic,
			'size' => $size,
			'tanggalberangkat' => $tanggal,
			'jns_tujuan' => $jns_tujuan,
			'nocontainer' => $nomorcontainer,
			'jenismuatan' => $isimuatan,
			'gembok' => $gembok,
			'segelpelayaran' => $segelpelayaran,
			'segelbeacukai' => $segelbeacukai,
			'jenis' => $jenis,
			'updated_by' => $id_admin,
			'ref' => $idsj
		);

		$insert = $this->M_codeigniter->insert('tbl_suratjalan', $data_send_1);

		if($insert){
			$id = $this->db->insert_id();
			$data_send_2 = array(
				'fk_idsj' => $id
			);
			$insert2 = $this->M_codeigniter->insert('tbl_p_keberangkatan', $data_send_2);

			$data_send_3 = array(
				'fk_idsj' => $id
			);
			$insert3 = $this->M_codeigniter->insert('tbl_p_kedatangan', $data_send_3);

			$data_send_1 = array(
				'active' 	=> 1,
			);
			$delete = $this->M_codeigniter->update('tbl_suratjalan', $data_send_1, array('id' => $idsj));

			$this->load->library('ciqrcode');
			$params['data'] = $nomorsj;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = 'assets/img/'.$id.'.png';
			$this->ciqrcode->generate($params);

			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}

	function prosesUpdateMasterBiaya(){

		$id_admin = $this->session->userdata('id_admin');
		$id	= $this->input->post('id');
		$nomorkasbon = $this->input->post('nomorkasbon');
		$tanggal = $this->input->post('tanggal');
		$tanggal = date('Y-m-d',strtotime($tanggal));
		$nominal = $this->input->post('nominal');

		$data_send_2 = array(
				'nomor_kasbon' => $nomorkasbon,
				'tanggal' => $tanggal,
				'nominal' => $nominal
		);

		$update = $this->M_codeigniter->update('tbl_biaya', $data_send_2, array('id' => $id));

		if($update){
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

	function insertDetail(){
		$id_admin = $this->session->userdata('id_admin');
		$iditem = $this->input->post('item');
		$idsuratjalan = $this->input->post('id_suratjalan');

		$cek = $this->M_codeigniter->get_where('tbl_suratjalan', array('id' => $idsuratjalan))->num_rows();
		if($cek == 1){
			$data_send_1 = array(
				'item'=> $iditem,
				'fk_idsj'=> $idsuratjalan,
			);
			$insert = $this->M_codeigniter->insert('tbl_detailsuratjalan', $data_send_1);
		}
		else{$insert = false;}
		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	public function detailSuratJalan($id = null){
		$data['id']	= $id;
		$data['barang'] = $this->M_codeigniter->query("SELECT id,nama_barang FROM  tbl_master_barang ")->result();
		$data['content_header'] = 'Tambah Item Barang';
		$data['breadcrumb'] = array(
			array('Form Surat Jalan',base_url('SuratJalan')),
			array('Tambah Item Barang',base_url('SuratJalan/detailSuratJalan/'.$id)),
		);
		$data['content'] = 'detailsuratjalan';
		$data['js_file'] = 'detailsuratjalan';
		$this->load->view('component/main', $data);
	}

	function myListItem(){
		$id = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT d.id,b.id as idbarang,b.nama_barang 			
			FROM tbl_suratjalan s 
			JOIN tbl_detailsuratjalan d ON s.id = d.fk_idsj
			JOIN tbl_master_barang b ON b.id = d.item
			where s.id = $id
		")->result();
		$output = array(
			'html' => $this->load->view('list_suratjalan_detail', $data, true),
		);
		echo json_encode($output);
	}

	function deleteDetailData(){
		$id = $this->input->post('id');
		$delete = $this->M_codeigniter->delete('tbl_detailsuratjalan', array('id' => $id));
		if ($delete) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function getKendaraan($ukuran = 0){
		$option = "";
		$ukuran = $this->input->post('ukuran');

		if ($ukuran == 0) {
			$data = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k left join tbl_jenis_kendaraan j on j.id = k.jenis
			where k.ukuran = 'kecil' and k.active = 0
			ORDER BY j.nama_jenis ASC
			")->result();
		} else
		{
			$data = $this->M_codeigniter->query("
			SELECT k.id,k.nopol,j.nama_jenis
			FROM tbl_kendaraan k left join tbl_jenis_kendaraan j on j.id = k.jenis
			where k.ukuran = 'besar' and k.active = 0
			ORDER BY j.nama_jenis ASC
			")->result();
		}
		
		foreach($data as $row){
			$option .= "<option value='".$row->id."'>".strtoupper($row->nopol)." / ".strtoupper($row->nama_jenis)."</option>";
		}

		echo json_encode($option);
	}

	function getSasis(){
		$option = "";
		$option .= "<option></option>";
		$id_plant = $this->input->post('plant');
		$data = $this->M_codeigniter->query("
			SELECT s.id,s.chasis,s.nokir
			FROM tbl_chasis s
			ORDER BY s.chasis ASC
		")->result();
		
		foreach($data as $row){
			$option .= "<option value='".$row->id."'>".strtoupper($row->chasis)." / ".strtoupper($row->nokir)."</option>";
		}
		echo json_encode($option);
	}

	function getTujuan(){
		$option = "";
		$data = $this->M_codeigniter->query("
			SELECT id_mplant as id,CONCAT('PLANT - ',nama_mplant,'/',muatan,'/',bagian,'/',pic) AS description    FROM tbl_plant
			UNION
			SELECT id_mdepo as id,CONCAT('DEPO - ',nama_mdepo,'/',idx) AS description FROM tbl_depo
			UNION
			SELECT id_mpelabuhan as id,CONCAT('PELABUHAN - ',nama_mpelabuhan,'/',idx) AS description FROM tbl_pelabuhan
		")->result();
		foreach($data as $row){
			$option .= "<option value='".$row->id."'>".strtoupper($row->description)."</option>";
		}
		$option .= "<option value=9999>OTHER</option>";
		echo json_encode($option);
	}

	function getSopir(){
		$option = "";
		$jns = $this->input->post('jns');

		if ($jns == 0)
		{
			$data = $this->M_codeigniter->query("
			SELECT p.id_mdriver,p.nama_mdriver
			FROM tbl_driver p where p.jns_kendaraan = 'kecil'
			ORDER BY p.nama_mdriver ASC
			")->result();
		} else
		{
			$data = $this->M_codeigniter->query("
			SELECT p.id_mdriver,p.nama_mdriver
			FROM tbl_driver p where p.jns_kendaraan = 'besar'
			ORDER BY p.nama_mdriver ASC
			")->result();
		}

		
		foreach($data as $row){
			$option .= "<option value='".$row->id_mdriver."'>".strtoupper($row->nama_mdriver)."</option>";
		}
		echo json_encode($option);
	}

	function getContainer(){
		$option = "";
		$option .= "<option value=0>&nbsp;</option>";
		$id_plant = $this->input->post('plant');
		$data = $this->M_codeigniter->query("
			SELECT id,container,noequipment
			FROM tbl_container where active = 0
			UNION
			SELECT id,container,noequipment
			FROM tbl_container_rent where active = 0
			ORDER BY container ASC
		")->result();
		foreach($data as $row){
		    $option .= "<option value='".$row->id."'>".strtoupper($row->container)." / ".strtoupper($row->noequipment)."</option>";
		}
		echo json_encode($option);
	}

	function formPreview(){
		$id = $this->input->post('id');

		$data['hasil'] = $this->M_codeigniter->query("			
	    	  SELECT sj.nomorsj,sj.keterangan,sj.tanggalberangkat,sj.asalsj,IFNULL(sj.tugas,'') AS tugas,k.`nopol`,j.nama_jenis AS nama_kendaraan, 
	          p.`nama_mpelabuhan` AS tujuan,IFNULL(s.chasis,'') AS chasis,IFNULL(ifnull(d.nama_mdriver,sj.sopir),'') AS sopir,ifnull(c.container,'') as nocontainer,
			  sj.jenismuatan,sj.gembok,sj.segelpelayaran,sj.segelbeacukai,
				IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(pk.tglberangkat,'%d-%m-%Y') ,CONCAT(IFNULL(DATE_FORMAT(pk.tglberangkat,'%d-%m-%Y'),''),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS tglberangkat, 
				IF(IFNULL(r.rjamberangkat,'') = '',  pk.jamkeluar, CONCAT(pk.jamkeluar,' [rev] ',r.rjamberangkat)) AS jamkeluar, 
				pk.temperatur AS ktemperatur,pk.jenismuatan AS kjenismuatan,pk.beratkosong AS kberatkosong,pk.beratisi AS kberatisi,
				pk.gembok AS kgembok,pk.segelpelayaran AS ksegelpelayaran,pk.segelbeacukai AS ksegelbeacukai,pk.kmawal,ifnull(kc.container,'') AS knocontainer,
				IFNULL(ks.chasis,'') AS ksasis,IFNULL(kd.nama_mdriver,'') AS knamasopir,kk.nopol AS knomorpolisi,pk.keterangan AS kketerangan,pk.pic1,
				IF(IFNULL(r.rtgltiba,'') = '', DATE_FORMAT(pd.tgltiba,'%d-%m-%Y') , CONCAT(IFNULL(DATE_FORMAT(pd.tgltiba,'%d-%m-%Y'),''),' [rev] ', DATE_FORMAT(r.rtgltiba,'%d-%m-%Y'))) AS tgltiba, 
				IF(IFNULL(r.rjamtiba,'') = '',  pd.jammasuk, CONCAT(pd.jammasuk,' [rev] ',r.rjamtiba)) AS jammasuk, 
				pd.temperatur AS dtemperatur,pd.jenismuatan AS djenismuatan,pd.beratkosong AS dberatkosong,pd.beratisi AS dberatisi,
				pd.gembok AS dgembok,pd.segelpelayaran AS dsegelpelayaran,pd.segelbeacukai AS dsegelbeacukai,pd.kmakhir,ifnull(dc.container,'') AS dnocontainer,
				IFNULL(ds.chasis,'') AS dsasis,IFNULL(dd.nama_mdriver,'') AS dnamasopir,dk.nopol AS dnomorpolisi,pd.keterangan AS dketerangan,pd.pic2,sj.size,
				sj.pic  
	          FROM tbl_suratjalan sj 
	          JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) c ON c.id = sj.nocontainer
	          LEFT JOIN tbl_p_keberangkatan pk ON pk.fk_idsj = sj.id
			  LEFT JOIN tbl_driver kd ON kd.`id_mdriver` = pk.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = pk.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = pk.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = pk.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan pd ON pd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = pd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = pd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = pd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = pd.nomorpolisi
	          left join tbl_p_revisi r on r.rfk_idsj = sj.id
	          WHERE sj.id = ".$id."
	          UNION
	          SELECT sj.nomorsj,sj.keterangan,sj.tanggalberangkat,sj.asalsj,IFNULL(sj.tugas,'') AS tugas,k.`nopol`,j.nama_jenis AS nama_kendaraan, 
	          p.`nama_mdepo` AS tujuan, IFNULL(s.chasis,'') AS chasis,IFNULL(ifnull(d.nama_mdriver,sj.sopir),'') AS sopir,ifnull(c.container,'') as nocontainer,
			  sj.jenismuatan,sj.gembok,sj.segelpelayaran,sj.segelbeacukai,
				IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(pk.tglberangkat,'%d-%m-%Y') ,
				 CONCAT(IFNULL(DATE_FORMAT(pk.tglberangkat,'%d-%m-%Y'),''),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS tglberangkat, 
				IF(IFNULL(r.rjamberangkat,'') = '',  pk.jamkeluar, CONCAT(pk.jamkeluar,' [rev] ',r.rjamberangkat)) AS jamkeluar, 
				pk.temperatur AS ktemperatur,pk.jenismuatan AS kjenismuatan,pk.beratkosong AS kberatkosong,pk.beratisi AS kberatisi,
				pk.gembok AS kgembok,pk.segelpelayaran AS ksegelpelayaran,pk.segelbeacukai AS ksegelbeacukai,pk.kmawal,ifnull(kc.container,'') AS knocontainer,
				IFNULL(ks.chasis,'') AS ksasis,IFNULL(kd.nama_mdriver,'') AS knamasopir,kk.nopol AS knomorpolisi,pk.keterangan AS kketerangan,pk.pic1,
				IF(IFNULL(r.rtgltiba,'') = '', DATE_FORMAT(pd.tgltiba,'%d-%m-%Y') , CONCAT(IFNULL(DATE_FORMAT(pd.tgltiba,'%d-%m-%Y'),''),' [rev] ', DATE_FORMAT(r.rtgltiba,'%d-%m-%Y'))) AS tgltiba, 
				IF(IFNULL(r.rjamtiba,'') = '',  pd.jammasuk, CONCAT(pd.jammasuk,' [rev] ',r.rjamtiba)) AS jammasuk, 
				pd.temperatur AS dtemperatur,pd.jenismuatan AS djenismuatan,pd.beratkosong AS dberatkosong,pd.beratisi AS dberatisi,
				pd.gembok AS dgembok,pd.segelpelayaran AS dsegelpelayaran,pd.segelbeacukai AS dsegelbeacukai,pd.kmakhir,ifnull(dc.container,'') AS dnocontainer,
				IFNULL(ds.chasis,'') AS dsasis,IFNULL(dd.nama_mdriver,'') AS dnamasopir,dk.nopol AS dnomorpolisi,pd.keterangan AS dketerangan,pd.pic2,sj.size,
				sj.pic 
	          FROM tbl_suratjalan sj 
	          JOIN tbl_depo p ON p.`id_mdepo` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) c ON c.id = sj.nocontainer
	          LEFT JOIN tbl_p_keberangkatan pk ON pk.fk_idsj = sj.id
			  LEFT JOIN tbl_driver kd ON kd.`id_mdriver` = pk.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = pk.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = pk.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = pk.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan pd ON pd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = pd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = pd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = pd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = pd.nomorpolisi
	          left join tbl_p_revisi r on r.rfk_idsj = sj.id
	          WHERE sj.id = ".$id." 
	          UNION
	          SELECT sj.nomorsj,sj.keterangan,sj.tanggalberangkat,sj.asalsj,IFNULL(sj.tugas,'') AS tugas,k.`nopol`,j.nama_jenis AS nama_kendaraan, 
	          p.`nama_mplant` AS tujuan, IFNULL(s.chasis,'') AS chasis,IFNULL(ifnull(d.nama_mdriver,sj.sopir),'') AS sopir,ifnull(c.container,'') as nocontainer,
			  sj.jenismuatan,sj.gembok,sj.segelpelayaran,sj.segelbeacukai,
				IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(pk.tglberangkat,'%d-%m-%Y') ,
				 CONCAT(IFNULL(DATE_FORMAT(pk.tglberangkat,'%d-%m-%Y'),''),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS tglberangkat, 
				IF(IFNULL(r.rjamberangkat,'') = '',  pk.jamkeluar, CONCAT(pk.jamkeluar,' [rev] ',r.rjamberangkat)) AS jamkeluar, 
				pk.temperatur AS ktemperatur,pk.jenismuatan AS kjenismuatan,pk.beratkosong AS kberatkosong,pk.beratisi AS kberatisi,
				pk.gembok AS kgembok,pk.segelpelayaran AS ksegelpelayaran,pk.segelbeacukai AS ksegelbeacukai,pk.kmawal,ifnull(kc.container,'') AS knocontainer,
				IFNULL(ks.chasis,'') AS ksasis,IFNULL(kd.nama_mdriver,'') AS knamasopir,kk.nopol AS knomorpolisi,pk.keterangan AS kketerangan,pk.pic1,
				IF(IFNULL(r.rtgltiba,'') = '', DATE_FORMAT(pd.tgltiba,'%d-%m-%Y') , CONCAT(IFNULL(DATE_FORMAT(pd.tgltiba,'%d-%m-%Y'),''),' [rev] ', DATE_FORMAT(r.rtgltiba,'%d-%m-%Y'))) AS tgltiba, 
				IF(IFNULL(r.rjamtiba,'') = '',  pd.jammasuk, CONCAT(pd.jammasuk,' [rev] ',r.rjamtiba)) AS jammasuk, 
				pd.temperatur AS dtemperatur,pd.jenismuatan AS djenismuatan,pd.beratkosong AS dberatkosong,pd.beratisi AS dberatisi,
				pd.gembok AS dgembok,pd.segelpelayaran AS dsegelpelayaran,pd.segelbeacukai AS dsegelbeacukai,pd.kmakhir,ifnull(dc.container,'') AS dnocontainer,
				IFNULL(ds.chasis,'') AS dsasis,IFNULL(dd.nama_mdriver,'') AS dnamasopir,dk.nopol AS dnomorpolisi,pd.keterangan AS dketerangan,pd.pic2,sj.size,
				sj.pic 
	          FROM tbl_suratjalan sj 
	          JOIN tbl_plant p ON p.`id_mplant` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) c ON c.id = sj.nocontainer
	          LEFT JOIN tbl_p_keberangkatan pk ON pk.fk_idsj = sj.id
			  LEFT JOIN tbl_driver kd ON kd.`id_mdriver` = pk.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = pk.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = pk.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = pk.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan pd ON pd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = pd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = pd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = pd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = pd.nomorpolisi
	          left join tbl_p_revisi r on r.rfk_idsj = sj.id
	          WHERE sj.id = ".$id." 
	          UNION
	          SELECT sj.nomorsj,sj.keterangan,sj.tanggalberangkat,sj.asalsj,IFNULL(sj.tugas,'') AS tugas,k.`nopol`,j.nama_jenis AS nama_kendaraan, 
	          sj.`tujuan` AS tujuan, IFNULL(s.chasis,'') AS chasis,IFNULL(ifnull(d.nama_mdriver,sj.sopir),'') AS sopir,ifnull(c.container,'') as nocontainer,
			  sj.jenismuatan,sj.gembok,sj.segelpelayaran,sj.segelbeacukai,
				IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(pk.tglberangkat,'%d-%m-%Y') ,
				 CONCAT(IFNULL(DATE_FORMAT(pk.tglberangkat,'%d-%m-%Y'),''),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS tglberangkat, 
				IF(IFNULL(r.rjamberangkat,'') = '',  pk.jamkeluar, CONCAT(pk.jamkeluar,' [rev] ',r.rjamberangkat)) AS jamkeluar, 
				pk.temperatur AS ktemperatur,pk.jenismuatan AS kjenismuatan,pk.beratkosong AS kberatkosong,pk.beratisi AS kberatisi,
				pk.gembok AS kgembok,pk.segelpelayaran AS ksegelpelayaran,pk.segelbeacukai AS ksegelbeacukai,pk.kmawal,ifnull(kc.container,'') AS knocontainer,
				IFNULL(ks.chasis,'') AS ksasis,IFNULL(kd.nama_mdriver,'') AS knamasopir,kk.nopol AS knomorpolisi,pk.keterangan AS kketerangan,pk.pic1,
				IF(IFNULL(r.rtgltiba,'') = '', DATE_FORMAT(pd.tgltiba,'%d-%m-%Y') , CONCAT(IFNULL(DATE_FORMAT(pd.tgltiba,'%d-%m-%Y'),''),' [rev] ', DATE_FORMAT(r.rtgltiba,'%d-%m-%Y'))) AS tgltiba, 
				IF(IFNULL(r.rjamtiba,'') = '',  pd.jammasuk, CONCAT(pd.jammasuk,' [rev] ',r.rjamtiba)) AS jammasuk, 
				pd.temperatur AS dtemperatur,pd.jenismuatan AS djenismuatan,pd.beratkosong AS dberatkosong,pd.beratisi AS dberatisi,
				pd.gembok AS dgembok,pd.segelpelayaran AS dsegelpelayaran,pd.segelbeacukai AS dsegelbeacukai,pd.kmakhir,ifnull(dc.container,'') AS dnocontainer,
				IFNULL(ds.chasis,'') AS dsasis,IFNULL(dd.nama_mdriver,'') AS dnamasopir,dk.nopol AS dnomorpolisi,pd.keterangan AS dketerangan,pd.pic2,sj.size,
				sj.pic 
	          FROM tbl_suratjalan sj 
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) c ON c.id = sj.nocontainer
	          LEFT JOIN tbl_p_keberangkatan pk ON pk.fk_idsj = sj.id
			  LEFT JOIN tbl_driver kd ON kd.`id_mdriver` = pk.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = pk.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = pk.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = pk.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan pd ON pd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = pd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = pd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = pd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = pd.nomorpolisi
	          left join tbl_p_revisi r on r.rfk_idsj = sj.id
	          WHERE sj.id = ".$id." AND sj.`jns_tujuan` = 0
        ")->result();

		$output = array(
			'html' => $this->load->view('preview_suratjalan',$data,true),
		);

		echo json_encode($output);
	}

	function reportSuratJalan($id = 0){
		$data['hasil'] = $this->M_codeigniter->query("
			SELECT s.*,k.nopol,ifnull(d.nama_mdriver,s.sopir) as nama,p.`nama_mplant` AS tujuansj,'' as alamat,s.jenismuatan,s.segelpelayaran,c.chasis,cont.container 
			FROM tbl_suratjalan s left join tbl_p_kendaraan pk on pk.fk_idsj = s.nomorsj JOIN tbl_plant p ON s.tujuan = p.id_mplant 
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id left join tbl_chasis c on c.id = s.sasis
			LEFT JOIN tbl_driver d ON d.id_mdriver = s.sopir 
			LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) as cont ON cont.id = s.nocontainer WHERE s.id = '".$id."' UNION
			SELECT s.*,k.nopol,ifnull(d.nama_mdriver,s.sopir) as nama,p.`idx` AS tujuansj,p.alamat as alamat,s.jenismuatan,s.segelpelayaran,c.chasis,cont.container 
			FROM tbl_suratjalan s left join tbl_p_kendaraan pk on pk.fk_idsj = s.nomorsj JOIN tbl_depo p ON s.tujuan = p.id_mdepo 
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id left join tbl_chasis c on c.id = s.sasis 
			LEFT JOIN tbl_driver d ON d.id_mdriver = s.sopir  
			LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) as cont ON cont.id = s.nocontainer WHERE s.id = '".$id."' UNION
			SELECT s.*,k.nopol,ifnull(d.nama_mdriver,s.sopir) as nama,p.`idx` AS tujuansj,p.alamat as alamat,s.jenismuatan,s.segelpelayaran,c.chasis,cont.container 
			FROM tbl_suratjalan s left join tbl_p_kendaraan pk on pk.fk_idsj = s.nomorsj JOIN tbl_pelabuhan p ON s.tujuan = p.id_mpelabuhan 
			LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id left join tbl_chasis c on c.id = s.sasis
			LEFT JOIN tbl_driver d ON d.id_mdriver = s.sopir  
			LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) as cont ON cont.id = s.nocontainer WHERE s.id = '".$id."' UNION
			SELECT s.*,k.nopol,ifnull(d.nama_mdriver,s.sopir) as nama,s.`tujuan` AS tujuansj,'' as alamat,s.jenismuatan,s.segelpelayaran,c.chasis,cont.container 
			FROM tbl_suratjalan s left join tbl_p_kendaraan pk on pk.fk_idsj = s.nomorsj LEFT JOIN tbl_kendaraan k ON s.kendaraan = k.id left join tbl_chasis c on c.id = s.sasis
			LEFT JOIN tbl_driver d ON d.id_mdriver = s.sopir  
			LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) as cont ON cont.id = s.nocontainer WHERE s.id = '".$id."' AND s.`jns_tujuan` = 0
		")->result();

			// echo $this->db->last_query();

    	if ($data['hasil'][0]->size == 1) 
    	{
    		$this->load->library('pdf');
	        $this->data['title_pdf'] = 'Cetak Surat Jalan';
	        $file_pdf = 'cetak_surat_jalan';
		    $paper = 'A4';
	        $orientation = "portrait"; 
			$html = $this->load->view('list_report_sj',$data,true);
	        $this->pdf->generate($html, $file_pdf,$paper,$orientation);	
    	} else
    	{
    		$this->load->library('pdf');
	        $this->data['title_pdf'] = 'Cetak Surat Jalan';
	        $file_pdf = 'cetak_surat_jalan';
	        $paper = 'A4';
			$orientation = "landscape";
			$html = $this->load->view('list_report_sjk',$data,true);
	        $this->pdf->generate($html, $file_pdf,$paper,$orientation);
    	}

	}
 
	function deleteData(){
		$id = $this->input->post('id');
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
		   $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		$data_send_1 = array(
				'active' => 1,
				'ip_address' => $ipaddress 
		);
		//$delete = $this->M_codeigniter->delete('tbl_inspeksi', array('id_paket' => $id));
		$delete = $this->M_codeigniter->update('tbl_suratjalan', $data_send_1, array('id' => $id));
		if ($delete) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}


}