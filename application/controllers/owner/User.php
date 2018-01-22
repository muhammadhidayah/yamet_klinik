<?php
	/**
	* 
	*/
	class User extends CI_Controller
	{
		
		public function __construct() {
		parent::__construct();
		if($this->session->userdata('level_user') != 'owner' &&
			$this->session->userdata('logged_in') != TRUE) {

			$this->session->set_flashdata('msg', 'Anda Harus Login Sebagai Admin');
			redirect(site_url('auth/pegawai'));
		}

		$this->load->model('Pegawai_model');
	}

	public function index(){
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
		$syarat  = array('level_login != ' => "owner");
		$data ['query'] = $this->Pegawai_model->getAllLoginAdmin($syarat);
		$this->load->view('owner/V_user',$data);
	}

	public function tambahUser() {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
		$data['admin'] = $this->Pegawai_model->getAllPegawai();
		$this->load->view('owner/V_tambah_user', $data);
	}

		public function doTambahUser() {
		$this->form_validation->set_rules('username_pegawai', 'Username Pegawai', 'required|is_unique[tbl_loginpegawai.username_pegawai]',
									array('required'	=> 'Username Pegawai Harus di Isi',
										  'is_unique'	=> 'Username Telah di Gunakan, Harap Menggunakan Username Lain'));

		$this->form_validation->set_rules('password_pegawai', 'Password Pegawai', 'required',
									array('required'	=> 'Password Pegawai Harus di Isikan'));

		if($this->form_validation->run() === FALSE) {
			$this->tambahUser();
		} else {
			$data = array('username_pegawai' 	=> $this->input->post('username_pegawai'),
						  'password_pegawai'	=> $this->input->post('password_pegawai'),
						  'level_login'			=> $this->input->post('level_login'),
						  'id_pegawai'			=> $this->input->post('pegawai'));

			$this->Pegawai_model->insertLoginPegawai($data);

			redirect(site_url('owner/user/tambahUser'));
		}
	}

	public function delete($username_pegawai) {
		$data['user'] = $this->Pegawai_model->deleteUserpegawai($username_pegawai);
		redirect('owner/user');
	}

	}
?>