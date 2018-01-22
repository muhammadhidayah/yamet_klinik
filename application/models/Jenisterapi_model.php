<?php 

class Jenisterapi_model extends CI_Model {

	public function insertJenisTerapi($data) {
		$this->db->insert('tbl_jenisterapi', $data);

		if($this->db->affected_rows() > 0) 
			return true;
		else
			return false;
	}

	public function getAllJenisTerapi() {
		$this->db->select('*');
		$this->db->from('tbl_jenisterapi');

		$result = $this->db->get();

		return $result->result();
	}

	public function getJenisTerapiById($id_jenisterapi) {
		$this->db->select('*');
		$this->db->from('tbl_jenisterapi');
		$this->db->where('id_jenisterapi', $id_jenisterapi);

		$result = $this->db->get();

		return $result->row();
	}

	public function updateJenisTerapi($id, $data) {
		$this->db->where('id_jenisterapi', $id);
		$this->db->update('tbl_jenisterapi', $data);

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

	public function deleteJenisTerapi($id) {
		$this->db->where('id_jenisterapi', $id);
		$this->db->delete('tbl_jenisterapi');

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}

}