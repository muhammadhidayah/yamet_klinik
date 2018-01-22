<?php
	/**
	* 
	*/
	class Layanan extends CI_Controller
	{
		
		public function __construct() {
		parent::__construct();
		if($this->session->userdata('level_user') != 'admin' &&
			$this->session->userdata('logged_in') != TRUE) {

			$this->session->set_flashdata('msg', 'Anda Harus Login Sebagai Admin');
			redirect(site_url('auth'));
		}

		$this->load->model('Pegawai_model');
		$this->load->model('Layanan_model');
		$this->load->model('Fasilitas_model');
		$this->load->model('Kelas_model');
	}

	public function index(){
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 
		$data ['fasilitas'] = $this->Fasilitas_model->getAllFasilitas(); 
		$data ['layanan'] = $this->Layanan_model->getAllLayanan(); 
		$data ['kelas'] = $this->Kelas_model->getAllkelas(); 
		$this->load->view('admin/V_layanan',$data);
	}

	public function tambah_layanan(){
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 
		
		$this->load->view('admin/V_tambah_layanan',$data);
	}
	public function delete($id_layanan) {
		$data['layanan'] = $this->Layanan_model->deleteLayanan($id_layanan);
		redirect('admin/layanan');
	}
	public function edit($id_layanan) {
		$id_pegawai = $this->session->userdata('id_pegawai');
		$username_pegawai = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username_pegawai); 
		
		$data['layanan'] = $this->Layanan_model->getLayananById($id_layanan);
		$this->load->view('admin/V_edit_layanan', $data);
	}

	public function doTambahLayanan() {
			$this->form_validation->set_rules('isi_layanan', 'isi_layanan', 'required',
										array('required' => 'Judul Post Harus di Input'));

			

			if($this->form_validation->run() ===  FALSE) {
				$this->edit();
			} else {
				//CONFIGURASI UPLOAD IMAGE
				$config['upload_path'] 		= './assets/upload/layanan';
				$config['allowed_types'] 	= 'jpg|png|svg';
				$config['max_size'] 		= '12000';

				$this->load->library('upload', $config);

				//PROSES UPLOAD IMAGE
				if(! $this->upload->do_upload('gambar_layanan')) {
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

					$data = array('isi_layanan' 	=> $this->input->post('isi_layanan'),
								  
								  'gambar_layanan'		=> $upload_data['uploads']['file_name']);

					$this->Layanan_model->insertLayanan($data);

					$this->session->set_flashdata('sukses', 'Berita Berhasil di Tambahkan');

					redirect(site_url('admin/layanan'));
				}
			}
		}





		public function doUpdateLayanan() {
			$this->form_validation->set_rules('isi_layanan', 'isi_layanan', 'required',
										array('required' => 'Judul Post Harus di Input'));

			

			if($this->form_validation->run() ===  FALSE) {
				$this->tambah_layanan();
			} else {
				//CONFIGURASI UPLOAD IMAGE
				$config['upload_path'] 		= './assets/upload/layanan';
				$config['allowed_types'] 	= 'jpg|png|svg';
				$config['max_size'] 		= '12000';

				$this->load->library('upload', $config);

				//PROSES UPLOAD IMAGE
				if(! $this->upload->do_upload('gambar_layanan')) {
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
					$id_layanan = $this->input->post('id_layanan');
					$data = array('isi_layanan' 	=> $this->input->post('isi_layanan'),
								  
								  'gambar_layanan'		=> $upload_data['uploads']['file_name']);

					$this->Layanan_model->updateLayanan( $id_layanan ,$data);

					$this->session->set_flashdata('sukses', 'Berita Berhasil di Tambahkan');

					redirect(site_url('admin/layanan'));
				}
			}
		}

	}
?>