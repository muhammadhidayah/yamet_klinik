<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

	public function getAllPegawai() {
		$this->db->select('*');
		$this->db->from('tbl_pegawai');

		$result = $this->db->get();

		return $result->result();
	}
	

	public function getAllPegawaiterapis() {
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->where('tbl_loginpegawai.level_login','terapis');
		$this->db->join('tbl_loginpegawai','tbl_loginpegawai.id_pegawai=tbl_pegawai.id_pegawai');

		$result = $this->db->get();

		return $result->result();
	}
	public function getAllPegawaiadmin() {
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->where('tbl_loginpegawai.level_login','admin');
		$this->db->join('tbl_loginpegawai','tbl_loginpegawai.id_pegawai=tbl_pegawai.id_pegawai');

		$result = $this->db->get();

		return $result->result();
	}

	public function getAllLoginPegawai($syarat) {

		$this->db->select('*');
		$this->db->from('tbl_loginpegawai');
		$this->db->where($syarat);

		$result = $this->db->get();

		return $result->result();
	}
	public function getAllLoginAdmin($syarat) {

		$this->db->select('*');
		$this->db->from('tbl_loginpegawai');
		$this->db->where($syarat);
		$this->db->where('level_login','admin');

		$result = $this->db->get();

		return $result->result();
	}
	public function getAllLoginterapis($syarat) {

		$this->db->select('*');
		$this->db->from('tbl_loginpegawai');
		$this->db->where($syarat);
		$this->db->where('level_login','terapis');

		$result = $this->db->get();

		return $result->result();
	}

	function getDataPegawaiById($id_pegawai) {
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->where('id_pegawai', $id_pegawai);

		$result = $this->db->get();

		return $result->row();
	}

	function getDetailDataPegawai($id_pegawai, $username) {
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->join('tbl_loginpegawai', 'tbl_pegawai.id_pegawai = tbl_loginpegawai.id_pegawai');
		$this->db->where(array('tbl_loginpegawai.id_pegawai' 		=> $id_pegawai, 
							   'tbl_loginpegawai.username_pegawai' 	=> $username));

		$result = $this->db->get();

		return $result->row();
	}

	function getLoginPegawai($username, $password) {
		$this->db->select('*');
		$this->db->from('tbl_loginpegawai');
		$this->db->where(array('username_pegawai' => $username, 'password_pegawai' => $password));

		$result = $this->db->get();

		return $result->row();
	}

	public function insertPegawai($data) {
		$this->db->insert('tbl_pegawai',$data);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function insertLoginPegawai($data) {
		$this->db->insert('tbl_loginpegawai',$data);

		if($this->db->affected_rows() > 0) 
			return true;
		else 
			return false;
	}

	function updateDataPegawai($id_pegawai, $data) {
		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('tbl_pegawai', $data);
	}

	function updateDataLoginPegawai($username, $data) {
		$this->db->where('username_pegawai', $username);
		$this->db->update('tbl_loginpegawai', $data);
	}

	public function deleteUserpegawai($username) {
		$this->db->where('username_pegawai', $username);
		$this->db->delete('tbl_loginpegawai');

		if($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}


		
}