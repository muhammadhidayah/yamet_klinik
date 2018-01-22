<?php
	/**
	* 
	*/
	class Fasilitas_model extends CI_Model
	{

		public function getAllFasilitas() {
		$this->db->select('*');
		$this->db->from('tbl_fasilitas');
		
		
		$result = $this->db->get();

		return $result->result();
	}

	public function getAllFasilitasUtama() {
		$this->db->select('*');
		$this->db->from('tbl_fasilitas');
		$this->db->where('kategori_fasilitas','utama');
		
		$result = $this->db->get();

		return $result->result();
	}

	public function getAllFasilitasLain() {
		$this->db->select('*');
		$this->db->from('tbl_fasilitas');
		$this->db->where('kategori_fasilitas','lain');
		
		$result = $this->db->get();

		return $result->result();
	}
	public function getFasilitasById($id_fasilitas) {
		$this->db->select('*');
		$this->db->from('tbl_fasilitas');
		$this->db->where('id_fasilitas', $id_fasilitas);

		$result = $this->db->get();

		return $result->row();
	}

	public function updateFasilitas($id, $data) {
		$this->db->where('id_fasilitas', $id);
		$this->db->update('tbl_fasilitas', $data);

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

		public function insertFasilitas($data) {
		$this->db->insert('tbl_fasilitas',$data);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteFasilitas($id) {
		$this->db->where('id_fasilitas', $id);
		$this->db->delete('tbl_fasilitas');

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

		





	}
?>