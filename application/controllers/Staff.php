<?php  
	/**
	* 
	*/
	class Staff extends CI_Controller
	{
		public function __construct() {
			parent::__construct();

			$this->load->model('Pegawai_model');
		}
		public function index(){
			
			$data['staff'] = $this->Pegawai_model->getAllPegawaiterapis();
			$this->load->view('V_staff',$data);
		}
		public function terapis() {
			$data['staff'] = $this->Pegawai_model->getAllPegawaiterapis();
			$this->load->view('V_terapis',$data);
		}
		public function pegawai() {
			$data['pegawai'] = $this->Pegawai_model->getAllPegawai();
			$this->load->view('V_pegawai',$data);
		}
		public function admin() {
			$data['terapis'] = $this->Pegawai_model->getAllPegawai();
			$this->load->view('V_admin',$data);
		}	
	}
?>