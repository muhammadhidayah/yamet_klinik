<?php
	/**
	* 
	*/
	class Layanan_model extends CI_Model
	{

		public function getAllLayanan() {
		$this->db->select('*');
		$this->db->from('tbl_layanan');
		
		$result = $this->db->get();

		return $result->result();
	}

		public function insertLayanan($data) {
		$this->db->insert('tbl_layanan',$data);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}


	public function getLayananById($id_layanan) {
		$this->db->select('*');
		$this->db->from('tbl_layanan');
		$this->db->where('id_layanan', $id_layanan);

		$result = $this->db->get();

		return $result->row();
	}

	public function updateLayanan($id, $data) {
		$this->db->where('id_layanan', $id);
		$this->db->update('tbl_layanan', $data);

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
		
	public function deleteLayanan($id) {
		$this->db->where('id_layanan', $id);
		$this->db->delete('tbl_layanan');

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}





	}
?>