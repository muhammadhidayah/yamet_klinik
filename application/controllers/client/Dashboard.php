<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('Client_model');
	}

	public function index(){
		$id_client = $this->session->userdata('id_client');
		$data['client'] = $this->Client_model->getClientById($id_client);
		$this->load->view('client/V_member', $data);
	}
	function updateuser(){
			$this->load->model('Client_model');
			
			$data = array(
				'id_client' 	=> $this->session->userdata('id_client'),
				'password_client'	=> $this->input->post('password'));
			$id_user = $this->session->userdata('id_client');
			$this->Client_model->updateDataClient($id_user ,$data);
			
			redirect('client/dashboard');
		}

		public function updateAva() {
		//CONFIGURASI UPLOAD IMAGE
		$config['upload_path'] 		= './assets/upload/client';
		$config['allowed_types'] 	= 'jpg|png|svg';
		$config['max_size'] 		= '12000';
		$this->load->library('upload', $config);

		//PROSES UPLOAD IMAGE
		if(! $this->upload->do_upload('avaprofile')) {
			$data['errors'] 	= $this->upload->display_errors();
			print_r($data);
		} else {

			$upload_data = array('uploads' =>$this->upload->data());

			$data = array('gambar_client' => $upload_data['uploads']['file_name']);

			$id_client = $this->session->userdata('id_client');

			$this->Client_model->updateDataClient($id_client, $data);

			redirect(site_url('client/dashboard'));

		}
	}

}
?>