<?php 

class Client_model extends CI_Model{

	public function insertClient($data) {
		$this->db->insert('tbl_client', $data);

		if($this->db->affected_rows() > 0) 
			return true;
		else
			return false;
	}

	//Fungsi ini di gunakan untuk mengambil data client dengan syarat email dan password
	public function getLoginClient($email, $password) {
		$this->db->select('*');
		$this->db->from('tbl_client');
		$this->db->where(array('email_client' => $email, 'password_client' => $password));

		$result = $this->db->get();

		return $result->row();
	}

	//Fungsi ini di gunakan untuk mendapatkan seluruh data yang terdapat pada table tbl_client
	public function getAllClient() {
		$this->db->select('*');
		$this->db->from('tbl_client');

		$result = $this->db->get();

		return $result->result();
	}

	public function getdataClient() {
		$this->db->select('*');
		$this->db->from('tbl_client');
		$this->db->where('tbl_client.id_client',$this->session->userdata('id_client'));
	
		$result = $this->db->get();

		return $result->result();
	}


	public function getClientById($id_client) {
		$this->db->select('*');
		$this->db->from('tbl_client');
		$this->db->where('id_client', $id_client);

		$result = $this->db->get();

		return $result->row();
	}


	// Fungsi Ini di gunakan untuk melakukan update data terhadap tabel tbl_client
	public function updateDataClient($id_client, $data) {
		$this->db->where('id_client', $id_client);
		$this->db->update('tbl_client', $data);
	}
}
