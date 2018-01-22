<?php 

class Model_login extends CI_Model {

	public function getLogin($username, $password) {

		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array('username' => $username, 'password' => $password));

		$result = $this->db->get();

		return $result->row();

	}
	 	
}

