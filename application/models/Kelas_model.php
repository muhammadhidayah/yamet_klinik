<?php
	/**
	* 
	*/
	class Kelas_model extends CI_Model
	{

		public function getAllKelas() {
		$this->db->select('*');
		$this->db->from('tbl_kelasklinik');
		
		
		$result = $this->db->get();

		return $result->result();
	}

	public function getAllKelasUtama() {
		$this->db->select('*');
		$this->db->from('tbl_kelasklinik');
		$this->db->where('kategori_kelasklinik','utama');
		
		$result = $this->db->get();

		return $result->result();
	}

	public function getAllKelasLain() {
		$this->db->select('*');
		$this->db->from('tbl_kelasklinik');
		$this->db->where('kategori_kelasklinik','lain');
		
		$result = $this->db->get();

		return $result->result();
	}
	public function getKelasById($id_kelasklinik) {
		$this->db->select('*');
		$this->db->from('tbl_kelasklinik');
		$this->db->where('id_kelasklinik', $id_kelasklinik);

		$result = $this->db->get();

		return $result->row();
	}

	public function updateKelas($id, $data) {
		$this->db->where('id_kelasklinik', $id);
		$this->db->update('tbl_kelasklinik', $data);

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

		public function insertKelas($data) {
		$this->db->insert('tbl_kelasklinik',$data);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteKelas($id) {
		$this->db->where('id_kelasklinik', $id);
		$this->db->delete('tbl_kelasklinik');

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

		





	}
?>