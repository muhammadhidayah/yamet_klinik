<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Pegawai_model');
	}

	public function index(){
		$syarat  = array('level_login != ' => "owner");
		$data ['query'] = $this->Pegawai_model->getAllLoginterapis($syarat);

		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 
		$this->load->view('admin/V_user',$data);
	}


	// Fungsi ini di gunakan untuk menambahkan login pegawai, yang memungkinkan 
	// Satu pegawai bisa memiliki lebih dari satu akun login
	public function tambahUser() {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['admin'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai);
		$data['pegawai'] = $this->Pegawai_model->getAllPegawai();
		$this->load->view('admin/V_tambah_user', $data);
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

			redirect(site_url('admin/user'));
		}
	}

	public function updateUser() {
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password Tidak Boleh Kosong'));

		if($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$data = array('username_pegawai' => $this->input->post('username'), 
						  'password_pegawai' => $this->input->post('password'));

			$username = $this->input->post('username');

			$this->Pegawai_model->updateDataLoginPegawai($username, $data);

			$this->session->set_flashdata('msg', 'User Berhasil di Update');

			redirect(site_url('admin/user'));
		}
	}

	public function deletepegawailogin($username_pegawai) {
		$this->Pegawai_model->deleteUserpegawai($username_pegawai);

		$this->session->set_flashdata('msg', 'Pegawai Login Berhasil di Hapus');

		redirect(site_url('admin/user'));
	}

}

