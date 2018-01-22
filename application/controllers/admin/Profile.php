<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Profile_model');
		$this->load->model('Pegawai_model');
	}

	public function index() {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 
		$data['profile'] = $this->Profile_model->getProfile();
		
		$this->load->view('admin/V_profile', $data);
	}

	public function updateprofile() {
		$this->form_validation->set_rules('nama_klinik', 'Nama Klinik', 'required', 
									array('required' => 'Nama Klinik Harus di Inputkan'));
		$this->form_validation->set_rules('tentang_klinik', 'Tentang Klinik', 'required', 
									array('required' => 'Tentang Klinik Tidak Boleh Kosong'));
		$this->form_validation->set_rules('sejarah_klinik', 'Sejarah Klinik', 'required',
									array('required' => 'Sejarah Klinik Tidak Boleh Kosong'));
		$this->form_validation->set_rules('alamat_klinik', 'Alamat Klinik', 'required',
									array('required' => 'Alamat Klinik Tidak Boleh Kosong'));
		$this->form_validation->set_rules('notelp_klinik', 'Nomor Telepon Klinik', 'required|numeric|max_length[12]',
									array('required' 	=> 'Nomor Telepon Klinik Tidak Boleh Kosong',
										  'numeric'	 	=> 'Nomor Telepon Yang di Masukkan Tidak Valid',
										  'max_length'	=> 'Nomor Telepon Yang di Masukkan Terlalu Panjang'));

		if($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$data = array('id_klinik' 		=> $this->input->post('id_klinik'),
						  'nama_klinik'		=> $this->input->post('nama_klinik'),
						  'tentang_klinik'	=> $this->input->post('tentang_klinik'),
						  'sejarah_klinik'	=> $this->input->post('sejarah_klinik'),
						  'alamat_klinik'	=> $this->input->post('alamat_klinik'),
						  'info_klinik'		=> $this->input->post('info_klinik'),
						  'kurikulum_klinik'	=> $this->input->post('kurikulum_klinik'),
						  'notelp_klinik'	=> $this->input->post('notelp_klinik'));

			$id_klinik = $this->input->post('id_klinik');

			$this->Profile_model->updateProfile($id_klinik, $data);

			redirect('admin/Profile');
		}
	}

}
?>