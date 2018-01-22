<?php
	/**
	* 
	*/
	class Dashboard extends CI_Controller
	{
		public function __construct() {
		parent::__construct();
		if($this->session->userdata('level_user') != 'terapis' &&
			$this->session->userdata('logged_in') != TRUE) {

			$this->session->set_flashdata('msg', 'Anda Harus Login Sebagai Admin');
			redirect(site_url('auth'));
		}

		$this->load->model('Pegawai_model');
	}

		
		public function index(){
			$id_pegawai = $this->session->userdata('id_pegawai');
		$username = $this->session->userdata('username');
		$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username); 
			$this->load->view('terapis/V_dashboard_terapis',$data);
		}

		public function updateUser() {
		$username_pegawai = $this->input->post('username_pegawai');
		$data = array('username_pegawai' 	=> $this->input->post('username_pegawai'),
					  'password_pegawai'	=> $this->input->post('password_pegawai'));

		$this->Pegawai_model->updateDataLoginPegawai($username_pegawai, $data);

		redirect(site_url('terapis/Dashboard'));
	}


		public function updateAva() {
		//CONFIGURASI UPLOAD IMAGE
		$config['upload_path'] 		= './assets/upload/pegawai/img';
		$config['allowed_types'] 	= 'jpg|png|svg';
		$config['max_size'] 		= '12000';
		$this->load->library('upload', $config);

		//PROSES UPLOAD IMAGE
		if(! $this->upload->do_upload('avaprofile')) {
			$data['errors'] 	= $this->upload->display_errors();
			print_r($data);
		} else {

			$upload_data = array('uploads' =>$this->upload->data());

			$data = array('ava_pegawai' => $upload_data['uploads']['file_name']);

			$id_pegawai = $this->session->userdata('id_pegawai');

			$this->Pegawai_model->updateDataPegawai($id_pegawai, $data);

			redirect(site_url('terapis/dashboard'));

		}
	}
	}
?>