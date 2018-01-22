<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function getProfile() {
		$this->db->select('*');
		$this->db->from('tbl_profilklinik');

		$result = $this->db->get();

		return $result->row();
	}
	public function getProfil() {
		$this->db->select('*');
		$this->db->from('tbl_profilklinik');

		$query=$this->db->get();
		return $query->result();
	}



	public function updateProfile($id_klinik, $data) {
		$this->db->where('id_klinik', $id_klinik);
		$this->db->update('tbl_profilklinik', $data);

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

}