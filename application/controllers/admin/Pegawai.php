<?php  
	/**
	* 
	*/
	class Pegawai extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
			if($this->session->userdata('level_user') != 'admin' &&
				$this->session->userdata('logged_in') != TRUE){

				$this->session->set_flashdata('msg', 'Anda Harus Login Sebagai Admin');
			redirect(site_url('auth'));
			}
			$this->load->model('Pegawai_model');
		}

		public function index(){
			$id_pegawai = $this->session->userdata('id_pegawai');
			$username = $this->session->userdata('username');
			$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
			$data ['terapis'] = $this->Pegawai_model->getAllPegawaiterapis();
			$this->load->view('admin/V_pegawai',$data);
		}

		public function tambah_pegawai(){
			$id_pegawai = $this->session->userdata('id_pegawai');
			$username = $this->session->userdata('username');
			$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
			$this->load->view('admin/V_tambah_pegawai',$data);
		}

		public function edit($id_pegawai) {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
		$data['terapis'] = $this->Pegawai_model->getDataPegawaiById($id_pegawai);
		$this->load->view('admin/V_edit_terapis', $data);
		}
		public function delete($id_jenisterapi) {
			$data['terapi'] = $this->Jenisterapi_model->deleteJenisTerapi($id_jenisterapi);
			redirect('admin/jenis_terapi');
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
				
				$data = array('nama_pegawai' 		=> $this->input->post('nama_pegawai'), 
							  'email_pegawai'		=> $this->input->post('email_pegawai'),
							  'nohp_pegawai'		=> $this->input->post('nohp_pegawai'),
							  'alamat_pegawai'		=> $this->input->post('alamat_pegawai'),
							  'jk_pegawai'			=> $this->input->post('jk_pegawai'),
							  'tgllahir_pegawai'	=> $this->input->post('tgllahir_pegawai'),
							  'agama_pegawai'		=> $this->input->post('agama_pegawai'),
							  'goldarah_pegawai'	=> $this->input->post('goldarah_pegawai'),
							  'pendakhir_pegawai'	=> $this->input->post('pendakhir_pegawai'),
							  'spesialis_pegawai'	=> $this->input->post('spesialis_pegawai'),
							  'panggilan_pegawai'	=> $this->input->post('panggilan_pegawai')
							);

				$this->Pegawai_model->insertPegawai($data);

				$this->session->set_flashdata('sukses', 'Data Pegawai Berhasil di Tambahkan');

				redirect(site_url('admin/pegawai/tambah_pegawai'));
			}
		}

		public function doUpdatePegawai() {
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
				$id = $this->input->post('id_pegawai');
				$data = array('nama_pegawai' 		=> $this->input->post('nama_pegawai'), 
							  'email_pegawai'		=> $this->input->post('email_pegawai'),
							  'nohp_pegawai'		=> $this->input->post('nohp_pegawai'),
							  'alamat_pegawai'		=> $this->input->post('alamat_pegawai'),
							  'jk_pegawai'			=> $this->input->post('jk_pegawai'),
							  'tgllahir_pegawai'	=> $this->input->post('tgllahir_pegawai'),
							  'agama_pegawai'		=> $this->input->post('agama_pegawai'),
							  'goldarah_pegawai'	=> $this->input->post('goldarah_pegawai'),
							  'pendakhir_pegawai'	=> $this->input->post('pendakhir_pegawai'),
							  'spesialis_pegawai'	=> $this->input->post('spesialis_pegawai'),
							  'panggilan_pegawai'	=> $this->input->post('panggilan_pegawai')
							);

				$this->Pegawai_model->updateDataPegawai($id, $data);

				$this->session->set_flashdata('sukses', 'Data Pegawai Berhasil di Tambahkan');

				redirect(site_url('admin/pegawai'));
			}
		}





	}
?>