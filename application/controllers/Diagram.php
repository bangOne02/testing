<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagram extends CI_Controller {
	public function __construct() {
    parent::__construct();
  	if($this->session->userdata('login') != TRUE) {
  		redirect('');
		  
	  	}
	}

	public function index(){
		$data['content_header'] = 'Diagram Activity';
		$data['content'] = 'diagram';
		$data['js_file'] = 'diagram';
		$this->load->view('component/main',$data);
	}

	public function dataChasis(){
		$data['content_header'] = 'Diagram Activity';
		$data['breadcrumb'] = array(
			array('Data Chasis',base_url('dataChasis')),
		);
		$data['content'] = 'chasis';
		$data['js_file'] = 'diagram';
		$this->load->view('component/main',$data);
	}

	public function dataTujuan(){
		$data['content_header'] = 'Diagram Activity';
		$data['breadcrumb'] = array(
			array('Data Tujuan',base_url('dataTujuan')),
		);
		$data['content'] = 'tujuan';
		$data['js_file'] = 'diagram';
		$this->load->view('component/main',$data);
	}

	public function dataPlant(){
		$data['content_header'] = 'Data Plant';
		$data['breadcrumb'] = array(
			array('Data Plant',base_url('dataPlant')),
		);
		$data['content'] = 'plant';
		$data['js_file'] = 'diagram';
		$this->load->view('component/main',$data);
	}

	public function dataDepo(){
		$data['content_header'] = 'Data Depo';
		$data['breadcrumb'] = array(
			array('Data Depo',base_url('dataDepo')),
		);
		$data['content'] = 'depo';
		$data['js_file'] = 'diagram';
		$this->load->view('component/main',$data);
	}

	public function dataPelabuhan(){
		$data['content_header'] = 'Data Pelabuhan';
		$data['breadcrumb'] = array(
			array('Data Pelabuhan',base_url('dataPelabuhan')),
		);
		$data['content'] = 'pelabuhan';
		$data['js_file'] = 'diagram';
		$this->load->view('component/main',$data);
	}

	public function dataSopir(){
		$data['content_header'] = 'Diagram Activity';
		$data['breadcrumb'] = array(
			array('Data Sopir',base_url('dataSopir')),
		);
		$data['content'] = 'sopir';
		$data['js_file'] = 'diagram';
		$this->load->view('component/main',$data);
	}

	public function dataContainer(){
		$data['content_header'] = 'Diagram Activity';
		$data['breadcrumb'] = array(
			array('Data Container',base_url('dataContainer')),
		);
		$data['content'] = 'container';
		$data['js_file'] = 'diagram';
		$this->load->view('component/main',$data);
	}

	function myListTujuan(){
		$id_plant = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT *
			FROM tbl_tujuan
		")->result();
		$output = array(
			'html' => $this->load->view('list_tujuan', $data, true),
		);
		echo json_encode($output);
	}

	function myListChasis(){
		$id_plant = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT c.*,
			(
				SELECT kb.tglberangkat
				FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj  
				WHERE kb.sasis = c.id ORDER BY kb.id DESC LIMIT 1
			) AS tglberangkat,
			(
				SELECT kb.jamkeluar
				FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj  
				WHERE kb.sasis = c.id ORDER BY kb.id DESC LIMIT 1
			) AS jamkeluar,
			(
				SELECT kd.tgltiba 
				FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj  
				WHERE kb.sasis = c.id ORDER BY kb.id DESC LIMIT 1
			) AS tgltiba,
			(
				SELECT kd.jammasuk 
				FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj  
				WHERE kb.sasis = c.id ORDER BY kb.id DESC LIMIT 1
			) AS jamtiba,
			(
				SELECT a.fk_plant 
				FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj 
				LEFT JOIN tbl_admin a ON a.id_admin = kd.updated_by 
				WHERE kb.sasis = c.id ORDER BY kb.id DESC LIMIT 1
			) AS lokasi
			FROM tbl_chasis c where c.active = 0
		")->result();
		$output = array(
			'html' => $this->load->view('list_chasis', $data, true),
		);
		echo json_encode($output);
	}

	function myListSopir(){
		$id_plant = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT *
			FROM tbl_driver where active = 0
		")->result();
		$output = array(
			'html' => $this->load->view('list_sopir', $data, true),
		);
		echo json_encode($output);
	}

	function myListContainer(){
		$id_plant = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT *
			FROM tbl_container where active = 0
		")->result();
		$output = array(
			'html' => $this->load->view('list_container', $data, true),
		);
		echo json_encode($output);
	}

	public function dataDivisi(){

		$data['content_header'] = 'Diagram Activity';
		$data['breadcrumb'] = array(
			array('Data Divisi',base_url('Diagram/dataDivisi')),
		);
		$data['content'] = 'divisi';
		$data['js_file'] = 'diagram';

		$this->load->view('component/main',$data);
	}

	function myListDivisi(){
		$id_plant = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT id_mdivisi,nama_mdivisi
			FROM tbl_divisi
		")->result();
		$output = array(
			'html' => $this->load->view('list_divisi', $data, true),
		);
		$output['data'] = $data['table'];
		echo json_encode($output);
	}

	function myListPlant(){
		$id_plant = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT *
			FROM tbl_plant
		")->result();
		$output = array(
			'html' => $this->load->view('list_plant', $data, true),
		);
		echo json_encode($output);
	}

	function myListDepo(){
		$id_plant = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT *
			FROM tbl_depo
		")->result();
		$output = array(
			'html' => $this->load->view('list_depo', $data, true),
		);
		echo json_encode($output);
	}

	function myListPelabuhan(){
		$id_plant = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->query("
			SELECT *
			FROM tbl_pelabuhan
		")->result();
		$output = array(
			'html' => $this->load->view('list_pelabuhan', $data, true),
		);
		echo json_encode($output);
	}

	public function dataAutorisasi(){
		$data['content_header'] = 'Data Autorisasi';
		$data['breadcrumb'] = array(
			array('Data Autorisasi',base_url('Diagram/dataAutorisasi')),
		);
		$data['content'] = 'autorisasi';
		$data['js_file'] = 'diagram';
		$this->load->view('component/main',$data);
	}

	function insertSopir(){
		// $namadriver = $this->session->userdata('namadriver');
		$namadriver = $this->input->post('namadriver');
		$jenissim = $this->input->post('jenissim');
		$nomorsim = $this->input->post('nomorsim');
		$nomorhp = $this->input->post('nomorhp');
		$jeniskendaraan = $this->input->post('jeniskendaraan');

		$data_send_1 = array(
				'nama_mdriver'=> $namadriver,
				'jns_kendaraan'=> $jeniskendaraan,
				'nomorsim' => $nomorsim,
				'jenissim' => $jenissim,
				'no_hp' => $nomorhp
			);

		$insert = $this->M_codeigniter->insert('tbl_driver', $data_send_1);

		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}

		echo json_encode($output);
	}

	function insertDepo(){
		// $namadriver = $this->session->userdata('namadriver');
		$namadepo = $this->input->post('namadepo');
		$idx = $this->input->post('idx');
		$alamat = $this->input->post('alamat');
		$data_send_1 = array(
				'nama_mdepo'=> $namadepo,
				'idx'=> $idx,
				'alamat'=> $alamat
		);
		$insert = $this->M_codeigniter->insert('tbl_depo', $data_send_1);
		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function insertPelabuhan(){
		// $namadriver = $this->session->userdata('namadriver');
		$namapelabuhan = $this->input->post('namapelabuhan');
		$idx = $this->input->post('idx');
		$alamat = $this->input->post('alamat');
		$data_send_1 = array(
				'nama_mpelabuhan'=> $namapelabuhan,
				'idx'=> $idx,
				'alamat'=> $alamat
		);
		$insert = $this->M_codeigniter->insert('tbl_pelabuhan', $data_send_1);
		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function insertPlant(){
		// $namadriver = $this->session->userdata('namadriver');
		$namaplant = $this->input->post('namaplant');
		$bagian = $this->input->post('bagian');
		$muatan = $this->input->post('muatan');
		$pic = $this->input->post('pic');
		$data_send_1 = array(
				'nama_mplant'=> $namaplant,
				'muatan'=> $muatan,
				'bagian'=> $bagian,
				'pic'=> $pic
		);
		$insert = $this->M_codeigniter->insert('tbl_plant', $data_send_1);
		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function insertChasis(){
		// $namadriver = $this->session->userdata('namadriver');
		$insert = false;
		$namachasis = $this->input->post('namachasis');
		$namachasis = "CHASIS".$namachasis;
		$nomorkir = $this->input->post('nomorkir');
		$masaberlaku = $this->input->post('masaberlaku');
		if ($masaberlaku != '')
		{
			$masaberlaku = date('Y-m-d',strtotime($masaberlaku));    
		}
		
		$namapemilik = $this->input->post('namapemilik');
		$costcenter = $this->input->post('costcenter');
		$deskripsi = $this->input->post('deskripsi');
		$nomorasset = $this->input->post('nomorasset');

		$cek = $this->M_codeigniter->get_where('tbl_chasis', array('chasis' => $namachasis,'active' => 0))->num_rows();
		if($cek == 0){
			$data_send_1 = array(
					'chasis'=> $namachasis,
					'nokir'=> $nomorkir,
					'masa_berlaku_kir'=> $masaberlaku,
					'nama_pemilik'=> $namapemilik,
					'costcenter'=> $costcenter,
					'desc'=> $deskripsi,
					'noasset'=> $nomorasset
			);
			$insert = $this->M_codeigniter->insert('tbl_chasis', $data_send_1);
		}

		// echo $this->db->last_query();
		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function insertContainer(){
		$insert = false;
		$namacontainer = preg_replace('/\s+/', '', $this->input->post('namacontainer'));
		$kondisi = $this->input->post('kondisi');
		$costcenter = $this->input->post('costcenter');
		$noasset = $this->input->post('noasset');
		$noequipment = $this->input->post('noequipment');
		$deskripsi = $this->input->post('deskripsi');

		$cek = $this->M_codeigniter->get_where('tbl_container', array('container' => $namacontainer,'active' => 0))->num_rows();
		if($cek == 0){
			$data_send_1 = array(
				'container'=> $namacontainer,
				'kondisi'=> $kondisi,
				'costcenter'=> $costcenter,
				'noasset'=> $noasset,
				'noequipment'=> $noequipment,
				'desc'=> $deskripsi
			);

			$insert = $this->M_codeigniter->insert('tbl_container', $data_send_1);
		}

		// echo $this->db->last_query();
		if($insert){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function deleteDataSopir(){
		$id_driver = $this->input->post('id');
		$data_send_1 = array(
				'active' 	=> 1,
			);
	//	$delete = $this->M_codeigniter->update('tbl_driver', array('id_mdriver' => $id_driver));
		$delete = $this->M_codeigniter->update('tbl_driver', $data_send_1, array('id_mdriver' => $id_driver));

		// echo $this->db->last_query();
		if($delete){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function deleteDataChasis(){
		$id = $this->input->post('id');
		$data_send_1 = array(
				'active' 	=> 1,
			);
		//$delete = $this->M_codeigniter->delete('tbl_inspeksi', array('id_paket' => $id));
		$delete = $this->M_codeigniter->update('tbl_chasis', $data_send_1, array('id' => $id));
		if ($delete) {
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function deleteDataDepo(){
		$id_depo = $this->input->post('id');
		$delete = $this->M_codeigniter->delete('tbl_depo', array('id_mdepo' => $id_depo));
		if($delete){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function deleteDataPelabuhan(){
		$id_pelabuhan = $this->input->post('id');
		$delete = $this->M_codeigniter->delete('tbl_pelabuhan', array('id_mpelabuhan' => $id_pelabuhan));
		if($delete){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function deleteDataPlant(){
		$id_plant = $this->input->post('id');
		$delete = $this->M_codeigniter->delete('tbl_plant', array('id_mplant' => $id_plant));
		if($delete){
			$output = array('status' => 1);
		}else{
			$output = array('status' => 0);
		}
		echo json_encode($output);
	}

	function formUpdateChasis(){
		$id = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->get_where('tbl_chasis', array('id' => $id))->result()[0];
		$output = array(
			'html' => $this->load->view('update_chasis',$data,true),
		);
		echo json_encode($output);
	}

	function formUpdateContainer(){
		$id = $this->input->post('id');
		$data['table'] = $this->M_codeigniter->get_where('tbl_container', array('id' => $id))->result()[0];
		$output = array(
			'html' => $this->load->view('update_container',$data,true),
		);
		echo json_encode($output);
	}

	function prosesUpdateChasis(){

		$id_admin = $this->session->userdata('id_admin');
		$id	= $this->input->post('id');
		$namachasis = $this->input->post('namachasis');
		$nomorkir = $this->input->post('nomorkir');
		$masaberlaku = $this->input->post('masaberlaku');
		$masaberlaku = date('Y-m-d',strtotime($masaberlaku));
		$namapemilik = $this->input->post('namapemilik');
		$costcenter = $this->input->post('costcenter');
		$deskripsi = $this->input->post('deskripsi');
		$nomorasset = $this->input->post('nomorasset');

		$cek = $this->M_codeigniter->get_where('tbl_chasis', array('id' => $id))->num_rows();
		if($cek == 1){
			$data_send_2 = array(
				'active' 	=> 1,
				'userupdate' => $id_admin,
				'dateupdate' => date('Y-m-d H:i:s')
			);
			$delete = $this->M_codeigniter->update('tbl_chasis', $data_send_2, array('id' => $id));

			$data_send_1 = array(
					'chasis'=> $namachasis,
					'nokir'=> $nomorkir,
					'masa_berlaku_kir'=> $masaberlaku,
					'nama_pemilik'=> $namapemilik,
					'costcenter'=> $costcenter,
					'desc'=> $deskripsi,
					'noasset'=> $nomorasset,
					'userupdate' => $id_admin,
					'dateupdate' => date('Y-m-d H:i:s')
				);
			$insert = $this->M_codeigniter->insert('tbl_chasis', $data_send_1);
			
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

	function prosesUpdateContainer(){

		$id_admin = $this->session->userdata('id_admin');
		$id	= $this->input->post('id');
		$namacontainer = $this->input->post('namacontainer');
		$kondisi = $this->input->post('kondisi');
		$costcenter = $this->input->post('costcenter');
		$noasset = $this->input->post('noasset');
		$noequipment = $this->input->post('noequipment');
		$desc = $this->input->post('desc');

		$cek = $this->M_codeigniter->get_where('tbl_container', array('id' => $id))->num_rows();
		if($cek == 1){
			$data_send_2 = array(
				'active' 	=> 1,
				'userupdate' => $id_admin,
				'dateupdate' => date('Y-m-d H:i:s')
			);
			$delete = $this->M_codeigniter->update('tbl_container', $data_send_2, array('id' => $id));

			$data_send_1 = array(
					'container'=> $namacontainer,
					'kondisi'=> $kondisi,
					'costcenter'=> $costcenter,
					'noasset'=> $noasset,
					'noequipment'=> $noequipment,
					'desc'=> $desc,
					'userupdate' => $id_admin,
					'dateupdate' => date('Y-m-d H:i:s')
				);
			$insert = $this->M_codeigniter->insert('tbl_container', $data_send_1);
			
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


}
