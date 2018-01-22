<?php  
/**
* 
*/
	class Perkembangan_client extends CI_Controller
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
	}
		
		public function index(){
			$id_pegawai = $this->session->userdata('id_pegawai');
			$username = $this->session->userdata('username');
			$data ['pegawai'] = $this->Pegawai_model->getDetailDataPegawai($id_pegawai, $username);
			$data ['query'] = $this->Jenisterapi_model->getAllJenisTerapi();
			$data ['client'] = $this->Client_model->getAllClient();
			$this->load->view('terapis/V_input_perkembangan_client',$data);
		}

		function tambah_perkembangan_client(){
			$tgl_terapi = date("Y-m-d", strtotime($this->input->post('tanggal_perkembangan')));

			$tambah = array(
				'id_jenisterapi' 			=> $this->input->post('id_jenisterapi'),
				'id_client'					=> $this->input->post('id_client'),
				'id_pegawai'				=> $this->session->userdata('id_pegawai'),
				'tanggal_perkembangan'		=> $tgl_terapi,
				'laporan_perkembanganclient' => $this->input->post('laporan_perkembanganclient'));
			$this->db->insert('tbl_perkembanganclient',$tambah);
			if($tambah == null) {
       		 $this->session->set_flashdata('msm', 
                '<div class="alert alert-danger">
                    <h4>Oppss</h4>
                    <p>Tidak ada data dinput.</p>
                </div>');    
         
   			 }else {    
		        $this->session->set_flashdata('msm', 
		                '<div align="left" class="alert alert-success">
		                 
		                    <h3 align="center"> Berhasil menambah perkembangan</h3>
		                   </div>'); 
			

			$this->load->view('terapis/V_input_perkembangan_client');
		

		
		}
			redirect('terapis/Perkembangan_client');
		}

		function updatePerkembanganclient(){
			$tgl_terapi = date("Y-m-d", strtotime($this->input->post('tanggal_perkembangan')));

			$tambah = array(
				'id_jenisterapi' 			=> $this->input->post('id_jenisterapi'),
				'id_client'					=> $this->input->post('id_client'),
				'id_pegawai'				=> $this->session->userdata('id_pegawai'),
				'tanggal_perkembangan'		=> $tgl_terapi,
				'laporan_perkembanganclient' => $this->input->post('laporan_perkembanganclient'));
			$id = $this->input->post('id_perkembanganclient');
			$this->db->where('id_perkembanganclient',$id);
			$this->db->update('tbl_perkembanganclient',$tambah);
			if($tambah == null) {
       		 $this->session->set_flashdata('msm', 
                '<div class="alert alert-danger">
                    <h4>Oppss</h4>
                    <p>Tidak ada data dinput.</p>
                </div>');    
         
   			 }else {    
		        $this->session->set_flashdata('msm', 
		                '<div align="left" class="alert alert-success">
		                 
		                    <h3 align="center"> Berhasil menambah perkembangan</h3>
		                   </div>'); 
			

			$this->load->view('terapis/V_client_terapis');
		

		
		}
			redirect('terapis/Client');
		}

		public function doUpdate() {

		$this->form_validation->set_rules('jenis_terapi', 'Jenis Terapi', 'required', 
									array('required' 	=> 'Jenis Terapi Harus di Input'));

		$this->form_validation->set_rules('biaya_terapi', 'Biaya Terapi', 'required|numeric',
									array('required'	=> 'Biaya Terapi Harus di Input',
										  'numeric'		=> 'Biaya Terapi Harus Angka'));

		if($this->form_validation->run() === FALSE) {
			$this->index();
		} else {
			$id = $this->input->post('id_perkembanganclient');

			$data = array(
						  'id_perkembanganclient'		=> $this->input->post('id_perkembanganclient'),
						  
						  'tanggal_perkembangan'		=> $this->input->post('tanggal_perkembangan'),
						  
						  'laporan_perkembanganclient'	=> $this->input->post('laporan_perkembanganclient')
						);

			$this->Perkembangan_client_model->updatePerkembangan($id, $data);

			$this->session->set_flashdata('sukses', 'Perkembangan Berhasil di Update');

			redirect(site_url('terapis/perkembangan_client'));


		}
	}

	
	}
?>