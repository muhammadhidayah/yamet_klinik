<?php
	/**
	* 
	*/
	class Kelas extends CI_Controller
	{
		
		public function __construct() {
		parent::__construct();
		if($this->session->userdata('level_user') != 'admin' &&
			$this->session->userdata('logged_in') != TRUE) {

			$this->session->set_flashdata('msg', 'Anda Harus Login Sebagai Admin');
			redirect(site_url('auth'));
		}

		$this->load->model('Pegawai_model');
		$this->load->model('Kelas_model');
	}

	public function index(){
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 
		$data ['kelas'] = $this->Kelas_model->getAllkelas(); 
		$this->load->view('V_kelas',$data);
	}
	public function delete($id_kelasklinik) {
		$data['kelas'] = $this->Kelas_model->deleteKelas($id_kelasklinik);
		redirect('admin/layanan');
	}

	public function edit($id_kelasklinik) {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 

		$data['kelas'] = $this->Kelas_model->getKelasById($id_kelasklinik);
		$this->load->view('admin/V_edit_kelas', $data);
	}

	public function tambah_kelas(){
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 
		
		$this->load->view('admin/V_tambah_kelas',$data);
	}


	public function doTambahKelas() {
			$this->form_validation->set_rules('isi_kelasklinik', 'isi_kelasklinik', 'required',
										array('required' => 'Judul Post Harus di Input'));

			

			if($this->form_validation->run() ===  FALSE) {
				$this->tambah_kelas();
			} else {
				//CONFIGURASI UPLOAD IMAGE
				$config['upload_path'] 		= './assets/upload/kelas';
				$config['allowed_types'] 	= 'jpg|png|svg';
				$config['max_size'] 		= '12000';

				$this->load->library('upload', $config);

				//PROSES UPLOAD IMAGE
				if(! $this->upload->do_upload('gambar_kelasklinik')) {
					$data['errors'] 	= $this->upload->display_errors();
					print_r($data);
				} else {
					//PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
					$upload_data				= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/upload/kelas/'.$upload_data['uploads']['file_name']; 
					$config['new_image'] 		= './assets/upload/kelas/thumbs/';
					$config['create_thumb'] 	= TRUE;
					$config['quality'] 			= "100%";
					$config['max_size'] = '100M'; 
					$config['maintain_ratio'] 	= FALSE;
					$config['width'] 			= 5028; // Pixel
					$config['height'] 			= 3364; // Pixel
					$config['x_axis'] 			= 0;
					$config['y_axis'] 			= 0;
					$config['thumb_marker'] 	= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					//PROSES MASUK KEDATABASE
					$slug = url_title($this->input->post('isi_kelasklinik'), 'dash', TRUE);

					$data = array(
									'isi_kelasklinik' 	=> $this->input->post('isi_kelasklinik'),
									'kategori_kelasklinik' 	=> $this->input->post('kategori_kelasklinik'),
								  
								  'gambar_kelasklinik'		=> $upload_data['uploads']['file_name']);

					$this->Kelas_model->insertKelas($data);

					$this->session->set_flashdata('sukses', 'Kelas Berhasil di Tambahkan');

					redirect(site_url('admin/layanan'));
				}
			}
		}

		public function doUpdate() {
			$this->form_validation->set_rules('isi_kelasklinik', 'isi_kelasklinik', 'required',
										array('required' => 'Judul Post Harus di Input'));

			

			if($this->form_validation->run() ===  FALSE) {
				$this->tambah_kelas();
			} else {
				//CONFIGURASI UPLOAD IMAGE
				$config['upload_path'] 		= './assets/upload/kelas';
				$config['allowed_types'] 	= 'jpg|png|svg';
				$config['max_size'] 		= '12000';

				$this->load->library('upload', $config);

				//PROSES UPLOAD IMAGE
				if(! $this->upload->do_upload('gambar_kelasklinik')) {
					$data['errors'] 	= $this->upload->display_errors();
					print_r($data);
				} else {
					//PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
					$upload_data				= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/upload/kelas/'.$upload_data['uploads']['file_name']; 
					$config['new_image'] 		= './assets/upload/kelas/thumbs/';
					$config['create_thumb'] 	= TRUE;
					$config['quality'] 			= "100%";
					$config['max_size'] = '100M'; 
					$config['maintain_ratio'] 	= FALSE;
					$config['width'] 			= 5028; // Pixel
					$config['height'] 			= 3364; // Pixel
					$config['x_axis'] 			= 0;
					$config['y_axis'] 			= 0;
					$config['thumb_marker'] 	= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					//PROSES MASUK KEDATABASE
					$slug = url_title($this->input->post('isi_kelasklinik'), 'dash', TRUE);
					$id_kelasklinik = $this->input->post('id_kelasklinik');
					$data = array('isi_kelasklinik' 	=> $this->input->post('isi_kelasklinik'),
								  'kategori_kelasklinik' 	=> $this->input->post('kategori_kelasklinik'),
								  'gambar_kelasklinik'		=> $upload_data['uploads']['file_name']);

					$this->Kelas_model->updateKelas( $id_kelasklinik ,$data);

					$this->session->set_flashdata('sukses', 'Kelas Berhasil di Update');

					redirect(site_url('admin/layanan'));
				}
			}
		}

	}
?>