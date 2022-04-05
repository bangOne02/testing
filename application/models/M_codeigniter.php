<?php
class M_codeigniter extends CI_Model {

	function query($query){
		return $this->db->query($query);
	}

	function get($table){
		return $this->db->get($table);
	}

	function get_where($table,$where){
		return $this->db->get_where($table,$where);
	}

	function insert($table, $data){
		$this->db->insert($table, $data);
		if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}

	function insert_batch($table, $data){
		$this->db->insert_batch($table, $data);
		if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}

	function insert_get_id($table, $data){
		$this->db->insert($table, $data);
		if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
            // return true;
        } else {
            return false;
        }
	}

	function update($table, $data, $where){
		$this->db->update($table, $data, $where);
		if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}

	function update_batch($table, $data, $where){
		$this->db->update_batch($table, $data, $where);
		if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}

	function delete($table, $where){
		$this->db->delete($table, $where);
		if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
	}

	function get_role($id_admin){
		$get_role = $this->db->query("
			SELECT a.fk_plant, b.role_access, b.role_corporate
			FROM tbl_admin a
			JOIN tbl_role b ON (b.id_role = a.fk_role)
			WHERE a.id_admin = $id_admin
		")->result()[0];

		$data[0] = explode(',', $get_role->role_access);
		$data[1] = $get_role->role_corporate;
		$data[2] = $get_role->fk_plant;

		return $data;
	}
 
}