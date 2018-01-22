<?php
	/**
	* 
	*/
	class Perkembangan_client_model extends CI_Model
	{
		public function getAllmyclient() {
		$this->db->select('*');
		$this->db->from('tbl_perkembanganclient');
		$this->db->join('tbl_client','tbl_client.id_client=tbl_perkembanganclient.id_client');
		$this->db->join('tbl_jenisterapi','tbl_jenisterapi.id_jenisterapi=tbl_perkembanganclient.id_jenisterapi');

		$result = $this->db->get();

		return $result->result();
	}

	public function getPerkembanganByDate($id_client, $waktu) {
		$this->db->select('*');
		$this->db->from('tbl_perkembanganclient');
		$this->db->where('tbl_client.id_client', $id_client);
		$this->db->like('tanggal_perkembangan', $waktu, 'after');
		$this->db->join('tbl_jenisterapi','tbl_jenisterapi.id_jenisterapi=tbl_perkembanganclient.id_jenisterapi');
		$this->db->join('tbl_client','tbl_client.id_client=tbl_perkembanganclient.id_client');
		$this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_perkembanganclient.id_pegawai');

		$result = $this->db->get();

		return $result->result();
	}




	public function getPerkembanganByIdClient($id_client) {
		$this->db->select('*');
		$this->db->from('tbl_perkembanganclient');
		$this->db->where('tbl_client.id_client', $id_client);
		$this->db->join('tbl_jenisterapi','tbl_jenisterapi.id_jenisterapi=tbl_perkembanganclient.id_jenisterapi');
		$this->db->join('tbl_client','tbl_client.id_client=tbl_perkembanganclient.id_client');
		$this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_perkembanganclient.id_pegawai');

		$result = $this->db->get();

		return $result->result();
	}

	public function getPerkembanganById($id_perkembanganclient) {

		$this->db->select('*');
		$this->db->from('tbl_perkembanganclient');
		$this->db->join('tbl_jenisterapi','tbl_jenisterapi.id_jenisterapi=tbl_perkembanganclient.id_jenisterapi');
		$this->db->join('tbl_client','tbl_client.id_client=tbl_perkembanganclient.id_client');
		$this->db->join('tbl_pegawai', 'tbl_pegawai.id_pegawai = tbl_perkembanganclient.id_pegawai');
		$this->db->where('tbl_perkembanganclient.id_perkembanganclient', $id_perkembanganclient);

		$result = $this->db->get();

		return $result->row();
	}
	

	public function getJumlahTerapi() {
		$this->db->select('jenis_terapi, count(tbl_perkembanganclient.id_jenisterapi) as jumlah_terapi');
		$this->db->from('tbl_perkembanganclient');
		$this->db->join('tbl_jenisterapi', 'tbl_jenisterapi.id_jenisterapi = tbl_perkembanganclient.id_jenisterapi');
		$this->db->group_by('tbl_perkembanganclient.id_jenisterapi');

		$result = $this->db->get();

		return $result->result();
	}

}
?>