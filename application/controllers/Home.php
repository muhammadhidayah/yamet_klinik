<?php
	/**
	* 
	*/
	class Home extends CI_Controller {
		public function __construct() {
			parent::__construct();

			$this->load->model('Post_model');
			$this->load->model('Jenisterapi_model');

		}

		public function index(){
			$id_post = $this->uri->segment(3);
		
			$data['tampilberita'] = $this->Post_model->tampilberita($id_post)->row_array();
			$data['berita'] = $this->Post_model->getAllBerita();
			$data['postberita'] = $this->Post_model->listberita();
			$this->load->view('V_home',$data);
		}

		public function post(){
			$id_post = $this->uri->segment(3);
		
			$data['tampilberita'] = $this->Post_model->tampilberita($id_post)->row_array();
			$data['berita'] = $this->Post_model->getAllBerita();
			$this->load->view('V_post',$data);
		}
		public function jenisterapi(){
		$data ['jenisterapi'] = $this->Jenisterapi_model->getAllJenisTerapi();
		$this->load->view('V_jenis_terapi',$data);
	}
	}
  ?>