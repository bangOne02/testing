<?php
class Web_model extends CI_Model
{

    protected $table = 'tbl_admin';

    public function __construct()
    {
        Parent::__construct();
    }

    public function update_password($user_id, $password)
    {
        $this->db->where('id_admin', $user_id);
        return $this->db->update($this->table, array(
            'userpassword'  => password_hash($password, PASSWORD_BCRYPT)
        ));
    }

    public function listKendaraan(){
        $query = "
        SELECT k.id,k.nopol,j.nama_jenis,k.tahun,k.costcenter,k.ukuran,d.`nama_divisi`,
        (
            SELECT kb.tglberangkat
            FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj  
            WHERE kb.nomorpolisi = k.id ORDER BY kb.id DESC LIMIT 1
        ) AS tglberangkat,
        (
            SELECT kb.jamkeluar
            FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj  
            WHERE kb.nomorpolisi = k.id ORDER BY kb.id DESC LIMIT 1
        ) AS jamkeluar,
        (
            SELECT kd.tgltiba 
            FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj  
            WHERE kb.nomorpolisi = k.id ORDER BY kb.id DESC LIMIT 1
        ) AS tgltiba,
        (
            SELECT kd.jammasuk 
            FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj  
            WHERE kb.nomorpolisi = k.id ORDER BY kb.id DESC LIMIT 1
        ) AS jamtiba,
        (
            SELECT a.fk_plant 
            FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj 
            LEFT JOIN tbl_admin a ON a.id_admin = kd.updated_by 
            WHERE kb.nomorpolisi = k.id ORDER BY kb.id DESC LIMIT 1
        ) AS lokasi,
        (
            SELECT s.nomorsj 
            FROM tbl_p_keberangkatan kb LEFT JOIN tbl_p_kedatangan kd ON kd.fk_idsj = kb.fk_idsj 
            LEFT JOIN tbl_suratjalan s ON s.id = kb.fk_idsj 
            WHERE kb.nomorpolisi = k.id ORDER BY kb.id DESC LIMIT 1
        ) AS nosj
        FROM tbl_kendaraan k LEFT JOIN tbl_divisi d ON k.divisi = d.id 
                    LEFT JOIN tbl_jenis_kendaraan j ON k.jenis = j.id where k.active = 0
        ";
        return $this->db->query($query)->result();
    }


}
