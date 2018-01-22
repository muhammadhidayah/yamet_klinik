<?php
	/**
	* 
	*/
	class Fasilitas extends CI_Controller
	{
		
		public function __construct() {
		parent::__construct();
		if($this->session->userdata('level_user') != 'admin' &&
			$this->session->userdata('logged_in') != TRUE) {

			$this->session->set_flashdata('msg', 'Anda Harus Login Sebagai Admin');
			redirect(site_url('auth'));
		}

		$this->load->model('Pegawai_model');
		$this->load->model('Fasilitas_model');
	}

	public function index(){
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 
		$data ['fasilitas'] = $this->Fasilitas_model->getAllFasilita(); 
		$this->load->view('V_layanan');
	}
	public function delete($id_fasilitas) {
		$data['fasilitas'] = $this->Fasilitas_model->deleteFasilitas($id_fasilitas);
		redirect('admin/layanan');
	}

	public function edit($id_fasilitas) {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 

		$data['fasilitas'] = $this->Fasilitas_model->getFasilitasById($id_fasilitas);
		$this->load->view('admin/V_edit_fasilitas', $data);
	}

	public function tambah_fasilitas(){
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 
		
		$this->load->view('admin/V_tambah_fasilitas',$data);
	}


	public function doTambahFasilitas() {
			$this->form_validation->set_rules('isi_fasilitas', 'isi_fasilitas', 'required',
										array('required' => 'Judul Post Harus di Input'));

			

			if($this->form_validation->run() ===  FALSE) {
				$this->tambah_fasilitas();
			} else {
				//CONFIGURASI UPLOAD IMAGE
				$config['upload_path'] 		= './assets/upload/fasilitas';
				$config['allowed_types'] 	= 'jpg|png|svg';
				$config['max_size'] 		= '12000';

				$this->load->library('upload', $config);

				//PROSES UPLOAD IMAGE
				if(! $this->upload->do_upload('gambar_fasilitas')) {
					$data['errors'] 	= $this->upload->display_errors();
					print_r($data);
				} else {
					//PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
					$upload_data				= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/upload/layanan/'.$upload_data['uploads']['file_name']; 
					$config['new_image'] 		= './assets/upload/layanan/thumbs/';
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
					$slug = url_title($this->input->post('isi_layanan'), 'dash', TRUE);

					$data = array(
									'isi_fasilitas' 	=> $this->input->post('isi_fasilitas'),
									'kategori_fasilitas' 	=> $this->input->post('kategori_fasilitas'),
								  
								  'gambar_fasilitas'		=> $upload_data['uploads']['file_name']);

					$this->Fasilitas_model->insertFasilitas($data);

					$this->session->set_flashdata('sukses', 'Fasilitas Berhasil di Tambahkan');

					redirect(site_url('admin/layanan'));
				}
			}
		}

		public function doUpdate() {
			$this->form_validation->set_rules('isi_fasilitas', 'isi_fasilitas', 'required',
										array('required' => 'Judul Post Harus di Input'));

			

			if($this->form_validation->run() ===  FALSE) {
				$this->tambah_fasilitas();
			} else {
				//CONFIGURASI UPLOAD IMAGE
				$config['upload_path'] 		= './assets/upload/fasilitas';
				$config['allowed_types'] 	= 'jpg|png|svg';
				$config['max_size'] 		= '12000';

				$this->load->library('upload', $config);

				//PROSES UPLOAD IMAGE
				if(! $this->upload->do_upload('gambar_fasilitas')) {
					$data['errors'] 	= $this->upload->display_errors();
					print_r($data);
				} else {
					//PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
					$upload_data				= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/upload/fasilitas/'.$upload_data['uploads']['file_name']; 
					$config['new_image'] 		= './assets/upload/fasilitas/thumbs/';
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
					$slug = url_title($this->input->post('isi_fasilitas'), 'dash', TRUE);
					$id_fasilitas = $this->input->post('id_fasilitas');
					$data = array('isi_fasilitas' 	=> $this->input->post('isi_fasilitas'),
								  'kategori_fasilitas' 	=> $this->input->post('kategori_fasilitas'),
								  'gambar_fasilitas'		=> $upload_data['uploads']['file_name']);

					$this->Fasilitas_model->updateFasilitas( $id_fasilitas ,$data);

					$this->session->set_flashdata('sukses', 'Berita Berhasil di Tambahkan');

					redirect(site_url('admin/layanan'));
				}
			}
		}

	}
?>