<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require 'vendor/autoload.php';

//use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller {
	public function __construct() {
    parent::__construct();
//	$this->load->library('Excel');
  	if($this->session->userdata('login') != TRUE) {
  		redirect('');
  	}
  }

	public function index(){
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->M_codeigniter->get_role($id_admin);
		$data['content_header'] = 'Laporan';
		$data['breadcrumb'] = array(
			array('Laporan',base_url('Laporan')),
		);
		$data['content'] = 'hasil';
		$data['js_file'] = 'hasil';

		$this->load->view('component/main',$data);
	}
	
	public function biaya(){
		$id_admin = $this->session->userdata('id_admin');
		$role = $this->M_codeigniter->get_role($id_admin);
		$data['content_header'] = 'Laporan';
		$data['breadcrumb'] = array(
			array('Laporan',base_url('Laporan')),
		);
		$data['content'] = 'hasilbiaya';
		$data['js_file'] = 'hasilbiaya';

		$this->load->view('component/main',$data);
	}

	function reportBiaya($id = 0){
		$data['hasil'] = $this->M_codeigniter->query("
				SELECT b.`nomor_kasbon`,b.`nominal`,DATE_FORMAT(DATE(b.`created_at`),'%d/%m/%Y') AS tgltotalan,IFNULL(md.`nama_mdriver`,s.sopir) AS sopir,UPPER(k.`nopol`) AS nopol,
				DATE_FORMAT(p.`tglberangkat`,'%d-%m-%Y') AS tglberangkat,
				CONCAT(UPPER(s.asalsj),' - ',UPPER(IFNULL(pl.`nama_mpelabuhan`,IFNULL(dp.`nama_mdepo`,IFNULL(pt.`nama_mplant`,s.tujuan)))),'  ( ',IFNULL(p.`jenismuatan`,''),'-',IFNULL(pd.jenismuatan,'') , ' / ' ,IFNULL(co.container,''),' ) ') AS tujuan,
				c.`cost_center` AS costcenter,g.`gl_account` AS glaccount,db.totalbiaya2,a.username
				FROM
				tbl_biaya b 
				LEFT JOIN tbl_admin a ON a.id_admin = b.usercreated
				LEFT JOIN tbl_detail_biaya d ON b.id = d.`id_biaya`
				LEFT JOIN tbl_suratjalan s ON s.`id` = d.`id_sj`
				LEFT JOIN tbl_driver md ON md.id_mdriver = s.`sopir`
				LEFT JOIN tbl_kendaraan k ON k.id = s.`kendaraan`
				LEFT JOIN tbl_p_keberangkatan p ON p.fk_idsj = s.id
				LEFT JOIN tbl_p_kedatangan pd ON pd.fk_idsj = s.id
				LEFT JOIN 
				(
					SELECT * FROM tbl_container
					UNION
					SELECT * FROM tbl_container_rent
				) AS co ON co.id = p.nocontainer
				LEFT JOIN tbl_pelabuhan pl ON pl.`id_mpelabuhan` = s.`tujuan`
				LEFT JOIN tbl_depo dp ON dp.id_mdepo = s.`tujuan` 
				LEFT JOIN tbl_plant pt ON pt.`id_mplant` = s.`tujuan`
				LEFT JOIN tbl_general_ledger g ON g.id = d.glaccount
				LEFT JOIN tbl_costcenter c ON c.id = d.costcenter
				LEFT JOIN (SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
				(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
				((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
				FROM 
				(SELECT db.`id`,db.id_biaya,db.`id_sj`,db.`glaccount`,db.`costcenter`, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
					db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
					(db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
				FROM tbl_detail_biaya db) AS t1) db ON d.id = db.id
				WHERE b.id = '".$id."' and db.totalbiaya2 > 0 order by d.id asc
		")->result();
		header("Content-type: application/vnd-ms-excel");
 		header("Content-Disposition: attachment; filename=formreportbiaya_".$data['hasil'][0]->nomor_kasbon.".xls"); 
 		$this->load->view('list_report_biaya',$data); 
	}

	function getHasil($excel = 0){
		$size = $this->input->post('size');
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalawal = date('Y-m-d',strtotime($tanggalawal));
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tanggalakhir = date('Y-m-d',strtotime($tanggalakhir));

if ($size == 1)
{
		$data['hasil'] = $this->M_codeigniter->query("
			  select * from 
			  (SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
			  k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`,
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`,
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`,
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`,
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,p.`nama_mpelabuhan` AS `TUJUAN REAL`,kk.`nopol` AS bnomorpolisi,kb.`segelpelayaran` AS bsegelpelayaran, kb.`segelbeacukai` AS bsegelbeacukai, kb.`gembok` AS bgembok,kb.`temperatur` AS btemperatur,kb.`jenismuatan` AS bjenismuatan,
			  kb.`beratkosong` AS bberatkosong,kb.`beratisi` AS bberatisi,db.`nama_mdriver` AS bnamasopir,kb.`suhutubuh` AS bsuhutubuh,kb.`kmawal` AS bkmawal,ks.`chasis` AS bchasis,
			  kc.`container` AS bnocontainer,kb.`pic1` AS bpic1,kb.`keterangan` AS bketerangan,dk.`nopol` AS dnomorpolisi,kd.`segelpelayaran` AS dsegelpelayaran,
			  kd.`segelbeacukai` AS dsegelbeacukai,kd.`gembok` AS dgembok,kd.`temperatur` AS dtemperatur,kd.`jenismuatan` AS djenismuatan,kd.`beratkosong` AS dberatkosong,
			  kd.`beratisi` AS dberatisi,dd.`nama_mdriver` AS dnamasopir,kd.`suhutubuh` AS dsuhutubuh,kd.`kmakhir` AS dkmakhir,ds.`chasis` AS dchasis,dc.`container` AS dnocontainer,
			  kd.`pic2` AS dpic2,kd.`keterangan` AS dketerangan,
			  IF(sj.active = 1, 'BATAL', CASE WHEN sj.proses = 0 THEN 'BARU' WHEN sj.proses = 1 THEN 'PROSES' ELSE 'CLOSED' END) AS `STATUS`   
	          FROM tbl_suratjalan sj 
	          JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
			  LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
			  LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.id
	          WHERE sj.tanggalberangkat >= '".$tanggalawal."' and sj.tanggalberangkat <= '".$tanggalakhir."'   
	          UNION
	          SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
	          k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`, 
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`, 
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`, 
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`, 
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,
			  p.`nama_mdepo` AS `TUJUAN REAL`,kk.`nopol` AS bnomorpolisi,kb.`segelpelayaran` AS bsegelpelayaran, kb.`segelbeacukai` AS bsegelbeacukai, kb.`gembok` AS bgembok,kb.`temperatur` AS btemperatur,kb.`jenismuatan` AS bjenismuatan,
			  kb.`beratkosong` AS bberatkosong,kb.`beratisi` AS bberatisi,db.`nama_mdriver` AS bnamasopir,kb.`suhutubuh` AS bsuhutubuh,kb.`kmawal` AS bkmawal,ks.`chasis` AS bchasis,
			  kc.`container` AS bnocontainer,kb.`pic1` AS bpic1,kb.`keterangan` AS bketerangan,dk.`nopol` AS dnomorpolisi,kd.`segelpelayaran` AS dsegelpelayaran,
			  kd.`segelbeacukai` AS dsegelbeacukai,kd.`gembok` AS dgembok,kd.`temperatur` AS dtemperatur,kd.`jenismuatan` AS djenismuatan,kd.`beratkosong` AS dberatkosong,
			  kd.`beratisi` AS dberatisi,dd.`nama_mdriver` AS dnamasopir,kd.`suhutubuh` AS dsuhutubuh,kd.`kmakhir` AS dkmakhir,ds.`chasis` AS dchasis,dc.`container` AS dnocontainer,
				kd.`pic2` AS dpic2, 
				kd.`keterangan` AS dketerangan,
			  IF(sj.active = 1, 'BATAL', CASE WHEN sj.proses = 0 THEN 'BARU' WHEN sj.proses = 1 THEN 'PROSES' ELSE 'CLOSED' END) AS `STATUS`  
			  FROM tbl_suratjalan sj 
	          JOIN tbl_depo p ON p.`id_mdepo` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
			  LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.id
	          WHERE sj.tanggalberangkat >= '".$tanggalawal."' and sj.tanggalberangkat <= '".$tanggalakhir."'    
	          UNION
	          SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
	          k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`,
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`, 
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`, 
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`, 
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,
			  p.`nama_mplant` AS `TUJUAN REAL`,
			  kk.`nopol` AS bnomorpolisi,kb.`segelpelayaran` AS bsegelpelayaran, kb.`segelbeacukai` AS bsegelbeacukai, kb.`gembok` AS bgembok,kb.`temperatur` AS btemperatur,kb.`jenismuatan` AS bjenismuatan,
			  kb.`beratkosong` AS bberatkosong,kb.`beratisi` AS bberatisi,db.`nama_mdriver` AS bnamasopir,kb.`suhutubuh` AS bsuhutubuh,kb.`kmawal` AS bkmawal,ks.`chasis` AS bchasis,
			  kc.`container` AS bnocontainer,kb.`pic1` AS bpic1,kb.`keterangan` AS bketerangan,dk.`nopol` AS dnomorpolisi,kd.`segelpelayaran` AS dsegelpelayaran,
			  kd.`segelbeacukai` AS dsegelbeacukai,kd.`gembok` AS dgembok,kd.`temperatur` AS dtemperatur,kd.`jenismuatan` AS djenismuatan,kd.`beratkosong` AS dberatkosong,
			  kd.`beratisi` AS dberatisi,dd.`nama_mdriver` AS dnamasopir,kd.`suhutubuh` AS dsuhutubuh,kd.`kmakhir` AS dkmakhir,ds.`chasis` AS dchasis,dc.`container` AS dnocontainer, 
	kd.`pic2` AS dpic2, 
	kd.`keterangan` AS dketerangan,
			  IF(sj.active = 1, 'BATAL', CASE WHEN sj.proses = 0 THEN 'BARU' WHEN sj.proses = 1 THEN 'PROSES' ELSE 'CLOSED' END) AS `STATUS` 
			  FROM tbl_suratjalan sj 
	          JOIN tbl_plant p ON p.`id_mplant` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
			  LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.id
	          WHERE sj.tanggalberangkat >= '".$tanggalawal."' and sj.tanggalberangkat <= '".$tanggalakhir."'    
	          UNION
	          SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
	          k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`, 
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`, 
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`, 
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`, 
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,
			  sj.`tujuan` AS `TUJUAN REAL`,
			  kk.`nopol` AS bnomorpolisi,kb.`segelpelayaran` AS bsegelpelayaran, kb.`segelbeacukai` AS bsegelbeacukai, kb.`gembok` AS bgembok,kb.`temperatur` AS btemperatur,kb.`jenismuatan` AS bjenismuatan,
			  kb.`beratkosong` AS bberatkosong,kb.`beratisi` AS bberatisi,db.`nama_mdriver` AS bnamasopir,kb.`suhutubuh` AS bsuhutubuh,kb.`kmawal` AS bkmawal,ks.`chasis` AS bchasis,
			  kc.`container` AS bnocontainer,kb.`pic1` AS bpic1,kb.`keterangan` AS bketerangan,dk.`nopol` AS dnomorpolisi,kd.`segelpelayaran` AS dsegelpelayaran,
			  kd.`segelbeacukai` AS dsegelbeacukai,kd.`gembok` AS dgembok,kd.`temperatur` AS dtemperatur,kd.`jenismuatan` AS djenismuatan,kd.`beratkosong` AS dberatkosong,
			  kd.`beratisi` AS dberatisi,dd.`nama_mdriver` AS dnamasopir,kd.`suhutubuh` AS dsuhutubuh,kd.`kmakhir` AS dkmakhir,ds.`chasis` AS dchasis,dc.`container` AS dnocontainer, 
			kd.`pic2` AS dpic2, 
			kd.`keterangan` AS dketerangan,
			  IF(sj.active = 1, 'BATAL', CASE WHEN sj.proses = 0 THEN 'BARU' WHEN sj.proses = 1 THEN 'PROSES' ELSE 'CLOSED' END) AS `STATUS` 
	          FROM tbl_suratjalan sj 
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
			  LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.id
	          WHERE (sj.tanggalberangkat >= '".$tanggalawal."' and sj.tanggalberangkat <= '".$tanggalakhir."') AND sj.`jns_tujuan` = 0) as tbl1
	          ORDER BY tbl1.`TANGGAL RENCANA KEBRKT` ASC
		")->result();		
}
else
{
	$data['hasil'] = $this->M_codeigniter->query("
			  select * from 
			  (SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
			  k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`,
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`,
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`,
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`,
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,p.`nama_mpelabuhan` AS `TUJUAN REAL`,kk.`nopol` AS bnomorpolisi,kb.`segelpelayaran` AS bsegelpelayaran, kb.`segelbeacukai` AS bsegelbeacukai, kb.`gembok` AS bgembok,kb.`temperatur` AS btemperatur,kb.`jenismuatan` AS bjenismuatan,
			  kb.`beratkosong` AS bberatkosong,kb.`beratisi` AS bberatisi,db.`nama_mdriver` AS bnamasopir,kb.`suhutubuh` AS bsuhutubuh,kb.`kmawal` AS bkmawal,ks.`chasis` AS bchasis,
			  kc.`container` AS bnocontainer,kb.`pic1` AS bpic1,kb.`keterangan` AS bketerangan,dk.`nopol` AS dnomorpolisi,kd.`segelpelayaran` AS dsegelpelayaran,
			  kd.`segelbeacukai` AS dsegelbeacukai,kd.`gembok` AS dgembok,kd.`temperatur` AS dtemperatur,kd.`jenismuatan` AS djenismuatan,kd.`beratkosong` AS dberatkosong,
			  kd.`beratisi` AS dberatisi,dd.`nama_mdriver` AS dnamasopir,kd.`suhutubuh` AS dsuhutubuh,kd.`kmakhir` AS dkmakhir,ds.`chasis` AS dchasis,dc.`container` AS dnocontainer,kd.`pic2` AS dpic2,kd.`keterangan` AS dketerangan,
			  IF(sj.active = 1, 'BATAL', CASE WHEN sj.proses = 0 THEN 'BARU' WHEN sj.proses = 1 THEN 'PROSES' ELSE 'CLOSED' END) AS `STATUS`   
	          FROM tbl_suratjalan sj 
	          JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
			  LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.id
	          WHERE kb.tglberangkat >= '".$tanggalawal."' and kb.tglberangkat <= '".$tanggalakhir."'   
	          UNION
	          SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
	          k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`, 
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`, 
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`, 
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`, 
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,
			  p.`nama_mdepo` AS `TUJUAN REAL`,kk.`nopol` AS bnomorpolisi,kb.`segelpelayaran` AS bsegelpelayaran, kb.`segelbeacukai` AS bsegelbeacukai, kb.`gembok` AS bgembok,kb.`temperatur` AS btemperatur,kb.`jenismuatan` AS bjenismuatan,
			  kb.`beratkosong` AS bberatkosong,kb.`beratisi` AS bberatisi,db.`nama_mdriver` AS bnamasopir,kb.`suhutubuh` AS bsuhutubuh,kb.`kmawal` AS bkmawal,ks.`chasis` AS bchasis,
			  kc.`container` AS bnocontainer,kb.`pic1` AS bpic1,kb.`keterangan` AS bketerangan,dk.`nopol` AS dnomorpolisi,kd.`segelpelayaran` AS dsegelpelayaran,
			  kd.`segelbeacukai` AS dsegelbeacukai,kd.`gembok` AS dgembok,kd.`temperatur` AS dtemperatur,kd.`jenismuatan` AS djenismuatan,kd.`beratkosong` AS dberatkosong,
			  kd.`beratisi` AS dberatisi,dd.`nama_mdriver` AS dnamasopir,kd.`suhutubuh` AS dsuhutubuh,kd.`kmakhir` AS dkmakhir,ds.`chasis` AS dchasis,dc.`container` AS dnocontainer, 
				kd.`pic2` AS dpic2, 
				kd.`keterangan` AS dketerangan,
			  IF(sj.active = 1, 'BATAL', CASE WHEN sj.proses = 0 THEN 'BARU' WHEN sj.proses = 1 THEN 'PROSES' ELSE 'CLOSED' END) AS `STATUS`  
			  FROM tbl_suratjalan sj 
	          JOIN tbl_depo p ON p.`id_mdepo` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
			  LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.id
	          WHERE kb.tglberangkat >= '".$tanggalawal."' and kb.tglberangkat <= '".$tanggalakhir."'    
	          UNION
	          SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
	          k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`,
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`, 
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`, 
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`, 
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,
			  p.`nama_mplant` AS `TUJUAN REAL`,
			  kk.`nopol` AS bnomorpolisi,kb.`segelpelayaran` AS bsegelpelayaran, kb.`segelbeacukai` AS bsegelbeacukai, kb.`gembok` AS bgembok,kb.`temperatur` AS btemperatur,kb.`jenismuatan` AS bjenismuatan,
			  kb.`beratkosong` AS bberatkosong,kb.`beratisi` AS bberatisi,db.`nama_mdriver` AS bnamasopir,kb.`suhutubuh` AS bsuhutubuh,kb.`kmawal` AS bkmawal,ks.`chasis` AS bchasis,
			  kc.`container` AS bnocontainer,kb.`pic1` AS bpic1,kb.`keterangan` AS bketerangan,dk.`nopol` AS dnomorpolisi,kd.`segelpelayaran` AS dsegelpelayaran,
			  kd.`segelbeacukai` AS dsegelbeacukai,kd.`gembok` AS dgembok,kd.`temperatur` AS dtemperatur,kd.`jenismuatan` AS djenismuatan,kd.`beratkosong` AS dberatkosong,
			  kd.`beratisi` AS dberatisi,dd.`nama_mdriver` AS dnamasopir,kd.`suhutubuh` AS dsuhutubuh,kd.`kmakhir` AS dkmakhir,ds.`chasis` AS dchasis,dc.`container` AS dnocontainer, 
	kd.`pic2` AS dpic2, 
	kd.`keterangan` AS dketerangan,
			  IF(sj.active = 1, 'BATAL', CASE WHEN sj.proses = 0 THEN 'BARU' WHEN sj.proses = 1 THEN 'PROSES' ELSE 'CLOSED' END) AS `STATUS` 
			  FROM tbl_suratjalan sj 
	          JOIN tbl_plant p ON p.`id_mplant` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
			  LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.id
	          WHERE kb.tglberangkat >= '".$tanggalawal."' and kb.tglberangkat <= '".$tanggalakhir."'    
	          UNION
	          SELECT sj.nomorsj as `NOMOr SURAT JALAN`,IFNULL( d.`nama_mdriver`,sj.sopir) AS `NAMA DRIVER`,CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
	          k.`nopol` AS NOPOL,j.nama_jenis AS `NAMA KENDARAAN`,sj.tanggalberangkat as `TANGGAL RENCANA KEBRKT`, 
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`, 
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`, 
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`, 
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,
			  sj.`tujuan` AS `TUJUAN REAL`,
			  kk.`nopol` AS bnomorpolisi,kb.`segelpelayaran` AS bsegelpelayaran, kb.`segelbeacukai` AS bsegelbeacukai, kb.`gembok` AS bgembok,kb.`temperatur` AS btemperatur,kb.`jenismuatan` AS bjenismuatan,
			  kb.`beratkosong` AS bberatkosong,kb.`beratisi` AS bberatisi,db.`nama_mdriver` AS bnamasopir,kb.`suhutubuh` AS bsuhutubuh,kb.`kmawal` AS bkmawal,ks.`chasis` AS bchasis,
			  kc.`container` AS bnocontainer,kb.`pic1` AS bpic1,kb.`keterangan` AS bketerangan,dk.`nopol` AS dnomorpolisi,kd.`segelpelayaran` AS dsegelpelayaran,
			  kd.`segelbeacukai` AS dsegelbeacukai,kd.`gembok` AS dgembok,kd.`temperatur` AS dtemperatur,kd.`jenismuatan` AS djenismuatan,kd.`beratkosong` AS dberatkosong,
			  kd.`beratisi` AS dberatisi,dd.`nama_mdriver` AS dnamasopir,kd.`suhutubuh` AS dsuhutubuh,kd.`kmakhir` AS dkmakhir,ds.`chasis` AS dchasis,dc.`container` AS dnocontainer, 
			kd.`pic2` AS dpic2, 
			kd.`keterangan` AS dketerangan,
			  IF(sj.active = 1, 'BATAL', CASE WHEN sj.proses = 0 THEN 'BARU' WHEN sj.proses = 1 THEN 'PROSES' ELSE 'CLOSED' END) AS `STATUS` 
	          FROM tbl_suratjalan sj 
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
			  LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
			  LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.id
	          WHERE (kb.tglberangkat >= '".$tanggalawal."' and kb.tglberangkat <= '".$tanggalakhir."') AND sj.`jns_tujuan` = 0) as tbl1
	          ORDER BY tbl1.`TANGGAL RENCANA KEBRKT` ASC
		")->result();

}		
	//	echo $this->db->last_query();

	
		$data['tanggalawal'] = $tanggalawal;
		$data['tanggalakhir'] = $tanggalakhir;

		if ($excel == 1) {
		    header("Content-type: application/vnd-ms-excel");
 			header("Content-Disposition: attachment; filename=report.xls");
			$this->load->view('list_hasil',$data); 
		} else if ($excel == 2) {

			// header("Content-type: application/vnd-ms-excel");
 			// header("Content-Disposition: attachment; filename=report.xls");
			 
			$html = $this->load->view('list_hasil',$data,true);

			$response =  array(
				'namafile' => 'report_mobilisasi',
				'file' => "data:application/vnd.ms-excel;base64,".base64_encode($html)
			);

			echo json_encode($response);
			 
		} else{
			$output = array(
				'html' => $this->load->view('list_hasil',$data, true)
			);
			echo json_encode($output);
		}	
	}
	
	function getHasilBiaya($excel = 0){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalawal = date('Y-m-d',strtotime($tanggalawal));
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tanggalakhir = date('Y-m-d',strtotime($tanggalakhir));	

		$admin_name = $this->session->userdata('admin_name');	
		$fk_plant = $this->session->userdata('fk_plant');
		$var = "";

		if ($admin_name != 'admin')
		{
			$var = "and a.fk_plant = '".$fk_plant."'";
		}

		$data['hasil'] = $this->M_codeigniter->query("
			  select * from 
			  (SELECT sj.nomorsj as `NOMOr SURAT JALAN`,
			  dd.`nama_mdriver` AS `NAMA DRIVER BRGKT`,
			  dd.`nama_mdriver` AS `NAMA DRIVER DTG`,
			  CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
			  kk.`nopol` AS `NOPOL BRGKT`,
			  dk.`nopol` AS `NOPOL DTG`,
			  DATE_FORMAT(sj.tanggalberangkat,'%d-%m-%Y') as `TANGGAL RENCANA KEBRKT`, 
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`,
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`,
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`,
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,
			  p.`nama_mpelabuhan` AS `TUJUAN REAL`,
			  kb.jenismuatan AS `JENIS MUATAN BRGKT`,
			  kd.jenismuatan AS `JENIS MUATAN DTG`,
			  db.costcenter,
			  kc.container AS `CONTAINER BRGKT`,
			  dc.container AS `CONTAINER DTG`,
			  b.nomor_kasbon as `NOMOR KASBON`,
			  b.nominal as `NOMINAL KASBON`,
			  db.totalbiaya1 as `TOTAL BIAYA 1`,db.totalbiaya2 as `TOTAL BIAYA 2`,db.biayacont as `BIAYA CONT`,db.bbmtunai as `BBM`,db.bbmhead as `BBM HEAD`,
			  db.genset as `BBM GENSET`,db.bbmnontunai as `BBM MEMO`,db.nomemo as `NO MEMO`,db.biayatol as `TOL`,db.parkir as `PARKIR`,db.kuli as `KULI`,
			  db.kelasjalan as `KELAS JALAN`,db.feeinap as `UANG INAP / MAKAN`,
			  db.biayalain as `LAIN-LAIN`,db.totalfeedriver as `TOTAL EXTRA DRIVER`,db.totalfeekernet as `TOTAL EXTRA KERNET`,db.feedriver as `EXTRA DRIVER`,
			  db.feekernet as `EXTRA KERNET`,db.lemburdriver as `LEMBUR DRIVER`,db.lemburkernet as `LEMBUR KERNET`,db.keterangan as `KETERANGAN`,
			  CASE WHEN sj.active = 1 THEN 'BATAL' ELSE 'ACTIVE' END AS `STATUS SJ`,
			  DATE_FORMAT(b.tanggal,'%d-%m-%Y') AS `TANGGAL KASBON`,
			  CASE WHEN b.statchecker1 = 1 THEN 'SUDAH DI APPROVE' ELSE 'BELUM DI APPROVE' END AS `STATUS CHECKER 1`,
			  CASE WHEN b.statchecker2 = 1 THEN 'SUDAH DI APPROVE' ELSE 'BELUM DI APPROVE' END AS `STATUS CHECKER 2`,
			  CASE WHEN b.approved = 1 THEN 'SUDAH TERJURNAL' ELSE 'BELUM TERJURNAL' END AS `STATUS JURNAL`
	          FROM tbl_suratjalan sj 
	          JOIN tbl_pelabuhan p ON p.`id_mpelabuhan` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
	          LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.nomorsj 
	          JOIN (SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
				(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
				((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
				FROM 
				(SELECT db.id_biaya,db.`id_sj`,g.`gl_account` as glaccount,c.`cost_center` as costcenter, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
				       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
				       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
				FROM tbl_detail_biaya db left join tbl_costcenter c on c.id = db.costcenter left join tbl_general_ledger g on g.id = db.glaccount) AS t1) db on db.id_sj = sj.id
	          LEFT JOIN tbl_biaya b ON b.id = db.id_biaya
	          left join tbl_admin a on b.usercreated = a.id_admin 
	          WHERE b.tanggal >= '".$tanggalawal."' and b.tanggal <= '".$tanggalakhir."' ".$var."  
	          UNION
	          SELECT sj.nomorsj as `NOMOr SURAT JALAN`,
			  dd.`nama_mdriver` AS `NAMA DRIVER BRGKT`,
			  dd.`nama_mdriver` AS `NAMA DRIVER DTG`,
			  CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
			  kk.`nopol` AS `NOPOL BRGKT`,
			  dk.`nopol` AS `NOPOL DTG`,
			  DATE_FORMAT(sj.tanggalberangkat,'%d-%m-%Y') as `TANGGAL RENCANA KEBRKT`, 
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`,
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`,
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`,
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,
			  p.`nama_mdepo` AS `TUJUAN REAL`,
			  kb.jenismuatan AS `JENIS MUATAN BRGKT`,
			  kd.jenismuatan AS `JENIS MUATAN DTG`,
			  db.costcenter,
			  kc.container AS `CONTAINER BRGKT`,
			  dc.container AS `CONTAINER DTG`,
			  b.nomor_kasbon as `NOMOR KASBON`,
			  b.nominal as `NOMINAL KASBON`,
			  db.totalbiaya1 as `TOTAL BIAYA 1`,db.totalbiaya2 as `TOTAL BIAYA 2`,db.biayacont as `BIAYA CONT`,db.bbmtunai as `BBM`,db.bbmhead as `BBM HEAD`,
			  db.genset as `BBM GENSET`,db.bbmnontunai as `BBM MEMO`,db.nomemo as `NO MEMO`,db.biayatol as `TOL`,db.parkir as `PARKIR`,db.kuli as `KULI`,
			  db.kelasjalan as `KELAS JALAN`,db.feeinap as `UANG INAP / MAKAN`,
			  db.biayalain as `LAIN-LAIN`,db.totalfeedriver as `TOTAL EXTRA DRIVER`,db.totalfeekernet as `TOTAL EXTRA KERNET`,db.feedriver as `EXTRA DRIVER`,
			  db.feekernet as `EXTRA KERNET`,db.lemburdriver as `LEMBUR DRIVER`,db.lemburkernet as `LEMBUR KERNET`,db.keterangan as `KETERANGAN`,
			  CASE WHEN sj.active = 1 THEN 'BATAL' ELSE 'ACTIVE' END AS `STATUS SJ`,
			  DATE_FORMAT(b.tanggal,'%d-%m-%Y') AS `TANGGAL KASBON`,
			  CASE WHEN b.statchecker1 = 1 THEN 'SUDAH DI APPROVE' ELSE 'BELUM DI APPROVE' END AS `STATUS CHECKER 1`,
			  CASE WHEN b.statchecker2 = 1 THEN 'SUDAH DI APPROVE' ELSE 'BELUM DI APPROVE' END AS `STATUS CHECKER 2`,
			  CASE WHEN b.approved = 1 THEN 'SUDAH TERJURNAL' ELSE 'BELUM TERJURNAL' END AS `STATUS JURNAL`
			  FROM tbl_suratjalan sj 
	          JOIN tbl_depo p ON p.`id_mdepo` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
	          LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.nomorsj 
	          JOIN (SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
				(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
				((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
				FROM 
				(SELECT db.id_biaya,db.`id_sj`,g.`gl_account` as glaccount,c.`cost_center` as costcenter, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
				       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
				       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
				FROM tbl_detail_biaya db left join tbl_costcenter c on c.id = db.costcenter left join tbl_general_ledger g on g.id = db.glaccount) AS t1) db on db.id_sj = sj.id
	          LEFT JOIN tbl_biaya b ON b.id = db.id_biaya
	          left join tbl_admin a on b.usercreated = a.id_admin 
	          WHERE b.tanggal >= '".$tanggalawal."' and b.tanggal <= '".$tanggalakhir."' ".$var."     
	          UNION
	          SELECT sj.nomorsj as `NOMOr SURAT JALAN`,
			  dd.`nama_mdriver` AS `NAMA DRIVER BRGKT`,
			  dd.`nama_mdriver` AS `NAMA DRIVER DTG`,
			  CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
			  kk.`nopol` AS `NOPOL BRGKT`,
			  dk.`nopol` AS `NOPOL DTG`,
			  DATE_FORMAT(sj.tanggalberangkat,'%d-%m-%Y') as `TANGGAL RENCANA KEBRKT`, 
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`,
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`,
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`,
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,
			  p.`nama_mplant` AS `TUJUAN REAL`,
			  kb.jenismuatan AS `JENIS MUATAN BRGKT`,
			  kd.jenismuatan AS `JENIS MUATAN DTG`,
			  db.costcenter,
			  kc.container AS `CONTAINER BRGKT`,
			  dc.container AS `CONTAINER DTG`,
			  b.nomor_kasbon as `NOMOR KASBON`,
			  b.nominal as `NOMINAL KASBON`,
			  db.totalbiaya1 as `TOTAL BIAYA 1`,db.totalbiaya2 as `TOTAL BIAYA 2`,db.biayacont as `BIAYA CONT`,db.bbmtunai as `BBM`,db.bbmhead as `BBM HEAD`,
			  db.genset as `BBM GENSET`,db.bbmnontunai as `BBM MEMO`,db.nomemo as `NO MEMO`,db.biayatol as `TOL`,db.parkir as `PARKIR`,db.kuli as `KULI`,
			  db.kelasjalan as `KELAS JALAN`,db.feeinap as `UANG INAP / MAKAN`,
			  db.biayalain as `LAIN-LAIN`,db.totalfeedriver as `TOTAL EXTRA DRIVER`,db.totalfeekernet as `TOTAL EXTRA KERNET`,db.feedriver as `EXTRA DRIVER`,
			  db.feekernet as `EXTRA KERNET`,db.lemburdriver as `LEMBUR DRIVER`,db.lemburkernet as `LEMBUR KERNET`,db.keterangan as `KETERANGAN`,
			  CASE WHEN sj.active = 1 THEN 'BATAL' ELSE 'ACTIVE' END AS `STATUS SJ`,
			  DATE_FORMAT(b.tanggal,'%d-%m-%Y') AS `TANGGAL KASBON`,
			  CASE WHEN b.statchecker1 = 1 THEN 'SUDAH DI APPROVE' ELSE 'BELUM DI APPROVE' END AS `STATUS CHECKER 1`,
			  CASE WHEN b.statchecker2 = 1 THEN 'SUDAH DI APPROVE' ELSE 'BELUM DI APPROVE' END AS `STATUS CHECKER 2`,
			  CASE WHEN b.approved = 1 THEN 'SUDAH TERJURNAL' ELSE 'BELUM TERJURNAL' END AS `STATUS JURNAL`
			  FROM tbl_suratjalan sj 
	          JOIN tbl_plant p ON p.`id_mplant` = sj.`tujuan`
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
	          LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.nomorsj 
	          JOIN (SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
				(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
				((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
				FROM 
				(SELECT db.id_biaya,db.`id_sj`,g.`gl_account` as glaccount,c.`cost_center` as costcenter, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
				       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
				       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
				FROM tbl_detail_biaya db left join tbl_costcenter c on c.id = db.costcenter left join tbl_general_ledger g on g.id = db.glaccount ) AS t1) db on db.id_sj = sj.id
	          LEFT JOIN tbl_biaya b ON b.id = db.id_biaya
	          left join tbl_admin a on b.usercreated = a.id_admin 
	          WHERE b.tanggal >= '".$tanggalawal."' and b.tanggal <= '".$tanggalakhir."' ".$var."    
	          UNION
	          SELECT sj.nomorsj as `NOMOr SURAT JALAN`,
			  dd.`nama_mdriver` AS `NAMA DRIVER BRGKT`,
			  dd.`nama_mdriver` AS `NAMA DRIVER DTG`,
			  CASE WHEN sj.size = 0 THEN 'KECIL' ELSE 'BESAR' END AS `JENIS KENDARAAN`,
			  kk.`nopol` AS `NOPOL BRGKT`,
			  dk.`nopol` AS `NOPOL DTG`,
			  DATE_FORMAT(sj.tanggalberangkat,'%d-%m-%Y') as `TANGGAL RENCANA KEBRKT`, 
			  IF(IFNULL(r.rtglberangkat,'') = '', DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kb.tglberangkat,'%d-%m-%Y'),' [rev] ', DATE_FORMAT(r.rtglberangkat,'%d-%m-%Y'))) AS `TANGGAL BRKT REAL`,
			  IF(IFNULL(r.rjamberangkat,'') = '',  kb.jamkeluar, CONCAT(kb.jamkeluar,' [rev] ',r.rjamberangkat)) AS `JAM BRKT REAL`,
			  IF(IFNULL(r.rtgltiba,'') = '',DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') , CONCAT(DATE_FORMAT(kd.tgltiba,'%d-%m-%Y') ,' [rev] ',DATE_FORMAT(r.rtgltiba,'%d-%m-%Y') )) AS `TANGGAL TIBA REAL`,
			  IF(IFNULL(r.rjamtiba,'') = '',kd.jammasuk, CONCAT(kd.jammasuk,' [rev] ',r.rjamtiba)) AS `JAM TIBA REAL`,
			  sj.asalsj AS `DARI REAL`,
			  sj.`tujuan` AS `TUJUAN REAL`,
			  kb.jenismuatan AS `JENIS MUATAN BRGKT`,
			  kd.jenismuatan AS `JENIS MUATAN DTG`,
			  db.costcenter,
			  kc.container AS `CONTAINER BRGKT`,
			  dc.container AS `CONTAINER DTG`,
			  b.nomor_kasbon as `NOMOR KASBON`,
			  b.nominal as `NOMINAL KASBON`,
			  db.totalbiaya1 as `TOTAL BIAYA 1`,db.totalbiaya2 as `TOTAL BIAYA 2`,db.biayacont as `BIAYA CONT`,db.bbmtunai as `BBM`,db.bbmhead as `BBM HEAD`,
			  db.genset as `BBM GENSET`,db.bbmnontunai as `BBM MEMO`,db.nomemo as `NO MEMO`,db.biayatol as `TOL`,db.parkir as `PARKIR`,db.kuli as `KULI`,
			  db.kelasjalan as `KELAS JALAN`,db.feeinap as `UANG INAP / MAKAN`,
			  db.biayalain as `LAIN-LAIN`,db.totalfeedriver as `TOTAL EXTRA DRIVER`,db.totalfeekernet as `TOTAL EXTRA KERNET`,db.feedriver as `EXTRA DRIVER`,
			  db.feekernet as `EXTRA KERNET`,db.lemburdriver as `LEMBUR DRIVER`,db.lemburkernet as `LEMBUR KERNET`,db.keterangan as `KETERANGAN`,
			  CASE WHEN sj.active = 1 THEN 'BATAL' ELSE 'ACTIVE' END AS `STATUS SJ`,
			  DATE_FORMAT(b.tanggal,'%d-%m-%Y') AS `TANGGAL KASBON`,
			  CASE WHEN b.statchecker1 = 1 THEN 'SUDAH DI APPROVE' ELSE 'BELUM DI APPROVE' END AS `STATUS CHECKER 1`,
			  CASE WHEN b.statchecker2 = 1 THEN 'SUDAH DI APPROVE' ELSE 'BELUM DI APPROVE' END AS `STATUS CHECKER 2`,
			  CASE WHEN b.approved = 1 THEN 'SUDAH TERJURNAL' ELSE 'BELUM TERJURNAL' END AS `STATUS JURNAL`
	          FROM tbl_suratjalan sj 
	          LEFT JOIN tbl_kendaraan k ON sj.kendaraan = k.id 
	          LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id
	          LEFT JOIN tbl_driver d ON d.`id_mdriver` = sj.`sopir`
	          LEFT JOIN tbl_chasis s ON s.id = sj.sasis
	          LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = sj.id
			  LEFT JOIN tbl_driver dd ON dd.`id_mdriver` = kd.namasopir
	          LEFT JOIN tbl_chasis ds ON ds.id = kd.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) dc ON dc.id = kd.nocontainer
			  LEFT JOIN tbl_kendaraan dk ON dk.id = kd.nomorpolisi
	          LEFT JOIN tbl_p_keberangkatan kb ON kb.fk_idsj = sj.id
			  LEFT JOIN tbl_driver db ON db.`id_mdriver` = kb.namasopir
	          LEFT JOIN tbl_chasis ks ON ks.id = kb.sasis
			  LEFT JOIN (select * from tbl_container union select * from tbl_container_rent) kc ON kc.id = kb.nocontainer
			  LEFT JOIN tbl_kendaraan kk ON kk.id = kb.nomorpolisi
	          LEFT JOIN tbl_p_revisi r ON r.rfk_nosj = sj.nomorsj 
	          JOIN (SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
				(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
				((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
				FROM 
				(SELECT db.id_biaya,db.`id_sj`,g.`gl_account` as glaccount,c.`cost_center` as costcenter, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
				       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
				       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
				FROM tbl_detail_biaya db left join tbl_costcenter c on c.id = db.costcenter left join tbl_general_ledger g on g.id = db.glaccount) AS t1) db on db.id_sj = sj.id
	          LEFT JOIN tbl_biaya b ON b.id = db.id_biaya
	          left join tbl_admin a on b.usercreated = a.id_admin 
	          WHERE (b.tanggal >= '".$tanggalawal."' and b.tanggal <= '".$tanggalakhir."') AND sj.`jns_tujuan` = 0 ".$var." ) as tbl1
	          ORDER BY tbl1.`TANGGAL RENCANA KEBRKT` ASC
		")->result();			
		
		// echo $this->db->last_query();

	
		$data['tanggalawal'] = $tanggalawal;
		$data['tanggalakhir'] = $tanggalakhir;

		if ($excel == 1) {
		    header("Content-type: application/vnd-ms-excel");
 			header("Content-Disposition: attachment; filename=report.xls");
			$this->load->view('list_hasil_biaya',$data); 
		} else if ($excel == 2) {
			// header("Content-type: application/vnd-ms-excel");
 			// header("Content-Disposition: attachment; filename=report.xls");
			// $this->load->view('list_hasil_biaya',$data); 
			$html = $this->load->view('list_hasil_biaya',$data,true);

			$response =  array(
				'namafile' => 'report_biaya',
				'file' => "data:application/vnd.ms-excel;base64,".base64_encode($html)
			);

			echo json_encode($response);
		} else{
			$output = array(
				'html' => $this->load->view('list_hasil_biaya',$data, true)
			);
			echo json_encode($output);
		}	
	}

	function getHasilBiayaTotal($excel = 0){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalawal = date('Y-m-d',strtotime($tanggalawal));
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tanggalakhir = date('Y-m-d',strtotime($tanggalakhir));		

		$admin_name = $this->session->userdata('admin_name');	
		$fk_plant = $this->session->userdata('fk_plant');
		$var = "";

		if ($admin_name != 'admin')
		{
			$var = "and a.fk_plant = '".$fk_plant."'";
		}


		$data['hasil'] = $this->M_codeigniter->query("
			    SELECT b.`nomor_kasbon` AS `NO KASBON`,b.`nominal` AS `NOMINAL KAS BON`,SUM(t1.totalbiaya2) AS `TOTAL KELUAR`, (b.`nominal` - SUM(t1.totalbiaya2)) AS `SISA / KURANG`
				FROM tbl_biaya b LEFT JOIN 
				(SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
								(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
								((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
								FROM 
								(SELECT db.id_biaya,db.`id_sj`,g.`gl_account` as glaccount,c.`cost_center` as costcenter, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
								       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
								       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
								FROM tbl_detail_biaya db left join tbl_costcenter c on c.id = db.costcenter left join tbl_general_ledger g on g.id = db.glaccount) AS t1) AS t1 ON b.`id` = t1.id_biaya
								left join tbl_admin a on b.usercreated = a.id_admin 
								WHERE  b.`created_at` > '".$tanggalawal."' AND b.`created_at` < '".$tanggalakhir."'	".$var."
				GROUP BY b.id
		")->result();			
		
		//echo $this->db->last_query();
		$data['tanggalawal'] = $tanggalawal;
		$data['tanggalakhir'] = $tanggalakhir;

		if ($excel == 1) {
		    $this->load->library('pdf');
	        $this->data['title_pdf'] = 'Laporan Biaya Total';
	        $file_pdf = 'laporan_biaya_total';
	        $paper = 'A4';
		  // $paper = 'A4';
	        $orientation = "landscape";
			$html = $this->load->view('list_hasil_biaya_total',$data, true);	   
	        $this->pdf->generate($html, $file_pdf,$paper,$orientation);
		} else if ($excel == 2) {
			header("Content-type: application/vnd-ms-excel");
 			header("Content-Disposition: attachment; filename=report.xls");
			$this->load->view('list_hasil_biaya_total',$data); 
		} else{
			$output = array(
				'html' => $this->load->view('list_hasil_biaya_total',$data, true)
			);
			echo json_encode($output);
		}	
	}

	function reportBiayaTotal($id = 0){
		$data['hasil'] = $this->M_codeigniter->query("
			    SELECT b.`nomor_kasbon` AS `NO KASBON`,b.`nominal` AS `NOMINAL KAS BON`,SUM(t1.totalbiaya2) AS `TOTAL KELUAR`, (b.`nominal` - SUM(t1.totalbiaya2)) AS `SISA / KURANG`
				FROM tbl_biaya b LEFT JOIN 
				(SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
								(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
								((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
								FROM 
								(SELECT db.id_biaya,db.`id_sj`,g.`gl_account` as glaccount,c.`cost_center` as costcenter, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
								       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
								       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
								FROM tbl_detail_biaya db left join tbl_costcenter c on c.id = db.costcenter left join tbl_general_ledger g on g.id = db.glaccount) AS t1) AS t1 ON b.`id` = t1.id_biaya
								WHERE  b.id = '".$id."'		
				GROUP BY b.id
		")->result();
		header("Content-type: application/vnd-ms-excel");
 		header("Content-Disposition: attachment; filename=hasilbiayatotal.xls");
 		$this->load->view('list_hasil_biaya_total2',$data); 
	}

	function reportContainer($id = 0){
		
		$data['hasil'] = $this->M_codeigniter->query("
				SELECT *,c.id,c.container,CONCAT(SUBSTRING(jam,1,2),':','00') AS `hour`
				FROM tbl_suhu s LEFT JOIN 
				(
				SELECT * FROM tbl_container
				UNION
				SELECT * FROM tbl_container_rent
				) AS c ON c.id = s.idcontainer
				WHERE idcontainer = '".$id."'	
				GROUP BY tanggal,`hour`
		")->result();

		header("Content-type: application/vnd-ms-excel");
 		header("Content-Disposition: attachment; filename=formreport_".$data['hasil'][0]->container.".xls"); 
 		$this->load->view('report_container',$data); 		

 
	}

	function getDownload($excel = 0){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalawal = date('Y-m-d',strtotime($tanggalawal));
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tanggalakhir = date('Y-m-d',strtotime($tanggalakhir));		
		$data['hasil'] = $this->M_codeigniter->query("
			    SELECT DATE_FORMAT(DATE(b.`created_at`),'%d/%m/%Y') AS tgltotalan, '' as `PK`,'' as `SPESIAL G/L`,t1.glaccount as `ACCOUNT`,t1.totalbiaya2 as `AMOUNT`,'' as `BUSINESS AREA`,t1.costcenter as `COSTCENTER`,'' as `PROFIT CENTER`,CONCAT(UPPER(s.asalsj),' - ',UPPER(IFNULL(pl.`nama_mpelabuhan`,IFNULL(dp.`nama_mdepo`,IFNULL(pt.`nama_mplant`,s.tujuan)))),'  ( ', pk.`jenismuatan`, ' / ' ,pk.no_container,' ) ') as `TEXT`
				FROM tbl_biaya b 
				LEFT JOIN 
				(SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
								(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
								((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
								FROM 
								(SELECT db.id_biaya,db.`id_sj`,g.`gl_account` as glaccount,c.`cost_center` as costcenter, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
								       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
								       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
								FROM tbl_detail_biaya db left join tbl_costcenter c on c.id = db.costcenter left join tbl_general_ledger g on g.id = db.glaccount) AS t1) AS t1 ON b.`id` = t1.id_biaya
								LEFT JOIN tbl_suratjalan s ON s.`id` = t1.`id_sj`
								LEFT JOIN tbl_p_keberangkatan pk ON pk.fk_idsj = s.id
								LEFT JOIN tbl_pelabuhan pl ON pl.`id_mpelabuhan` = s.`tujuan`
								LEFT JOIN tbl_depo dp ON dp.id_mdepo = s.`tujuan` 
								LEFT JOIN tbl_plant pt ON pt.`id_mplant` = s.`tujuan`

								WHERE  b.`created_at` > '".$tanggalawal."' AND b.`created_at` < '".$tanggalakhir."'	
		")->result();			
		
		
		$output = array(
			'html' => $this->load->view('list_download',$data, true)
		);

		echo json_encode($output);
	}

	function reportFileUpload($id = 0){
		//$id = $this->input->post('id');
		$data_send_1 = array(
				'download' 	=> date("Y-m-d H:i:s"),
				'approved' => 1
			);
		$update = $this->M_codeigniter->update('tbl_biaya', $data_send_1, array('id' => $id));

		$hasil2 = $this->M_codeigniter->query("
			    SELECT *
				FROM tbl_biaya b WHERE  b.id = '".$id."'	 
		")->result();
		
		$data['hasil'] = $this->M_codeigniter->query("
			    SELECT '40' as `PK`,'' as `SPESIAL G/L`,t1.glaccount as `ACCOUNT`,t1.totalbiaya2 as `AMOUNT`,t1.business_area as `BUSINESS AREA`,t1.costcenter as `COSTCENTER`,'' as `PROFIT CENTER`,CONCAT(UPPER(s.asalsj),' - ',UPPER(IFNULL(pl.`nama_mpelabuhan`,IFNULL(dp.`nama_mdepo`,IFNULL(pt.`nama_mplant`,s.tujuan)))),'  ( ', p.`jenismuatan`, ' / ' ,p.no_container,' ) ') as `TEXT`,
				'10140624' as `INTERNAL ORDER`
				FROM tbl_biaya b  

				LEFT JOIN 
				(SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
								(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
								((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
								FROM 
								(SELECT db.id_biaya,db.`id_sj`,g.`gl_account` as glaccount,c.`cost_center` as costcenter,c.business_area, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
								       db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
								       (db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
								FROM tbl_detail_biaya db left join tbl_costcenter c on c.id = db.costcenter left join tbl_general_ledger g on g.id = db.glaccount) AS t1) AS t1 ON b.`id` = t1.id_biaya
								LEFT JOIN tbl_suratjalan s ON s.`id` = t1.`id_sj`
								LEFT JOIN tbl_p_kendaraan p ON p.fk_idsj = s.nomorsj
								LEFT JOIN tbl_pelabuhan pl ON pl.`id_mpelabuhan` = s.`tujuan`
								LEFT JOIN tbl_depo dp ON dp.id_mdepo = s.`tujuan` 
								LEFT JOIN tbl_plant pt ON pt.`id_mplant` = s.`tujuan`
								WHERE  b.id = '".$id."'	 
		")->result();
		header("Content-type: application/vnd-ms-excel");
 		header("Content-Disposition: attachment; filename=formfileupload_".$hasil2[0]->nomor_kasbon.".xls");
 		$this->load->view('list_download2',$data); 
	}

	function reportFileUpload2(){
		$data = $this->input->post('data');
		$a = '(';	
		foreach ($data as $vals) {
	        $a = $a.$vals['value'].',';
	    }
	    $a = substr($a, 0, -1);
	    $a = $a.')';

		$data['hasil'] = $this->M_codeigniter->query("
		    SELECT '40' as `PK`,'' as `SPESIAL G/L`,t1.glaccount as `ACCOUNT`,t1.totalbiaya2 as `AMOUNT`,t1.business_area as `BUSINESS AREA`,t1.costcenter as `COSTCENTER`,'' as `PROFIT CENTER`,CONCAT(UPPER(s.asalsj),' - ',UPPER(IFNULL(pl.`idx`,IFNULL(dp.`idx`,IFNULL(pt.`nama_mplant`,s.tujuan)))),'  ( ',IFNULL(pk.`jenismuatan`,''), ' / ' ,IFNULL(c.container,''),' ) ') AS `TEXT`,
			'' as `REASON CODE`,'10140624' as `INTERNAL ORDER`
			FROM tbl_biaya b 
			LEFT JOIN 
			(SELECT t1.*,((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) AS biayacont,
			(((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) AS totalbiaya1,
			((((t1.bbmtunai + t1.bbmhead + t1.genset + t1.bbmnontunai + t1.biayatol + t1.parkir + t1.kuli + t1.kelasjalan + t1.feeinap + t1.biayalain) - (t1.bbmhead + t1.genset)) + t1.feedriver + t1.feekernet) - t1.bbmnontunai) AS totalbiaya2	
			FROM 
			(SELECT db.id_biaya,db.`id_sj`,g.`gl_account` as glaccount,c.`cost_center` as costcenter,c.business_area, db.bbmtunai,(db.bbmtunai + db.bbmnontunai - db.genset) AS bbmhead,db.genset,db.bbmnontunai,db.nomemo,db.biayatol,db.parkir,db.kuli,db.kelasjalan,
					db.feeinap,db.biayalain,db.feedriver,db.lemburdriver,(db.feedriver + db.lemburdriver) AS totalfeedriver, db.feekernet, db.lemburkernet, 
					(db.feekernet + db.lemburkernet) AS totalfeekernet,db.keterangan
			FROM tbl_detail_biaya db left join tbl_costcenter c on c.id = db.costcenter left join tbl_general_ledger g on g.id = db.glaccount) AS t1) AS t1 ON b.`id` = t1.id_biaya
			LEFT JOIN tbl_suratjalan s ON s.`id` = t1.`id_sj`
			LEFT JOIN tbl_p_keberangkatan pk ON pk.fk_idsj = s.id
			LEFT JOIN tbl_p_kedatangan pd ON pd.fk_idsj = s.id
			LEFT JOIN tbl_container c ON c.id = pk.nocontainer
			LEFT JOIN tbl_pelabuhan pl ON pl.`id_mpelabuhan` = s.`tujuan`
			LEFT JOIN tbl_depo dp ON dp.id_mdepo = s.`tujuan` 
			LEFT JOIN tbl_plant pt ON pt.`id_mplant` = s.`tujuan`	 
			where b.id in ".$a." and t1.totalbiaya2 > 0
		")->result();	

		$tanggal = date("Y-m-d H:i:s");

		$cek = $this->M_codeigniter->query("
		   Select max(approved) as approved from tbl_biaya where id in ".$a."
		")->result();


        if ($cek[0]->approved == 0)
        {
        	$sql = "update tbl_biaya set download = '".$tanggal."', approved = 1 where id in ".$a."";    
	        $query = $this->db->query($sql);

	        $html = $this->load->view('list_download2',$data,true);

	 	 	$response =  array(
	        'namafile' => $tanggal,
	        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($html)
	   	    );

			echo json_encode($response);
        } else
        {
        	exit();
        } 
	}


}

