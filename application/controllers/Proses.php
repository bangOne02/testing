<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller{
	public function __construct() {
	    parent::__construct();
	  	if($this->session->userdata('login') != TRUE) {
	  		redirect('');
	  	}
  	}

	public function index(){
		$nosj = $this->input->get('nosj');
		$proces = $this->input->get('proces');
		$data['content_header'] = 'Proses Pemeriksaan';
		$data['breadcrumb'] = array(
			array('Form Pemeriksaan',base_url('Proses'))
		);
		$data['content'] = 'proses';
		$data['nosj'] = $nosj;
		$data['proces'] = $proces;
		$data['js_file'] = 'proses';
		$this->load->view('component/main', $data);
	}

	public function revisi(){
		$nosj = $this->input->get('nosj');
		$proces = $this->input->get('proses');
		$data['content_header'] = 'Proses Pemeriksaan';
		$data['breadcrumb'] = array(
			array('Form Pemeriksaan',base_url('Proses'))
		);
		$data['content'] = 'proses_revisi';
		$data['nosj'] = $nosj;
		$data['proces'] = $proces;
		$data['js_file'] = 'proses';
		$this->load->view('component/main', $data);
	}

	function myList(){
		$no_sj = $this->input->post('no_sj');
		$data['proces'] = $this->input->post('proces');

		$suratjalan = $this->M_codeigniter->get_where('tbl_suratjalan' , array('nomorsj' => $no_sj));
		$suratjalan = $suratjalan->result()[0];
		
		if ($suratjalan->size == 1 )
		{
			$data['driver'] = $this->M_codeigniter->get_where('tbl_driver' , array('jns_kendaraan' => 'besar'))->result();	
			$data['kendaraan'] = $this->M_codeigniter->get_where('tbl_kendaraan' , array('ukuran' => 'besar','active' => 0))->result();	
		} else
		{
			$data['driver'] = $this->M_codeigniter->get_where('tbl_driver' , array('jns_kendaraan' => 'kecil'))->result();
			$data['kendaraan'] = $this->M_codeigniter->get_where('tbl_kendaraan' , array('ukuran' => 'kecil','active' => 0))->result();
		}
		
		$data['chasis'] = $this->M_codeigniter->get('tbl_chasis')->result();
		$data['container'] = $this->M_codeigniter->query('select * from tbl_container union select * from tbl_container_rent')->result();

		
		$data['table'] = $this->M_codeigniter->query("
			  SELECT sj.nomorsj,DATE_FORMAT(sj.tanggalberangkat,'%d-%m-%Y') as tanggalberangkat,sj.asalsj,IFNULL(sj.tugas,'') AS tugas,k.`nopol`,j.nama_jenis AS nama_kendaraan, sj.size,sj.kendaraan,
	          p.`nama_mpelabuhan` AS tujuan,sj.sopir AS driver,IFNULL(sj.sasis,'') AS sasis,IFNULL(s.nokir,'') AS nokir,sj.proses,sj.jenismuatan,IFNULL(sj.nocontainer,'') as nocontainer,sj.gembok,sj.segelpelayaran,sj.jenis,sj.segelbeacukai,
			  kb.tglberangkat,kd.tgltiba
			  FROM tbl_suratjalan sj 
	          JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_container c ON c.id = sj.nocontainer
			  LEFT JOIN tbl_p_keberangkatan kb on kb.fk_idsj = sj.id
			  LEFT JOIN tbl_p_kedatangan kd on kd.fk_idsj = sj.id
	          WHERE sj.nomorsj = '".$no_sj."' 
	          UNION
	          SELECT sj.nomorsj,DATE_FORMAT(sj.tanggalberangkat,'%d-%m-%Y') as tanggalberangkat,sj.asalsj,IFNULL(sj.tugas,'') AS tugas,k.`nopol`,j.nama_jenis AS nama_kendaraan, sj.size,sj.kendaraan,
	          p.`nama_mdepo` AS tujuan, sj.sopir AS driver,IFNULL(sj.sasis,'') AS sasis,IFNULL(s.nokir,'') AS nokir,sj.proses,sj.jenismuatan,IFNULL(sj.nocontainer,'') as nocontainer,sj.gembok,sj.segelpelayaran,sj.jenis,sj.segelbeacukai,
			  kb.tglberangkat,kd.tgltiba
	          FROM tbl_suratjalan sj 
	          JOIN tbl_depo p ON p.`id_mdepo` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_container c ON c.id = sj.nocontainer
			  LEFT JOIN tbl_p_keberangkatan kb on kb.fk_idsj = sj.id
			  LEFT JOIN tbl_p_kedatangan kd on kd.fk_idsj = sj.id
	          WHERE sj.nomorsj = '".$no_sj."' 
	          UNION
	          SELECT sj.nomorsj,DATE_FORMAT(sj.tanggalberangkat,'%d-%m-%Y') as tanggalberangkat,sj.asalsj,IFNULL(sj.tugas,'') AS tugas,k.`nopol`,j.nama_jenis AS nama_kendaraan, sj.size,sj.kendaraan,
	          p.`nama_mplant` AS tujuan, sj.sopir AS driver,IFNULL(sj.sasis,'') AS sasis,IFNULL(s.nokir,'') AS nokir,sj.proses,sj.jenismuatan,IFNULL(sj.nocontainer,'') as nocontainer,sj.gembok,sj.segelpelayaran,sj.jenis,sj.segelbeacukai,
			  kb.tglberangkat,kd.tgltiba
	          FROM tbl_suratjalan sj 
	          JOIN tbl_plant p ON p.`id_mplant` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_container c ON c.id = sj.nocontainer
			  LEFT JOIN tbl_p_keberangkatan kb on kb.fk_idsj = sj.id
			  LEFT JOIN tbl_p_kedatangan kd on kd.fk_idsj = sj.id
	          WHERE sj.nomorsj = '".$no_sj."' 
	          UNION
	          SELECT sj.nomorsj,DATE_FORMAT(sj.tanggalberangkat,'%d-%m-%Y') as tanggalberangkat,sj.asalsj,IFNULL(sj.tugas,'') AS tugas,k.`nopol`,j.nama_jenis AS nama_kendaraan, sj.size,sj.kendaraan,
	          sj.`tujuan` AS tujuan, sj.sopir AS driver,IFNULL(sj.sasis,'') AS sasis,IFNULL(s.nokir,'') AS nokir,sj.proses,sj.jenismuatan,IFNULL(sj.nocontainer,'') as nocontainer,sj.gembok,sj.segelpelayaran,sj.jenis,sj.segelbeacukai,
			  kb.tglberangkat,kd.tgltiba
	          FROM tbl_suratjalan sj 
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_container c ON c.id = sj.nocontainer
			  LEFT JOIN tbl_p_keberangkatan kb on kb.fk_idsj = sj.id
			  LEFT JOIN tbl_p_kedatangan kd on kd.fk_idsj = sj.id
	          WHERE sj.nomorsj = '".$no_sj."'  AND sj.`jns_tujuan` = 0
		")->result();

		//echo $this->db->last_query();
		$output = array(
			'html' => $this->load->view('list_proses', $data, true),
		);
		echo json_encode($output);
	}

	function myListRev(){
		$no_sj = $this->input->post('no_sj');
		$proses = $this->input->post('proces');
		$data['proces'] = $proses;
	//	echo $proses;

		$suratjalan = $this->M_codeigniter->get_where('tbl_suratjalan' , array('nomorsj' => $no_sj));
		$suratjalan = $suratjalan->result()[0];

		if ($suratjalan->size == 1 )
		{
			$data['driver'] = $this->M_codeigniter->get_where('tbl_driver' , array('jns_kendaraan' => 'besar'))->result();	
			$data['kendaraan'] = $this->M_codeigniter->get_where('tbl_kendaraan' , array('ukuran' => 'besar','active' => 0))->result();	
		} else
		{
			$data['driver'] = $this->M_codeigniter->get_where('tbl_driver' , array('jns_kendaraan' => 'kecil'))->result();
			$data['kendaraan'] = $this->M_codeigniter->get_where('tbl_kendaraan' , array('ukuran' => 'kecil','active' => 0))->result();
		}
		
		$data['chasis'] = $this->M_codeigniter->get('tbl_chasis')->result();
		$data['container'] = $this->M_codeigniter->query('select * from tbl_container union select * from tbl_container_rent')->result();


		if ($proses == 1)
		{
			$data['table'] = $this->M_codeigniter->query("
			SELECT sj.id as idjs,sj.nomorsj,sj.size,kb.*,dd.nama_mdriver,kk.nopol,cc.container,ch.chasis,sj.proses       
					FROM tbl_suratjalan sj 
					LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
					LEFT JOIN tbl_driver dd ON dd.id_mdriver = kb.namasopir
					LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
					LEFT JOIN tbl_chasis ch ON ch.id = kb.sasis
					LEFT JOIN (SELECT * FROM tbl_container UNION SELECT * FROM tbl_container_rent) cc ON cc.id = kb.nocontainer
			WHERE sj.nomorsj = '".$no_sj."'
			")->result();	
		} else
		{
			$data['table'] = $this->M_codeigniter->query("
			SELECT sj.id as idsj,sj.nomorsj,sj.size,kb.*,dd.nama_mdriver,kk.nopol,cc.container,ch.chasis,sj.proses       
					FROM tbl_suratjalan sj 
					LEFT JOIN tbl_p_kedatangan kb ON kb.fk_idsj = sj.id
					LEFT JOIN tbl_driver dd ON dd.id_mdriver = kb.namasopir
					LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
					LEFT JOIN tbl_chasis ch ON ch.id = kb.sasis
					LEFT JOIN (SELECT * FROM tbl_container UNION SELECT * FROM tbl_container_rent) cc ON cc.id = kb.nocontainer
			WHERE sj.nomorsj = '".$no_sj."'
			")->result();
		}
	//	$this->db->last_query();
		$output = array(
			'html' => $this->load->view('list_proses_revisi', $data, true),
		);
		echo json_encode($output);
	}

	function myList2(){
		$no_sj = $this->input->get('no_sj');
		$data['table'] = $this->M_codeigniter->query("
			SELECT * from tbl_p_container where fk_idsj = '".$no_sj."'
		")->result();
		$output = array(
			'html' => $this->load->view('list_proses2', $data, true),
		);
		echo json_encode($output);
	}

	function getSuratJalan(){
		$nosj = $this->input->post('nosj');
		$data = $this->M_codeigniter->query("
			SELECT s.*,IFNULL(p.`nama_mpelabuhan`,IFNULL(dp.`nama_mdepo`,IFNULL(pt.`nama_mplant`,s.tujuan))) as ktujuan
			FROM tbl_suratjalan s LEFT JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = s.`tujuan`
			LEFT JOIN tbl_depo dp ON dp.id_mdepo = s.`tujuan` 
			LEFT JOIN tbl_plant pt ON pt.`id_mplant` = s.`tujuan`
			WHERE nomorsj = '".$nosj."'
		")->result();
		echo json_encode($data);
	}

	function insertData(){
		$status = 0;
		$nomorsj = $this->input->post('nosuratjalan');
		$proces = $this->input->post('proces');
		$statusproses = $this->M_codeigniter->get_where('tbl_suratjalan' , array('nomorsj' => $nomorsj));	
		$admin_name = $this->session->userdata('admin_name');	
		$id_admin = $this->session->userdata('id_admin');

		if($statusproses->num_rows() > 0){
			$get_proses = $statusproses->result()[0];
			$jenismuatan = $this->input->post('jenismuatan');
			$beratkosong = $this->input->post('beratkosong');
			$beratisi = $this->input->post('beratisi');
			$gembok = $this->input->post('gembok');
			$segelpelayaran = $this->input->post('segelpelayaran');
			$segelbeacukai = $this->input->post('segelbeacukai');
			$namachasis = $this->input->post('namachasis');
			$namadriver = $this->input->post('namadriver');
			$nopol = $this->input->post('nopol');
			$temperatur = $this->input->post('temperatur');
			$nocontainer = $this->input->post('nocontainer');
			if ($nocontainer == '')
			{
				$nocontainer = 0;
			}
			$keterangan = $this->input->post('keterangan');


		   	if ($proces == 1)
			{
				  $tanggalkeluar = date('Y-m-d');
	      		  date_default_timezone_set('Asia/Jakarta');
	      		  $jamkeluar = date('H:i:s');
				  $kmawal = $this->input->post('kmawal');
				  $pic1 = $this->input->post('pic1');

				  if ($get_proses->jenis == 0 or $get_proses->jenis == 3)
				  {
					  if ($get_proses->nocontainer != '')
					  {
						  $data = array(
							'active' => 1
						  );
		
						  $where = array(
							'id' => $get_proses->nocontainer
						  );
		
						  $this->M_codeigniter->update('tbl_container_rent',$data,$where);
					  }
				  }

	      		  $data = array(
					'proses' => 1
				  );

				  $where = array(
					'id' => $get_proses->id
				  );

	    		  $this->M_codeigniter->update('tbl_suratjalan',$data,$where);

			      $data_send_1 = array(
	 				  'tglberangkat' => $tanggalkeluar,
					  'jamkeluar' => $jamkeluar,
					  'nomorpolisi' => $nopol,
					  'segelpelayaran' => $segelpelayaran,
					  'segelbeacukai' => $segelbeacukai,
					  'gembok' => $gembok,
					  'temperatur' => $temperatur,	
					  'jenismuatan' => $jenismuatan,
					  'beratkosong' => $beratkosong,
					  'beratisi' => $beratisi,
					  'namasopir' => $namadriver,
					  'kmawal' => $kmawal,
					  'sasis' => $namachasis,
					  'nocontainer' => $nocontainer,
					  'pic1' => $pic1,
					  'keterangan' => $keterangan,
					  'insert_by' => $id_admin,
					  'insert_at' => date('Y-m-d H:i:s')
    			  );

    			  $where_send_1 = array(
					'fk_idsj' => $get_proses->id
				  );

    			  $update = $this->M_codeigniter->update('tbl_p_keberangkatan',$data_send_1,$where_send_1);	

    			  if($update)
	              {
	      			  $status = 1;
	      		  }	

			}

			if ($proces == 2)
			{
				  $tgltiba = date('Y-m-d');
                  date_default_timezone_set('Asia/Jakarta');
                  $jammasuk = date('H:i:s');
                  $kmakhir = $this->input->post('kmakhir');
				  $pic2 = $this->input->post('pic2');
				  $jnscontainer = $this->input->post('jnscontainer');

				  if ($jnscontainer == 0)
				  {
					  if (strlen($nocontainer) > 8)
					  {
				  		$data_send_1 = array(
						      'container' => $nocontainer
						);

						$insert = $this->M_codeigniter->insert('tbl_container_rent', $data_send_1);
						$id = $this->db->insert_id();
				  		$nocontainer = $id;
					  } else
					  {
						$data_send_1 = array(
							'container' => $nocontainer
					 	);

					 	$insert = $this->M_codeigniter->insert('tbl_container_e', $data_send_1);
						$nocontainer = 0; 
					  }
				  }	

	      		  $data = array(
					'proses' => 2
				  );

				  $where = array(
					'id' => $get_proses->id
				  );

	    		  $this->M_codeigniter->update('tbl_suratjalan',$data,$where);

			      $data_send_1 = array(
						'tgltiba' => $tgltiba,
						'jammasuk' => $jammasuk,
						'nomorpolisi' => $nopol,
						'segelpelayaran' => $segelpelayaran,
						'segelbeacukai' => $segelbeacukai,
						'gembok' => $gembok,
						'temperatur' => $temperatur,	
						'jenismuatan' => $jenismuatan,
						'beratkosong' => $beratkosong,
						'beratisi' => $beratisi,
						'namasopir' => $namadriver,
						'kmakhir' => $kmakhir,
						'sasis' => $namachasis,
						'nocontainer' => $nocontainer,
						'pic2' => $pic2,
						'keterangan' => $keterangan,
						'insert_by' => $id_admin,
					    'insert_at' => date('Y-m-d H:i:s')
    			  );

    			  $where_send_1 = array(
					'fk_idsj' => $get_proses->id
				  );

    			  $update = $this->M_codeigniter->update('tbl_p_kedatangan',$data_send_1,$where_send_1);	

    			  if($update)
	              {
	      			  $status = 1;
	      		  }
				
			}
		}


		if ($status == 1)
		{
			$output = array('status' => 1);
			echo json_encode($output);
			return;
		} else
		{
			$output = array('status' => 0);
			echo json_encode($output);
			return;
		}

	
	}

	function insertDataRevisi(){
		  $id_admin = $this->session->userdata('id_admin');
		  $status = 0;
		  $proces = $this->input->post('proces');
		  $id = $this->input->post('id');
		  $nopol = $this->input->post('nopol');
		  $driver = $this->input->post('driver');
		  $chasis = $this->input->post('chasis');
		  $jenismuatan = $this->input->post('jenismuatan');
		  $beratkosong = $this->input->post('beratkosong');
		  $beratisi = $this->input->post('beratisi');
		  $gembok = $this->input->post('gembok');
		  $container = $this->input->post('container');
		  $segelpelayaran = $this->input->post('segelpelayaran');
		  $segelbeacukai = $this->input->post('segelbeacukai');
		  $temperatur = $this->input->post('temperatur');
		  $keterangan = $this->input->post('keterangan');

		  if ($proces == 1)
		  {
			$tglberangkat = $this->input->post('tglberangkat');
			$jamberangkat = $this->input->post('jamberangkat');
			$kmawal = $this->input->post('kmawal');
			$pic1 = $this->input->post('pic1');
			$exist = $this->M_codeigniter->get_where('tbl_p_keberangkatan' , array('id' => $id));

			if ($exist->num_rows() > 0)
			{
					$data_send_1 = array(
						'tglberangkat' => $tglberangkat,
						'jamkeluar' => $jamberangkat,
						'nomorpolisi' => $nopol,
						'segelpelayaran' => $segelpelayaran,
						'segelbeacukai' => $segelbeacukai,
						'gembok' => $gembok,
						'temperatur' => $temperatur,
						'jenismuatan' => $jenismuatan,
						'beratkosong' => $beratkosong,
						'beratisi' => $beratisi,
						'namasopir' => $driver,
						'kmawal' => $kmawal,
						'sasis' => $chasis,
						'nocontainer' => $container,
						'pic1' => $pic1,
						'keterangan' => $keterangan,
						'updated_by' => $id_admin,
						'updated_at' => date('Y-m-d H:i:s')
					);

					$where_send_1 = array(
						'id' => $id
					);

					$update = $this->M_codeigniter->update('tbl_p_keberangkatan',$data_send_1,$where_send_1);	
					
					if($update)
					{
						$status = 1;
					}
			}
		  } else
		  {
			$tgltiba = $this->input->post('tgltiba');
			$jammasuk = $this->input->post('jamtiba');
			$kmakhir = $this->input->post('kmakhir');
			$pic2 = $this->input->post('pic2');
			$exist = $this->M_codeigniter->get_where('tbl_p_kedatangan' , array('id' => $id));

			if ($exist->num_rows() > 0)
			{
					$data_send_1 = array(
						'tgltiba' => $tgltiba,
						'jammasuk' => $jammasuk,
						'nomorpolisi' => $nopol,
						'segelpelayaran' => $segelpelayaran,
						'segelbeacukai' => $segelbeacukai,
						'gembok' => $gembok,
						'temperatur' => $temperatur,
						'jenismuatan' => $jenismuatan,
						'beratkosong' => $beratkosong,
						'beratisi' => $beratisi,
						'namasopir' => $driver,
						'kmakhir' => $kmakhir,
						'sasis' => $chasis,
						'nocontainer' => $container,
						'pic2' => $pic2,
						'keterangan' => $keterangan,
						'updated_by' => $id_admin,
						'updated_at' => date('Y-m-d H:i:s')
					);

					$where_send_1 = array(
						'id' => $id
					);

					$update = $this->M_codeigniter->update('tbl_p_kedatangan',$data_send_1,$where_send_1);	
					
					if($update)
					{
						$status = 1;
					}
			}
		  }

		  if ($status == 1)
		  {
				$output = array('status' => 1);
				echo json_encode($output);
				return;
		  } else
		  {
				$output = array('status' => 0);
				echo json_encode($output);
				return;
		  }  
	}
}

