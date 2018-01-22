<?php  
	/**
	* 
	*/
	class Client extends CI_Controller
	{
		public function __construct() {
		parent::__construct();
		if($this->session->userdata('level_user') != 'terapis' &&
			$this->session->userdata('logged_in') != TRUE) {

			$this->session->set_flashdata('msg', 'Anda Harus Login Sebagai Admin');
			redirect(site_url('auth'));
		}
		$this->load->model('Jenisterapi_model');
		$this->load->model('Client_model');
		$this->load->model('Pegawai_model');
		$this->load->model('Perkembangan_client_model');
	}
		
		public function index(){
			$id_pegawai = $this->session->userdata('id_pegawai');
			$username = $this->session->userdata('username');
			$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username);
			$data ['client'] = $this->Perkembangan_client_model->getAllmyclient();
			$this->load->view('terapis/V_client_terapis',$data);
		}

		public function editTerapi($id_perkembanganclient) {
			$id_pegawai = $this->session->userdata('id_pegawai');
			$username = $this->session->userdata('username');
			$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username);
			$data['terapi'] = $this->Perkembangan_client_model->getPerkembanganById($id_perkembanganclient);

			$this->load->view('terapis/V_edit_terapis', $data);
		}
	}
?>