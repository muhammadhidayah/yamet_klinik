<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

	public function getLogin($username, $password) {

		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array('username' => $username, 'password' => $password));

		$result = $this->db->get();

		return $result->row();

	}

	public function insertUserLogin($data) {
		$this->db->insert('tbl_user', $data);

		$id = $this->db->insert_id();

		if($this->db->affected_rows() > 0) 
			return $id;
		else
			return false;
	}
	function getdatauser(){
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('level_user','member');
		$this->db->join('tbl_client','tbl_client.id_user=tbl_user.id_user');
		
		$query = $this->db->get();
		return $query->result();
	}

	function getdatauserterapis(){
		$this->db->select('*');
		$this->db->from('tbl_loginpegawai');
		
		
		$this->db->join('tbl_pegawai','tbl_pegawai.id_pegawai=tbl_loginpegawai.id_pegawai');
		
		$query = $this->db->get();
		return $query->result();
	}
	 	

}