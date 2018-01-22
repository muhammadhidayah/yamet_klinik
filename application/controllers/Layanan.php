<?php
	/**
	* 
	*/
	class Layanan extends CI_Controller
	{
		
		public function __construct() {
		parent::__construct();
		

		$this->load->model('Layanan_model');
		$this->load->model('Fasilitas_model');
		$this->load->model('Jenisterapi_model');
	}

	public function index(){
		$data ['layanan'] = $this->Layanan_model->getAllLayanan();
		$this->load->view('V_layanan',$data);
	}
	public function melayani(){
		$data ['fasilitas'] = $this->Layanan_model->getAllLayanan();
		$this->load->view('V_melayani',$data);
	}
	public function kondisi(){
		$data ['jenisterapi'] = $this->Jenisterapi_model->getAllJenisTerapi();
		$this->load->view('V_jenis_terapi',$data);
	}


	}
?>