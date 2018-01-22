<?php  
	class Profile_client extends CI_Controller{
		public function __construct() {
		parent::__construct();

		$this->load->model('Client_model');
	}
		
	public function index(){
		$id_client = $this->session->userdata('id_client');
		$data['client'] = $this->Client_model->getClientById($id_client);
		$this->load->view('client/V_profile_client',$data);
	}

	public function updateclient() {
		
		$data = array('id_client' 				=> $this->session->userdata('id_client'),
					  'nama_client'				=> $this->input->post('nama_client'),
					  'namapanggilan_client'	=> $this->input->post('namapanggilan_client'),
					  'jk_client'				=> $this->input->post('jk_client'),
					  'templahir_client'		=> $this->input->post('templahir_client'),
					  'tgllahir_client'			=> $this->input->post('tgllahir_client'),
					  'sekolah_client'			=> $this->input->post('sekolah_client'),
					  'diagnosis_client'		=> $this->input->post('diagnosis_client'),
					  'nama_ayahclient'			=> $this->input->post('nama_ayahclient'),
					  'nama_ibuclient'			=> $this->input->post('nama_ibuclient'),
					  'notelp_client'			=> $this->input->post('notelp_client'),
					  'email_client'			=> $this->input->post('email_client'),
					  'agama_client'			=> $this->input->post('agama_client'),
					  'catatankhusus_client'	=> $this->input->post('catatankhusus_client'),
					  'alamat_client'			=> $this->input->post('alamat_client'));

		$id_client = $this->session->userdata('id_client');
		$this->Client_model->updateDataClient($id_client, $data);
		$this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
		redirect(site_url('client/Profile_client'));
	}
	
}
?>