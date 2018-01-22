<?php  
	/**
	* 
	*/
	class Staff extends CI_Controller
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
			$data ['admin'] = $this->Pegawai_model->getAllPegawai();
			$this->load->view('owner/V_data_staff',$data);
		}

		public function tambah_staff(){
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
			$this->load->view('owner/V_tambah_staff',$data);
		}

		public function doTambahPegawai() {
			$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required', 
										array('required' => 'Nama Pegawai Harus di Isi'));

			$this->form_validation->set_rules('email_pegawai', 'E-mail Pegawai', 'required|valid_email', 
										array('required' => 'E-mail Pegawai Harus di Isi', 'valid_email' => 'E-mail Pegawai Tidak Valid, Mohon Input dengan E-mail Valid'));

			$this->form_validation->set_rules('nohp_pegawai', 'No HP Pegawai', 'required|numeric', 
										array('required' 	=> 'No HP Pegawai Harus di Isi', 
											  'numeric' 	=> 'No HP Pegawai Yang di Input Tidak Valid'));

			$this->form_validation->set_rules('alamat_pegawai', 'Alamat Pegawai', 'required', 
										array('required' => 'Alamat Pegawai Harus di Isi'));

			
			if($this->form_validation->run() === FALSE) {
				$this->tambah_pegawai();
			} else {
				
				$data = array('nama_pegawai' 	=> $this->input->post('nama_pegawai'), 
							  'email_pegawai'	=> $this->input->post('email_pegawai'),
							  'nohp_pegawai'	=> $this->input->post('nohp_pegawai'),
							  'alamat_pegawai'	=> $this->input->post('alamat_pegawai')
							);

				$this->Pegawai_model->insertPegawai($data);

				$this->session->set_flashdata('sukses', 'Data Pegawai Berhasil di Tambahkan');

				redirect(site_url('owner/staff/tambah_staff'));
			}
		}
	}
?>