<?php
	/**
	* 
	*/
	class Profil extends CI_Controller	{

		public function __construct() {
		parent::__construct();

		$this->load->model('Profile_model');
		
	}
		
		public function index(){
			$data['profile'] = $this->Profile_model->getProfil();
			$this->load->view('V_profil',$data);
		}

	

		public function sejarah() {
			$data['profile'] = $this->Profile_model->getProfil();
			$this->load->view('V_sejarah',$data);
		}

		public function kurikulum() {
			$data['profile'] = $this->Profile_model->getProfil();
			$this->load->view('V_kurikulum',$data);

		}
		public function info() {
			$data['profile'] = $this->Profile_model->getProfil();
			$this->load->view('V_info',$data);

		}
	}
?>