<?php  

	class Berita extends CI_Controller
	{

		public function __construct() {
			parent::__construct();

			$this->load->model('Post_model');
			$this->load->model('Pegawai_model');
		}
		
		public function index(){
			$id_pegawai = $this->session->userdata('id_pegawai');
			$username = $this->session->userdata('username');
			$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
			$data['berita'] = $this->Post_model->getAllBerita();
			$this->load->view('admin/V_berita', $data);
		}

		public function tambah_berita() {
			$id_pegawai = $this->session->userdata('id_pegawai');
			$username = $this->session->userdata('username');
			$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
			$this->load->view('admin/V_tambah_berita',$data);
		}

		public function doTambahBerita() {
			$this->form_validation->set_rules('judul_post', 'Judul Post', 'required',
										array('required' => 'Judul Post Harus di Input'));

			$this->form_validation->set_rules('deskripsi_post', 'Deskripsi Post', 'required',
										array('required' => 'Deskripsi Berita Harus di Isi'));

			$this->form_validation->set_rules('isi_post', 'Isi Post', 'required', 'required',
										array('required' => 'Isi Berita Harus di Isi'));

			if($this->form_validation->run() ===  FALSE) {
				$this->tambah_berita();
			} else {
				//CONFIGURASI UPLOAD IMAGE
				$config['upload_path'] 		= './assets/upload/post';
				$config['allowed_types'] 	= 'jpg|png|svg';
				$config['max_size'] 		= '12000';

				$this->load->library('upload', $config);

				//PROSES UPLOAD IMAGE
				if(! $this->upload->do_upload('gambar_post')) {
					$data['errors'] 	= $this->upload->display_errors();
					print_r($data);
				} else {
					//PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
					$upload_data				= array('uploads' =>$this->upload->data());
					// Image Editor
					$config['image_library']	= 'gd2';
					$config['source_image'] 	= './assets/upload/post/'.$upload_data['uploads']['file_name']; 
					$config['new_image'] 		= './assets/upload/post/thumbs/';
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
					$slug = url_title($this->input->post('judul_post'), 'dash', TRUE);

					$data = array('judul_post' 		=> $this->input->post('judul_post'),
								  'slug_post'		=> $slug,
								  'deskripsi_post'	=> $this->input->post('deskripsi_post'),
								  'isi_post'		=> $this->input->post('isi_post'),
								  'tanggal_post'	=> date("Y-m-d"),
								  'gambar_post'		=> $upload_data['uploads']['file_name'],
								  'id_pegawai'		=> $this->session->userdata('id_pegawai'));

					$this->Post_model->insertBerita($data);

					$this->session->set_flashdata('sukses', 'Berita Berhasil di Tambahkan');

					redirect(site_url('admin/berita'));
				}
			}
		}

		public function editBerita($id_post) {
			$id_pegawai = $this->session->userdata('id_pegawai');
			$username = $this->session->userdata('username');
			$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
			$data['berita'] = $this->Post_model->getBeritaById($id_post);

			$this->load->view('admin/V_edit_berita', $data);
		}

		public function updateBerita() {
			$this->form_validation->set_rules('judul_post', 'Judul Post', 'required',
										array('required' => 'Judul Post Harus di Input'));

			$this->form_validation->set_rules('deskripsi_post', 'Deskripsi Post', 'required',
										array('required' => 'Deskripsi Berita Harus di Isi'));

			$this->form_validation->set_rules('isi_post', 'Isi Post', 'required', 'required',
										array('required' => 'Isi Berita Harus di Isi'));

			if($this->form_validation->run() ===  FALSE) {
				$this->tambah_berita();
			} else {
				if(!empty($_FILES['gambar_post']['name'])) {
					
					//CONFIGURASI UPLOAD IMAGE
					$config['upload_path'] 		= './assets/upload/post';
					$config['allowed_types'] 	= 'jpg|png|svg';
					$config['max_size'] 		= '12000';

					$this->load->library('upload', $config);

					//PROSES UPLOAD IMAGE
					if(! $this->upload->do_upload('gambar_post')) {
						$data['errors'] 	= $this->upload->display_errors();
						print_r($data);
					} else {
						//PROSES UNTUK MEMBUAT THUMBNAIL DARI FOTO YANG TELAH DIUPLOAD
						$upload_data				= array('uploads' =>$this->upload->data());
						// Image Editor
						$config['image_library']	= 'gd2';
						$config['source_image'] 	= './assets/upload/post/'.$upload_data['uploads']['file_name']; 
						$config['new_image'] 		= './assets/upload/post/thumbs/';
						$config['create_thumb'] 	= TRUE;
						$config['quality'] 			= "100%";
						$config['maintain_ratio'] 	= FALSE;
						$config['width'] 			= 400; // Pixel
						$config['height'] 			= 300; // Pixel
						$config['x_axis'] 			= 0;
						$config['y_axis'] 			= 0;
						$config['thumb_marker'] 	= '';
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						//PROSES MASUK KEDATABASE
						$data = array('judul_post' 		=> $this->input->post('judul_post'),
									  'deskripsi_post'	=> $this->input->post('deskripsi_post'),
									  'isi_post'		=> $this->input->post('isi_post'),
									  'gambar_post'		=> $upload_data['uploads']['file_name'],
									  'id_pegawai'		=> $this->session->userdata('id_pegawai'));

						$id_post = $this->input->post('id_post');

						$this->Post_model->editBerita($id_post, $data);

						$this->session->set_flashdata('sukses', 'Berita Berhasil di Update');

						redirect(site_url('admin/berita'));
					}

				} else {
					//PROSES MASUK KEDATABASE
					$data = array('judul_post' 		=> $this->input->post('judul_post'),
								  'deskripsi_post'	=> $this->input->post('deskripsi_post'),
								  'isi_post'		=> $this->input->post('isi_post'),
								  'id_pegawai'		=> $this->session->userdata('id_pegawai'));

					$id_post = $this->input->post('id_post');

					$this->Post_model->editBerita($id_post, $data);

					$this->session->set_flashdata('sukses', 'Berita Berhasil di Update');

					redirect(site_url('admin/berita'));
				}
			}
		}

		public function deleteBerita($id_post) {
			$berita = $this->Post_model->getBeritaById($id_post);

			unlink('./assets/upload/post/'.$berita->gambar_post);
			unlink('./assets/upload/post/thumbs/'.$berita->gambar_post);

			$this->Post_model->deleteBerita($id_post);

			redirect(site_url('admin/berita'));
		}
	}
?>